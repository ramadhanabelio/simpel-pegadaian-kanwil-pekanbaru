@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h4 class="page-title">Profile Saya</h4>
        </div>

        <div class="row">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="card-title">
                            Informasi Profil
                        </div>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Nama</label>

                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', auth()->user()->name) }}">
                            </div>

                            <div class="form-group">
                                <label>Username</label>

                                <input type="text" name="username" class="form-control"
                                    value="{{ old('username', auth()->user()->username) }}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>

                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', auth()->user()->email) }}">
                            </div>

                            <div class="form-group">
                                <label>Foto Profil</label>

                                <input type="file" name="profile" class="form-control">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary">
                                Simpan Profil
                            </button>
                        </div>

                    </form>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card">

                    <div class="card-header">
                        <div class="card-title">
                            Ubah Password
                        </div>
                    </div>

                    <form action="{{ route('profile.password') }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group">
                                <label>Password Lama</label>

                                <input type="password" name="current_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password Baru</label>

                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi Password</label>

                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">
                                Ubah Password
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
