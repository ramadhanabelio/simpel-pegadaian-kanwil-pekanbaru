@extends('layouts.app')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h4 class="page-title">Detail Memo</h4>
        </div>

        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-between">

                    <h4 class="card-title">
                        Informasi Memo
                    </h4>

                    <div>
                        <a href="{{ route('memo.edit', $memo->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>

                        <a href="{{ route('memo.index') }}" class="btn btn-secondary btn-sm">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="25%">Nomor Memo</th>
                        <td>{{ $memo->nomor_memo ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $memo->tanggal->translatedFormat('d F Y') }}</td>
                    </tr>

                    <tr>
                        <th>Tujuan</th>
                        <td>{{ $memo->tujuan }}</td>
                    </tr>

                    <tr>
                        <th>Perihal</th>
                        <td>{{ $memo->perihal }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($memo->status == 'draft')
                                <span class="badge badge-secondary">Draft</span>
                            @elseif($memo->status == 'proses')
                                <span class="badge badge-warning">Proses</span>
                            @else
                                <span class="badge badge-success">Selesai</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Pembuat</th>
                        <td>{{ $memo->user->name ?? '-' }}</td>
                    </tr>

                </table>

                <div class="mt-4">
                    <h5>Isi Memo</h5>

                    <div class="border rounded p-3 bg-light">
                        {!! nl2br(e($memo->isi_memo)) !!}
                    </div>
                </div>

                @if ($memo->lampiran)
                    <div class="mt-4">
                        <a href="{{ Storage::url($memo->lampiran) }}" target="_blank" class="btn btn-info">
                            <i class="fa fa-file"></i>
                            Lihat Lampiran
                        </a>

                        <a href="{{ Storage::url($memo->lampiran) }}" download class="btn btn-success">
                            <i class="fa fa-download"></i>
                            Download
                        </a>
                    </div>
                @endif

            </div>

        </div>

    </div>
@endsection
