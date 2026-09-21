<section id="contact-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['contact_label'] ?? '' }}</span>
            <h2 class="stitle">{!! $settings['contact_title'] ?? '' !!}</h2>
            <div class="sline"></div>
            <p class="sdesc mx-auto" style="max-width:480px;">{{ $settings['contact_subtitle'] ?? '' }}</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-right">
                <div class="ctdark">
                    <h4>{{ $settings['contact_talk_title'] ?? '' }}</h4>
                    <p class="ctsub">{{ $settings['contact_talk_desc'] ?? '' }}</p>
                    <div class="ctitem">
                        <div class="cticon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="ctinfo"><strong>Address</strong><span>{{ $settings['address_full'] ?? '' }}</span></div>
                    </div>
                    <div class="ctitem">
                        <div class="cticon"><i class="fas fa-phone-alt"></i></div>
                        <div class="ctinfo"><strong>Phone</strong><span>{{ $settings['phone'] ?? '' }}</span></div>
                    </div>
                    <div class="ctitem">
                        <div class="cticon"><i class="fas fa-envelope"></i></div>
                        <div class="ctinfo"><strong>Email</strong><span>{{ $settings['email'] ?? '' }}</span></div>
                    </div>
                    <div class="ctitem">
                        <div class="cticon"><i class="fas fa-clock"></i></div>
                        <div class="ctinfo"><strong>Working Hours</strong><span>{{ $settings['hours_display'] ?? '' }}</span></div>
                    </div>
                    <div class="ctsocrow">
                        <a href="{{ $settings['facebook_url'] ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $settings['instagram_url'] ?? '#' }}"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $settings['twitter_url'] ?? '#' }}"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $settings['youtube_url'] ?? '#' }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <div class="fcard">
                    @if(session('contact_success'))
                    <div class="sucmsg" style="display:block;">
                        <i class="fas fa-check-circle"></i>
                        <p>{{ $settings['contact_success_msg'] ?? '' }}</p>
                    </div>
                    @else
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="flbl">Your Name *</label>
                                <input type="text" name="name" class="fctrl" placeholder="John Doe" value="{{ old('name') }}" required/>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Email Address *</label>
                                <input type="email" name="email" class="fctrl" placeholder="you@email.com" value="{{ old('email') }}" required/>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Phone Number</label>
                                <input type="tel" name="phone" class="fctrl" placeholder="+1 (800) 000-0000" value="{{ old('phone') }}"/>
                            </div>
                            <div class="col-sm-6">
                                <label class="flbl">Subject *</label>
                                <select name="subject" class="fctrl" required>
                                    @foreach($subjects as $subject)
                                    <option>{{ $subject->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="flbl">Message *</label>
                                <textarea name="message" class="fctrl" rows="5" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-red">
                                    <i class="fas fa-paper-plane"></i>Send Message
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