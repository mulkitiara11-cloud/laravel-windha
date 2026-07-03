@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <h2>{{ __('Login') }}</h2>
        <p>Akses Sistem Mahasiswa</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" 
                       placeholder="Masukkan email Anda"
                       required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" 
                       placeholder="Masukkan password Anda"
                       required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember" style="font-size: 0.85rem; color: var(--colors-ink-light); font-weight: 500;">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none" href="{{ route('password.request') }}" style="font-size: 0.85rem; color: var(--colors-primary); font-weight: 600;">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary w-100 py-3">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="mt-4 text-center">
                <span style="font-size: 0.9rem; color: var(--colors-body);">Belum punya akun? </span>
                <a href="{{ route('register') }}" class="text-decoration-none" style="font-size: 0.9rem; color: var(--colors-primary); font-weight: 700;">
                    Daftar Sekarang
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
