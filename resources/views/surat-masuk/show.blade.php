@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h4 class="page-title">Detail Surat Masuk</h4>

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
                    Detail
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">
                                Informasi Surat Masuk
                            </h4>

                            <div>
                                <a href="{{ route('surat-masuk.edit', $suratMasuk->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>

                                <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="35%">Nomor Agenda</th>
                                        <td>{{ $suratMasuk->nomor_agenda ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td>{{ $suratMasuk->nomor_surat }}</td>
                                    </tr>

                                    <tr>
                                        <th>Tanggal Surat</th>
                                        <td>
                                            {{ \Carbon\Carbon::parse($suratMasuk->tanggal_surat)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Tanggal Terima</th>
                                        <td>
                                            {{ \Carbon\Carbon::parse($suratMasuk->tanggal_terima)->translatedFormat('d F Y') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="35%">Asal Surat</th>
                                        <td>{{ $suratMasuk->asal_surat }}</td>
                                    </tr>

                                    <tr>
                                        <th>Perihal</th>
                                        <td>{{ $suratMasuk->perihal }}</td>
                                    </tr>

                                    <tr>
                                        <th>Diinput Oleh</th>
                                        <td>
                                            {{ $suratMasuk->user->name ?? '-' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Tanggal Input</th>
                                        <td>
                                            {{ $suratMasuk->created_at->format('d/m/Y H:i') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>Keterangan</strong></label>

                                    <div class="border rounded p-3 bg-light">
                                        {!! nl2br(e($suratMasuk->keterangan ?? '-')) !!}
                                    </div>
                                </div>
                            </div>

                        </div>

                        @if ($suratMasuk->file_surat)
                            <div class="row mt-3">
                                <div class="col-md-12">

                                    <div class="card card-info">
                                        <div class="card-header">
                                            <div class="card-title">
                                                Lampiran Surat
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <a href="{{ Storage::url($suratMasuk->file_surat) }}" target="_blank"
                                                class="btn btn-info">
                                                <i class="fa fa-file"></i>
                                                Buka File Surat
                                            </a>

                                            <a href="{{ Storage::url($suratMasuk->file_surat) }}" download
                                                class="btn btn-success">
                                                <i class="fa fa-download"></i>
                                                Download
                                            </a>

                                            @if ($suratMasuk->file_surat && Str::endsWith($suratMasuk->file_surat, '.pdf'))
                                                <div class="mt-4">
                                                    <iframe src="{{ Storage::url($suratMasuk->file_surat) }}"
                                                        width="100%" height="700" style="border:1px solid #ddd;">
                                                    </iframe>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
