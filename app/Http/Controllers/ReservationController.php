<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\SiteSetting;
use App\Models\GuestOption;
use App\Models\TimeSlot;
use App\Models\ReservationInfoCard;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $settings     = SiteSetting::pluck('value', 'key');
        $guestOptions = GuestOption::orderBy('sort_order')->get();
        $timeSlots    = TimeSlot::orderBy('sort_order')->get();
        $infoCards    = ReservationInfoCard::orderBy('sort_order')->get();

        return view('pages.reservation', compact('settings', 'guestOptions', 'timeSlots', 'infoCards'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'required|string|max:20',
            'email'  => 'required|email|max:255',
            'guests' => 'required|integer|min:1',
            'date'   => 'required|date|after_or_equal:today',
            'time'   => 'required|string|max:20',
            'notes'  => 'nullable|string|max:1000',
        ]);

        $sanitized = [
            'name'   => strip_tags($validated['name']),
            'phone'  => strip_tags($validated['phone']),
            'email'  => filter_var($validated['email'], FILTER_SANITIZE_EMAIL),
            'guests' => (int) $validated['guests'],
            'date'   => $validated['date'],
            'time'   => strip_tags($validated['time']),
            'notes'  => isset($validated['notes']) ? strip_tags($validated['notes']) : null,
            'status' => 'pending',
        ];

        Reservation::create($sanitized);

        return redirect()->route('reservation.index')->with('reservation_success', true);
    }
}