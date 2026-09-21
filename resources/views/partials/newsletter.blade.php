<section id="newsletter">
    <div class="nlbg"></div>
    <div class="container">
        <div class="nlw text-center" data-aos="zoom-in">
            <span class="slbl" style="color:rgba(255,255,255,.7);">{{ $settings['newsletter_label'] ?? '' }}</span>
            <h2 class="mb-3" style="color:#fff;">{!! $settings['newsletter_title'] ?? '' !!}</h2>
            <p class="mb-4" style="color:rgba(255,255,255,.78);">{{ $settings['newsletter_description'] ?? '' }}</p>
            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="nl-form-wrap">
                @csrf
                <input class="nlinput" type="email" name="email" id="nlEmail" placeholder="Enter your email address..." required/>
                <button type="submit" class="nlbtn"><i class="fas fa-paper-plane me-1"></i>Subscribe</button>
            </form>
            @if(session('newsletter_success'))
            <p style="color:#4ade80;font-size:.85rem;margin-top:10px;"><i class="fas fa-check-circle me-1"></i>{{ session('newsletter_success') }}</p>
            @endif
            <p style="color:rgba(255,255,255,.45);font-size:.76rem;margin-top:11px;"><i class="fas fa-lock me-1"></i>{{ $settings['newsletter_footer_note'] ?? '' }}</p>
        </div>
    </div>
</section>