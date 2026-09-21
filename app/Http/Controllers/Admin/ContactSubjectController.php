<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubject;
use Illuminate\Http\Request;

class ContactSubjectController extends Controller
{
    public function index()
    {
        $contactSubjects = ContactSubject::orderBy('sort_order')->get();
        return view('admin.contact-subjects.index', compact('contactSubjects'));
    }

    public function create()
    {
        return view('admin.contact-subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        ContactSubject::create($request->all());
        return redirect()->route('admin.contact-subjects.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(ContactSubject $contactSubject)
    {
        return view('admin.contact-subjects.edit', compact('contactSubject'));
    }

    public function update(Request $request, ContactSubject $contactSubject)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $contactSubject->update($request->all());
        return redirect()->route('admin.contact-subjects.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(ContactSubject $contactSubject)
    {
        $contactSubject->delete();
        return redirect()->route('admin.contact-subjects.index')->with('success', 'Berhasil dihapus.');
    }
}