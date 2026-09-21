<section id="hours">
    <div class="hrsbg"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl" style="color:#a5d6bc;">{{ $settings['hours_label'] ?? '' }}</span>
            <h2 class="stitle" style="color:#fff;">{!! $settings['hours_title'] ?? '' !!}</h2>
            <div class="sline"></div>
        </div>
        <div class="row g-4 align-items-start">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="hrscard">
                    @foreach($businessHours as $hour)
                    <div class="hrsrow">
                        <span class="hrsday"><i class="fas fa-calendar-day me-2" style="color:var(--secondary);"></i>{{ $hour->day_label }}</span>
                        <div class="d-flex align-items-center gap-2">
                            @if($hour->is_closed)
                                <div class="hdot off"></div>
                                <span class="hrstime" style="color:#ff6b6b;">Closed</span>
                            @else
                                <div class="hdot on"></div>
                                <span class="hrstime">
                                    {{ \Carbon\Carbon::parse($hour->open_time)->format('h:i A') }} -
                                    {{ \Carbon\Carbon::parse($hour->close_time)->format('h:i A') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3" data-aos="zoom-in">
                <div class="hrscta">
                    <i class="fas fa-truck-fast fa-2x mb-3" style="color:rgba(255,255,255,.8);"></i>
                    <h4>{{ $settings['hours_cta_title'] ?? '' }}</h4>
                    <p>{{ $settings['hours_cta_desc'] ?? '' }}</p>
                    <a href="{{ route('menu.index') }}" class="btnw">{{ $settings['hours_cta_button'] ?? 'Order Now' }} &rarr;</a>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-left">
                <div class="hrscard">
                    <h5 style="color:#fff;margin-bottom:18px;font-family:'Poppins',sans-serif;font-size:.95rem;font-weight:700;"><i class="fas fa-map-marker-alt me-2" style="color:var(--secondary);"></i>{{ $settings['hours_findus_label'] ?? 'Find Us' }}</h5>
                    <div class="hrsrow"><span class="hrsday"><i class="fas fa-location-dot me-2" style="color:var(--secondary);"></i>Address</span><span class="hrstime" style="font-size:.8rem;">{{ $settings['address_short'] ?? '' }}</span></div>
                    <div class="hrsrow"><span class="hrsday"><i class="fas fa-phone me-2" style="color:var(--secondary);"></i>Phone</span><span class="hrstime" style="font-size:.8rem;">{{ $settings['phone'] ?? '' }}</span></div>
                    <div class="hrsrow"><span class="hrsday"><i class="fas fa-envelope me-2" style="color:var(--secondary);"></i>Email</span><span class="hrstime" style="font-size:.8rem;">{{ $settings['email'] ?? '' }}</span></div>
                </div>
            </div>
        </div>
    </div>
</section>