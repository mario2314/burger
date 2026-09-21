<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Email</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:var(--light); font-family:'Poppins',sans-serif;">

    <div style="background:#fff; border-radius:18px; padding:40px 36px; box-shadow:0 6px 30px rgba(0,0,0,0.08); max-width:440px; width:100%; margin:20px;">

        <div class="text-center mb-4">
            <h3 style="font-weight:900; margin-bottom:4px;">Verifikasi <span style="color:var(--primary);">Email</span></h3>
        </div>

        <p style="font-size:0.85rem; color:#777; line-height:1.7; margin-bottom:20px;">
            Terima kasih sudah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan klik link yang sudah kami kirimkan. Belum dapat emailnya? Kami akan kirim ulang.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-3" style="background:rgba(45,106,79,0.08); color:var(--green); padding:10px 15px; border-radius:9px; font-size:0.85rem;">
                Link verifikasi baru sudah dikirim ke email Anda.
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-red">Kirim Ulang Email</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background:none; border:none; color:#888; font-size:0.85rem; text-decoration:underline; cursor:pointer;">
                    Log Out
                </button>
            </form>
        </div>
    </div>

</body>
</html>