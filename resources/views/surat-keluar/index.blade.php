@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Surat Keluar</h4>
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
                    <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Kelola Surat Keluar</h4>
                            <a href="{{ route('surat-keluar.create') }}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Tambah Surat Keluar
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Agenda</th>
                                        <th>Nomor Surat</th>
                                        <th>Tujuan Surat</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suratKeluar as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $item->nomor_agenda }}</td>
                                            <td>{{ $item->nomor_surat }}</td>
                                            <td>{{ $item->tujuan_surat }}</td>
                                            <td>
                                                <div class="form-button-action">

                                                    <a href="{{ route('surat-keluar.show', $item->id) }}"
                                                        class="btn btn-link btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('surat-keluar.edit', $item->id) }}"
                                                        class="btn btn-link btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('surat-keluar.destroy', $item->id) }}"
                                                        method="POST" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-link btn-danger"
                                                            onclick="return confirm('Hapus data ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
