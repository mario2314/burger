<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Password</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:var(--light); font-family:'Poppins',sans-serif;">

    <div style="background:#fff; border-radius:18px; padding:40px 36px; box-shadow:0 6px 30px rgba(0,0,0,0.08); max-width:400px; width:100%; margin:20px;">

        <div class="text-center mb-4">
            <h3 style="font-weight:900; margin-bottom:4px;">Konfirmasi <span style="color:var(--primary);">Password</span></h3>
        </div>

        <p style="font-size:0.85rem; color:#777; line-height:1.7; margin-bottom:20px;">
            Ini adalah area aman dari aplikasi. Mohon konfirmasi password Anda sebelum melanjutkan.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <label for="password" class="flbl">Password</label>
                <input id="password" type="password" name="password" class="fctrl"
                       required autocomplete="current-password">
                @error('password')
                    <small style="color:var(--primary); display:block; margin-top:4px;">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn-red" style="width:100%; justify-content:center;">Confirm</button>
        </form>
    </div>

</body>
</html>