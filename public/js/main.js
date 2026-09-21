AOS.init({
    duration: 680,
    once: true,
    offset: 55
});

/* NAVBAR SCROLL & ACTIVE LINK */
const navEl = document.getElementById('nav');
const bttEl = document.getElementById('btt');

window.addEventListener('scroll', function() {
    if (navEl) navEl.classList.toggle('scrolled', window.scrollY > 60);
    if (bttEl) bttEl.classList.toggle('show', window.scrollY > 300);
    document.querySelectorAll('section[id]').forEach(function(sec) {
        var top = sec.offsetTop - 110,
            bot = top + sec.offsetHeight;
        if (window.scrollY >= top && window.scrollY < bot) {
            document.querySelectorAll('.nav-link').forEach(function(l) {
                l.classList.remove('active');
            });
            var lnk = document.querySelector('.nav-link[href="#' + sec.id + '"]');
            if (lnk) lnk.classList.add('active');
        }
    });
});

/* SMOOTH SCROLL + MOBILE NAV CLOSE */
document.querySelectorAll('a[href^="#"]').forEach(function(a) {
    a.addEventListener('click', function(e) {
        var href = this.getAttribute('href');
        if (href === '#') return;
        var t = document.querySelector(href);
        if (t) {
            e.preventDefault();
            var navCollapse = document.getElementById('navmenu');
            if (navCollapse && navCollapse.classList.contains('show')) {
                var bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
                if (bsCollapse) {
                    bsCollapse.hide();
                } else {
                    navCollapse.classList.remove('show');
                }
            }
            setTimeout(function() {
                window.scrollTo({
                    top: t.offsetTop - 78,
                    behavior: 'smooth'
                });
            }, 50);
        }
    });
});

/* SEARCH OVERLAY */
var searchOv = document.getElementById('searchOv');
var navSearchBtn = document.getElementById('navSearchBtn');
var searchClose = document.getElementById('searchClose');
var searchInput = document.getElementById('searchInput');

if (navSearchBtn) navSearchBtn.addEventListener('click', function() {
    if (searchOv) {
        searchOv.classList.add('open');
        document.body.style.overflow = 'hidden';
        setTimeout(function() {
            if (searchInput) searchInput.focus();
        }, 220);
    }
});

if (searchClose) searchClose.addEventListener('click', closeSearch);

if (searchOv) searchOv.addEventListener('click', function(e) {
    if (e.target === searchOv) closeSearch();
});

function closeSearch() {
    if (searchOv) searchOv.classList.remove('open');
    document.body.style.overflow = '';
}

document.querySelectorAll('.sovcat').forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.sovcat').forEach(function(b) {
            b.classList.remove('active');
        });
        this.classList.add('active');
        var f = this.getAttribute('data-cat');
        closeSearch();
        setTimeout(function() {
            filterMenu(f);
            var menuEl = document.getElementById('menu');
            if (menuEl) menuEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 300);
    });
});

document.querySelectorAll('.sovtrend .ttag').forEach(function(t) {
    t.addEventListener('click', function() {
        if (searchInput) {
            searchInput.value = this.textContent.trim();
            searchInput.focus();
        }
    });
});

/* MAGNIFIC POPUP */
if (typeof $ !== 'undefined' && $.fn.magnificPopup) {
    $(document).ready(function() {
        $('.magnific_popup').magnificPopup({
            disableOn: 300,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });
    });
}

/* MENU FILTER */
function filterMenu(cat) {
    document.querySelectorAll('.filtbtn').forEach(function(b) {
        b.classList.toggle('active', b.getAttribute('data-f') === cat);
    });
    document.querySelectorAll('.catcard').forEach(function(c) {
        c.classList.toggle('active', c.getAttribute('data-filter') === cat);
    });
    document.querySelectorAll('.mwrap').forEach(function(w) {
        var c = w.getAttribute('data-c');
        if (cat === 'all' || c === cat) {
            w.classList.remove('gone');
            w.style.opacity = '0';
            w.style.transform = 'translateY(16px)';
            setTimeout(function() {
                w.style.transition = 'opacity .38s,transform .38s';
                w.style.opacity = '1';
                w.style.transform = 'translateY(0)';
            }, 60);
        } else {
            w.classList.add('gone');
        }
    });
}

document.querySelectorAll('.filtbtn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        filterMenu(this.getAttribute('data-f'));
    });
});

document.querySelectorAll('.catcard').forEach(function(card) {
    card.addEventListener('click', function() {
        var f = this.getAttribute('data-filter');
        var menuEl = document.getElementById('menu');
        if (menuEl) {
            window.scrollTo({ top: menuEl.offsetTop - 80, behavior: 'smooth' });
        }
        setTimeout(function() { filterMenu(f); }, 480);
    });
});

/* MENU POPUP */
var menuPop = document.getElementById('menuPop');
var mpQty = 1;

function openMenuPop(card) {
    if (!menuPop) return;

    var img    = card.getAttribute('data-img');
    var title  = card.getAttribute('data-title');
    var cat    = card.getAttribute('data-cat');
    var price  = card.getAttribute('data-price');
    var old    = card.getAttribute('data-old');
    var rating = parseFloat(card.getAttribute('data-rating'));
    var reviews= card.getAttribute('data-reviews');
    var cal    = card.getAttribute('data-cal');
    var time   = card.getAttribute('data-time');
    var desc   = card.getAttribute('data-desc');
    var tags   = card.getAttribute('data-tags') || '';

    var mpImg     = document.getElementById('mpImg');
    var mpCat     = document.getElementById('mpCat');
    var mpTitle   = document.getElementById('mpTitle');
    var mpStars   = document.getElementById('mpStars');
    var mpDesc    = document.getElementById('mpDesc');
    var mpPrice   = document.getElementById('mpPrice');
    var mpMeta    = document.getElementById('mpMeta');
    var mpTags    = document.getElementById('mpTags');
    var mpQnum    = document.getElementById('mpQnum');
    var mpAddCart = document.getElementById('mpAddCart');

    if (mpImg)   mpImg.setAttribute('src', img);
    if (mpCat)   mpCat.textContent = cat;
    if (mpTitle) mpTitle.textContent = title;

    if (mpStars) {
        var full = Math.round(rating), empty = 5 - full;
        mpStars.innerHTML =
            '<i class="fas fa-star"></i>'.repeat(full) + '☆'.repeat(empty) +
            ' <span style="color:#bbb;font-size:.78rem;">' + rating + ' (' + reviews + ' reviews)</span>';
    }

    if (mpDesc)  mpDesc.textContent = desc;
    if (mpPrice) mpPrice.innerHTML  = price + (old ? '<small style="color:#ccc;text-decoration:line-through;margin-left:8px;font-size:1rem;">' + old + '</small>' : '');

    if (mpMeta) mpMeta.innerHTML =
        '<div class="mpm"><div class="mpmv">' + cal + ' kcal</div><div class="mpml">Calories</div></div>' +
        '<div class="mpm"><div class="mpmv">' + time + ' min</div><div class="mpml">Prep Time</div></div>' +
        '<div class="mpm"><div class="mpmv">' + rating + '/5</div><div class="mpml">Rating</div></div>';

    if (mpTags) mpTags.innerHTML = tags.split(',').filter(Boolean).map(function(t) {
        return '<span class="mptag">' + t.trim() + '</span>';
    }).join('');

    mpQty = 1;
    if (mpQnum)    mpQnum.textContent = 1;
    if (mpAddCart) {
        mpAddCart.innerHTML = '<i class="fas fa-shopping-cart"></i> Add to Cart';
        mpAddCart.style.background = '';
    }

    menuPop.classList.add('open');
    document.body.style.overflow = 'hidden';
}

document.querySelectorAll('.mcard').forEach(function(card) {
    card.addEventListener('click', function() { openMenuPop(this); });
});

document.querySelectorAll('.madd').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        openMenuPop(this.closest('.mcard'));
    });
});

document.querySelectorAll('.mhrt').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.stopPropagation();
        var ico = this.querySelector('i');
        ico.classList.toggle('far');
        ico.classList.toggle('fas');
        this.style.color = ico.classList.contains('fas') ? 'var(--primary)' : '#ccc';
    });
});

/* MENU POPUP CONTROLS */
var mpClose   = document.getElementById('mpClose');
var mpPlus    = document.getElementById('mpPlus');
var mpMinus   = document.getElementById('mpMinus');
var mpQnum    = document.getElementById('mpQnum');
var mpAddCart = document.getElementById('mpAddCart');
var cartCount = document.getElementById('cartCount');

if (mpClose) mpClose.addEventListener('click', closeMenuPop);
if (menuPop) menuPop.addEventListener('click', function(e) {
    if (e.target === this) closeMenuPop();
});

function closeMenuPop() {
    if (menuPop) menuPop.classList.remove('open');
    document.body.style.overflow = '';
}

if (mpPlus) mpPlus.addEventListener('click', function() {
    if (mpQnum) mpQnum.textContent = ++mpQty;
});

if (mpMinus) mpMinus.addEventListener('click', function() {
    if (mpQty > 1 && mpQnum) mpQnum.textContent = --mpQty;
});

if (mpAddCart) mpAddCart.addEventListener('click', function() {
    var cnt = parseInt(cartCount ? cartCount.textContent : 0) + mpQty;
    if (cartCount) cartCount.textContent = cnt;
    this.innerHTML = '<i class="fas fa-check"></i> Added to Cart!';
    this.style.background = 'linear-gradient(135deg,var(--green),#1a4a35)';
    var self = this;
    setTimeout(function() {
        closeMenuPop();
        self.innerHTML = '<i class="fas fa-shopping-cart"></i> Add to Cart';
        self.style.background = '';
    }, 1000);
});

/* RESERVATION BUTTON */
var resBtn = document.getElementById('resBtn');
if (resBtn) resBtn.addEventListener('click', function() {
    var btn = this;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Booking...';
    btn.disabled = true;
    setTimeout(function() {
        btn.innerHTML = '<i class="fas fa-calendar-check"></i> Confirm Reservation';
        btn.disabled = false;
        var ok = document.getElementById('resOk');
        if (ok) {
            ok.style.display = 'block';
            ok.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }, 1500);
});

/* CONTACT BUTTON */
var ctcBtn = document.getElementById('ctcBtn');
if (ctcBtn) ctcBtn.addEventListener('click', function() {
    var btn = this;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
    btn.disabled = true;
    setTimeout(function() {
        btn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
        btn.disabled = false;
        var ok = document.getElementById('ctcOk');
        if (ok) {
            ok.style.display = 'block';
            ok.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }, 1500);
});

/* GALLERY POPUP */
var galPop  = document.getElementById('galPop');
var galData = [];
var galIdx  = 0;

document.querySelectorAll('.gitem').forEach(function(item) {
    galData.push({
        img:   item.getAttribute('data-gimg'),
        title: item.getAttribute('data-gtitle'),
        desc:  item.getAttribute('data-gdesc')
    });
    item.addEventListener('click', function() {
        openGal(parseInt(this.getAttribute('data-gi')));
    });
});

function openGal(i) {
    if (!galPop) return;
    galIdx = i;
    var g = galData[i];
    var gpImg   = document.getElementById('gpImg');
    var gpTitle = document.getElementById('gpTitle');
    var gpDesc  = document.getElementById('gpDesc');
    if (gpImg)   gpImg.setAttribute('src', g.img);
    if (gpTitle) gpTitle.textContent = g.title;
    if (gpDesc)  gpDesc.innerHTML = g.desc;
    galPop.classList.add('open');
    document.body.style.overflow = 'hidden';
}

var gpClose = document.getElementById('gpClose');
var gpPrev  = document.getElementById('gpPrev');
var gpNext  = document.getElementById('gpNext');

if (gpClose) gpClose.addEventListener('click', closeGal);
if (galPop)  galPop.addEventListener('click', function(e) {
    if (e.target === this) closeGal();
});

function closeGal() {
    if (galPop) galPop.classList.remove('open');
    document.body.style.overflow = '';
}

if (gpPrev) gpPrev.addEventListener('click', function() {
    openGal((galIdx - 1 + galData.length) % galData.length);
});
if (gpNext) gpNext.addEventListener('click', function() {
    openGal((galIdx + 1) % galData.length);
});

/* ESC KEY */
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeSearch();
        closeMenuPop();
        closeGal();
        if (typeof $ !== 'undefined' && $.magnificPopup) $.magnificPopup.close();
    }
});

/* TESTIMONIAL SWIPER */
var tesSwiperEl = document.querySelector('.tesSwiper');
if (tesSwiperEl) {
    new Swiper('.tesSwiper', {
        slidesPerView: 1,
        spaceBetween: 22,
        loop: true,
        autoplay: { delay: 4000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
        breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
    });
}

/* COUNTDOWN */
var cdH = document.getElementById('cdH');
var cdM = document.getElementById('cdM');
var cdS = document.getElementById('cdS');

if (cdH && cdM && cdS) {
    var cH = 8, cM = 45, cS = 30;
    setInterval(function() {
        cS--;
        if (cS < 0) { cS = 59; cM--; }
        if (cM < 0) { cM = 59; cH--; }
        if (cH < 0) { cH = 8; cM = 45; cS = 30; }
        cdH.textContent = String(cH).padStart(2, '0');
        cdM.textContent = String(cM).padStart(2, '0');
        cdS.textContent = String(cS).padStart(2, '0');
    }, 1000);
}

/* NEWSLETTER */
var nlBtn   = document.getElementById('nlBtn');
var nlEmail = document.getElementById('nlEmail');

if (nlBtn) nlBtn.addEventListener('click', function() {
    var email = nlEmail ? nlEmail.value : '';
    if (email && email.includes('@')) {
        var btn = this;
        btn.textContent = '✓ Subscribed!';
        btn.style.background = '#4ade80';
        btn.style.color = '#222';
        if (nlEmail) nlEmail.value = '';
        setTimeout(function() {
            btn.textContent = 'Subscribe';
            btn.style.background = '';
            btn.style.color = '';
        }, 3000);
    }
});

/* NUMBER COUNTER ANIMATION */
var numAnimated = false;
window.addEventListener('scroll', function() {
    var hero = document.getElementById('hero');
    if (!numAnimated && hero && window.scrollY > hero.offsetHeight - 300) {
        numAnimated = true;
        document.querySelectorAll('.snum').forEach(function(el) {
            var txt  = el.textContent;
            var num  = parseInt(txt);
            var suf  = txt.replace(/[0-9]/g, '');
            if (isNaN(num)) return;
            var start = 0;
            var step  = Math.ceil(num / 55);
            var iv = setInterval(function() {
                start += step;
                if (start >= num) { start = num; clearInterval(iv); }
                el.textContent = start + suf;
            }, 1400 / 55);
        });
    }
});