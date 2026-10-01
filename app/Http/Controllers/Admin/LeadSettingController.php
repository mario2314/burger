<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\SiteSetting;
use App\Services\LeadNotifier;
use Illuminate\Http\Request;

class LeadSettingController extends Controller
{
    public function edit()
    {
        $values = [];
        foreach (LeadNotifier::DEFAULTS as $key => $default) {
            $values[$key] = SiteSetting::get($key, $default);
        }
        $values['mail_from_env'] = config('mail.from.address');

        return view('admin.leads.edit', compact('values'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'leads_recipients'       => ['required', 'string', 'max:500', function ($attr, $value, $fail) {
                $list = array_filter(array_map('trim', preg_split('/[,;\s]+/', $value)));
                foreach ($list as $email) {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $fail("Email tidak valid: {$email}");
                    }
                }
            }],
            'leads_from_address'     => 'nullable|email|max:255',
            'leads_from_name'        => 'nullable|string|max:100',
            'leads_subject_template' => 'required|string|max:255',
            'leads_body_template'    => 'required|string|max:5000',
        ]);
        $data['leads_enabled'] = $request->boolean('leads_enabled') ? '1' : '0';

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Pengaturan leads disimpan.');
    }

    public function test()
    {
        $contact = new Contact([
            'name'    => 'Tes Pengunjung',
            'email'   => 'tes@example.com',
            'phone'   => '08123456789',
            'subject' => 'Tes Notifikasi',
            'message' => 'Ini email percobaan dari admin CMS.',
        ]);
        $contact->created_at = now();

        return (new LeadNotifier)->send($contact)
            ? back()->with('success', 'Email tes terkirim ke ' . implode(', ', LeadNotifier::recipients()) . '.')
            : back()->with('error', 'Email tes gagal dikirim. Cek SMTP di .env, penerima, dan storage/logs/laravel.log.');
    }
}
