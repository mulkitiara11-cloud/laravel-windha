@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="auth-card">
        <h2>{{ __('Register') }}</h2>
        <p>Buat Akun Sistem Mahasiswa Baru</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" 
                       placeholder="Masukkan nama lengkap Anda"
                       required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" 
                       placeholder="contoh@email.com"
                       required autocomplete="email">

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
                       placeholder="Buat password minimal 8 karakter"
                       required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" 
                       class="form-control" 
                       name="password_confirmation" 
                       placeholder="Ketik ulang password Anda"
                       required autocomplete="new-password">
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary w-100 py-3">
                    {{ __('Register') }}
                </button>
            </div>

            <div class="mt-4 text-center">
                <span style="font-size: 0.9rem; color: var(--colors-body);">Sudah punya akun? </span>
                <a href="{{ route('login') }}" class="text-decoration-none" style="font-size: 0.9rem; color: var(--colors-primary); font-weight: 700;">
                    Masuk Di Sini
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
