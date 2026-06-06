@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h4 class="page-title">Laporan Surat</h4>

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
                    <a href="{{ route('laporan.index') }}">
                        Laporan
                    </a>
                </li>
            </ul>
        </div>

        <div class="card">

            <div class="card-header">
                <h4 class="card-title">
                    Filter Laporan
                </h4>
            </div>

            <div class="card-body">

                <form method="GET">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jenis Surat</label>

                                <select name="jenis_surat" class="form-control" required>

                                    <option value="">
                                        Pilih Jenis Surat
                                    </option>

                                    <option value="masuk" {{ $jenis == 'masuk' ? 'selected' : '' }}>
                                        Surat Masuk
                                    </option>

                                    <option value="keluar" {{ $jenis == 'keluar' ? 'selected' : '' }}>
                                        Surat Keluar
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>

                                <input type="date" name="tanggal_mulai" class="form-control" value="{{ $tanggalMulai }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>

                                <input type="date" name="tanggal_selesai" class="form-control"
                                    value="{{ $tanggalSelesai }}">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>&nbsp;</label>

                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-search"></i>
                                    Tampilkan
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>

        @if ($data->count())
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">
                        Hasil Laporan
                    </h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nomor Agenda</th>
                                    <th>Nomor Surat</th>
                                    <th>Tanggal Surat</th>

                                    @if ($jenis == 'masuk')
                                        <th>Asal Surat</th>
                                    @else
                                        <th>Tujuan Surat</th>
                                    @endif

                                    <th>Perihal</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($data as $item)
                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $item->nomor_agenda }}
                                        </td>

                                        <td>
                                            {{ $item->nomor_surat }}
                                        </td>

                                        <td>
                                            {{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d/m/Y') }}
                                        </td>

                                        @if ($jenis == 'masuk')
                                            <td>{{ $item->asal_surat }}</td>
                                        @else
                                            <td>{{ $item->tujuan_surat }}</td>
                                        @endif

                                        <td>
                                            {{ $item->perihal }}
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
        @endif

    </div>
@endsection
