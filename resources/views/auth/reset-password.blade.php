<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:var(--light); font-family:'Poppins',sans-serif;">

    <div style="background:#fff; border-radius:18px; padding:40px 36px; box-shadow:0 6px 30px rgba(0,0,0,0.08); max-width:400px; width:100%; margin:20px;">

        <div class="text-center mb-4">
            <h3 style="font-weight:900; margin-bottom:4px;">Reset <span style="color:var(--primary);">Password</span></h3>
            <p style="font-size:0.85rem; color:#888; margin:0;">Masukkan password baru Anda</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="flbl">Email</label>
                <input id="email" type="email" name="email" class="fctrl"
                       value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                @error('email')
                    <small style="color:var(--primary); display:block; margin-top:4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="flbl">Password Baru</label>
                <input id="password" type="password" name="password" class="fctrl"
                       required autocomplete="new-password">
                @error('password')
                    <small style="color:var(--primary); display:block; margin-top:4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="flbl">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="fctrl"
                       required autocomplete="new-password">
                @error('password_confirmation')
                    <small style="color:var(--primary); display:block; margin-top:4px;">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn-red" style="width:100%; justify-content:center;">Reset Password</button>
        </form>
    </div>

</body>
</html>