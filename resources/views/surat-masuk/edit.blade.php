@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h4 class="page-title">Edit Surat Masuk</h4>

            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('dashboard') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>

                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>

                <li class="nav-item">
                    <a href="{{ route('surat-masuk.index') }}">
                        Surat Masuk
                    </a>
                </li>

                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>

                <li class="nav-item">
                    Edit Data
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('surat-masuk.update', $suratMasuk->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Form Edit Surat Masuk
                            </h4>
                        </div>

                        <div class="card-body">
                            @include('surat-masuk.form')
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
