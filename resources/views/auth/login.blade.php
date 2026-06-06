@extends('layouts.base')

@section('body')
    <style>
        body {
            min-height: 100vh;
            background: #f4f6f9;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
        }

        .login-card .card {
            border: none;
            border-radius: 15px;
        }

        .login-card .card-body {
            padding: 1.8rem;
        }
    </style>

    <div class="login-page">
        <div class="login-card">

            <div class="card shadow">
                <div class="card-body">

                    <div class="text-center mb-4">
                        <img src="{{ asset('img/kanwil_pekanbaru.png') }}" alt="Logo" height="70" class="mb-3">

                        <h2 class="font-weight-bold mb-1">
                            SIMPEL
                        </h2>

                        <p class="text-muted">
                            Sistem Manajemen Persuratan Elektronik
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf

                        <div class="form-group">
                            <label>Username / Email</label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror"
                                placeholder="Masukkan username atau email" value="{{ old('login') }}" required>

                            @error('login')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"
                                required>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success btn-block btn-lg mt-3">
                            MASUK
                        </button>
                    </form>

                </div>
            </div>

            <div class="text-center mt-3">
                <small class="text-muted">
                    © {{ date('Y') }} SIMPEL - Sistem Manajemen Persuratan Elektronik
                </small>
            </div>

        </div>
    </div>
@endsection
