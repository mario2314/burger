<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LeadNotifier
{
    public const DEFAULTS = [
        'leads_enabled'          => '1',
        'leads_recipients'       => '',
        'leads_from_address'     => '',
        'leads_from_name'        => '',
        'leads_subject_template' => '[Lead Baru] {subject} - {name}',
        'leads_body_template'    => "Ada lead baru dari form kontak website.\n\nNama    : {name}\nEmail   : {email}\nTelepon : {phone}\nSubject : {subject}\nWaktu   : {date}\n\nPesan:\n{message}\n",
    ];

    public static function setting(string $key): string
    {
        $value = SiteSetting::get($key);

        return ($value === null || $value === '') ? (self::DEFAULTS[$key] ?? '') : $value;
    }

    public static function recipients(): array
    {
        return array_values(array_filter(
            array_map('trim', preg_split('/[,;\s]+/', (string) SiteSetting::get('leads_recipients', ''))),
            fn ($e) => filter_var($e, FILTER_VALIDATE_EMAIL)
        ));
    }

    public static function render(string $template, Contact $contact): string
    {
        return strtr($template, [
            '{name}'    => $contact->name,
            '{email}'   => $contact->email,
            '{phone}'   => $contact->phone ?: '-',
            '{subject}' => $contact->subject,
            '{message}' => $contact->message,
            '{date}'    => ($contact->created_at ?? now())->format('d M Y H:i'),
        ]);
    }

    /** Kirim notifikasi lead. Tidak pernah melempar exception supaya form tetap sukses. */
    public function send(Contact $contact): bool
    {
        if (self::setting('leads_enabled') !== '1') {
            return false;
        }

        $to = self::recipients();
        if (!$to) {
            return false;
        }

        try {
            $from     = self::setting('leads_from_address') ?: config('mail.from.address');
            $fromName = self::setting('leads_from_name') ?: config('mail.from.name');
            $subject  = str_replace(["\r", "\n"], ' ', self::render(self::setting('leads_subject_template'), $contact));
            $body     = self::render(self::setting('leads_body_template'), $contact);

            Mail::raw($body, function ($m) use ($to, $from, $fromName, $subject, $contact) {
                $m->to($to)->from($from, $fromName)->subject($subject)
                  ->replyTo($contact->email, $contact->name);
            });

            return true;
        } catch (\Throwable $e) {
            Log::error('Gagal kirim email lead: ' . $e->getMessage());

            return false;
        }
    }
}
