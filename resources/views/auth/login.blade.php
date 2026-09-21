<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:var(--light); font-family:'Poppins',sans-serif;">

    <div style="background:#fff; border-radius:18px; padding:40px 36px; box-shadow:0 6px 30px rgba(0,0,0,0.08); max-width:400px; width:100%; margin:20px;">

        <div class="text-center mb-4">
            <h3 style="font-weight:900; margin-bottom:4px;"><span style="color:var(--primary);">Login</span></h3>
            <p style="font-size:0.85rem; color:#888; margin:0;">Masuk untuk mengakses dashboard</p>
        </div>

        @if (session('status'))
            <div class="mb-3" style="background:rgba(45,106,79,0.08); color:var(--green); padding:10px 15px; border-radius:9px; font-size:0.85rem;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="flbl">Email</label>
                <input id="email" type="email" name="email" class="fctrl"
                       value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <small style="color:var(--primary); display:block; margin-top:4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="flbl">Password</label>
                <input id="password" type="password" name="password" class="fctrl"
                       required autocomplete="current-password">
                @error('password')
                    <small style="color:var(--primary); display:block; margin-top:4px;">{{ $message }}</small>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4" style="font-size:0.83rem;">
                <label class="d-flex align-items-center gap-2" style="cursor:pointer; margin:0; color:#666;">
                    <input type="checkbox" name="remember" id="remember_me">
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color:var(--primary);">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn-red w-100 justify-content-center" style="width:100%;">Log in</button>
        </form>
    </div>

</body>
</html>