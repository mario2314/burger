<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservationInfoCard;
use Illuminate\Http\Request;

class ReservationInfoCardController extends Controller
{
    public function index()
    {
        $infoCards = ReservationInfoCard::orderBy('sort_order')->get();
        return view('admin.reservation-info-cards.index', compact('infoCards'));
    }

    public function create()
    {
        return view('admin.reservation-info-cards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'       => 'required|string|max:255',
            'label'      => 'required|string|max:255',
            'value'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        ReservationInfoCard::create($request->all());
        return redirect()->route('admin.reservation-info-cards.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(ReservationInfoCard $reservationInfoCard)
    {
        return view('admin.reservation-info-cards.edit', ['card' => $reservationInfoCard]);
    }

    public function update(Request $request, ReservationInfoCard $reservationInfoCard)
    {
        $request->validate([
            'icon'       => 'required|string|max:255',
            'label'      => 'required|string|max:255',
            'value'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $reservationInfoCard->update($request->all());
        return redirect()->route('admin.reservation-info-cards.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(ReservationInfoCard $reservationInfoCard)
    {
        $reservationInfoCard->delete();
        return redirect()->route('admin.reservation-info-cards.index')->with('success', 'Berhasil dihapus.');
    }
}