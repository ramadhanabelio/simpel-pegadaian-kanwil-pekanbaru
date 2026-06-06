@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h4 class="page-title">Edit Memo</h4>

            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>

                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>

                <li class="nav-item">
                    <a href="{{ route('memo.index') }}">
                        Memo
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

        <form action="{{ route('memo.update', $memo->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Form Edit Memo
                    </h4>
                </div>

                <div class="card-body">
                    @include('memo.form')
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('memo.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>
            </div>

        </form>

    </div>
@endsection
