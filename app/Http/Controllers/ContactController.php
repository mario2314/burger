<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\SiteSetting;
use App\Models\ContactSubject;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key');
        $subjects = ContactSubject::orderBy('sort_order')->get();

        return view('pages.contact', compact('settings', 'subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        $sanitized = [
            'name'    => strip_tags($validated['name']),
            'email'   => filter_var($validated['email'], FILTER_SANITIZE_EMAIL),
            'phone'   => isset($validated['phone']) ? strip_tags($validated['phone']) : null,
            'subject' => strip_tags($validated['subject']),
            'message' => strip_tags($validated['message']),
            'is_read' => false,
        ];

        Contact::create($sanitized);

        return redirect()->route('contact.index')->with('contact_success', true);
    }
}