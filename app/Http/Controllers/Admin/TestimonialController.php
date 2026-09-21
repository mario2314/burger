<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('name')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'role'      => 'required|string|max:255',
            'review'    => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
            'image'     => 'required|string|max:500',
            'is_active' => 'nullable|boolean',
        ]);

        Testimonial::create([
            ...$request->except('is_active'),
            'name'      => strip_tags($request->name),
            'review'    => strip_tags($request->review),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'role'      => 'required|string|max:255',
            'review'    => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
            'image'     => 'required|string|max:500',
            'is_active' => 'nullable|boolean',
        ]);

        $testimonial->update([
            ...$request->except('is_active'),
            'name'      => strip_tags($request->name),
            'review'    => strip_tags($request->review),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil diupdate.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }
}