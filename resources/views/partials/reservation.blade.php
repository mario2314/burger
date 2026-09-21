<section id="reservation">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['reservation_label'] ?? '' }}</span>
            <h2 class="stitle">{!! $settings['reservation_title'] ?? '' !!}</h2>
            <div class="sline"></div>
            <p class="sdesc mx-auto" style="max-width:480px;">{{ $settings['reservation_subtitle'] ?? '' }}</p>
        </div>
        <div class="row g-4 align-items-start">
            <div class="col-lg-4" data-aos="fade-right">
                <div style="background:var(--dark);border-radius:18px;padding:36px;">
                    <h4 style="color:#fff;font-size:1.3rem;margin-bottom:8px;">{{ $settings['reservation_contact_title'] ?? '' }}</h4>
                    <p style="color:rgba(255,255,255,.55);font-size:.85rem;margin-bottom:26px;">{{ $settings['reservation_contact_desc'] ?? '' }}</p>
                    <div class="d-flex flex-column gap-3">
                        @foreach($infoCards as $card)
                            <div class="d-flex align-items-center gap-3">
                                <div style="width:46px;height:46px;border-radius:11px;background:rgba(232,40,26,.2);display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.1rem;flex-shrink:0;"><i class="fas {{ $card->icon }}"></i></div>
                                <div><strong style="display:block;color:#ccc;font-size:.78rem;text-transform:uppercase;letter-spacing:.8px;">{{ $card->label }}</strong><span style="color:#fff;font-size:.87rem;">{{ $card->value }}</span></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <div class="fcard">
                    @if(session('reservation_success'))
                    <div class="sucmsg" style="display:block;">
                        <i class="fas fa-check-circle"></i>
                        <p>{{ $settings['reservation_success_msg'] ?? '' }}</p>
                    </div>
                    @else
                    <form action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="flbl">Full Name *</label>
                                <input type="text" name="name" class="fctrl" placeholder="John Doe" value="{{ old('name') }}" required/>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Phone Number *</label>
                                <input type="tel" name="phone" class="fctrl" placeholder="+1 (800) 000-0000" value="{{ old('phone') }}" required/>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Email Address *</label>
                                <input type="email" name="email" class="fctrl" placeholder="you@email.com" value="{{ old('email') }}" required/>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Number of Guests *</label>
                                <select name="guests" class="fctrl" required>
                                    @foreach($guestOptions as $option)
                                    <option value="{{ $option->value }}">{{ $option->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Date *</label>
                                <input type="date" name="date" class="fctrl" value="{{ old('date') }}" required/>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Time *</label>
                                <select name="time" class="fctrl" required>
                                    @foreach($timeSlots as $slot)
                                    <option>{{ $slot->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="flbl">Special Requests</label>
                                <textarea name="notes" class="fctrl" rows="3" placeholder="Allergies, dietary needs, special occasions...">{{ old('notes') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-red w-100 justify-content-center">
                                    <i class="fas fa-calendar-check"></i>Confirm Reservation
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>