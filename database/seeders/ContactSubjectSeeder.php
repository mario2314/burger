<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactSubject;

class ContactSubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'General Inquiry', 'Catering & Events', 'Feedback', 'Partnership', 'Media & Press',
        ];

        foreach ($subjects as $index => $label) {
            ContactSubject::create(['label' => $label, 'sort_order' => $index + 1]);
        }
    }
}