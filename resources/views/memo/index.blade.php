@extends('layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Memo</h4>

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
                    <a href="{{ route('memo.index') }}">
                        Memo
                    </a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">
                                Kelola Memo
                            </h4>

                            <a href="{{ route('memo.create') }}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Tambah Memo
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
                                        <th>Nomor Memo</th>
                                        <th>Tanggal</th>
                                        <th>Tujuan</th>
                                        <th>Perihal</th>
                                        <th>Status</th>
                                        <th style="width: 12%">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($memos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>

                                            <td>
                                                {{ $item->nomor_memo ?: '-' }}
                                            </td>

                                            <td>
                                                {{ $item->tanggal->format('d/m/Y') }}
                                            </td>

                                            <td>
                                                {{ $item->tujuan }}
                                            </td>

                                            <td>
                                                {{ $item->perihal }}
                                            </td>

                                            <td>
                                                @if ($item->status == 'draft')
                                                    <span class="badge badge-secondary">
                                                        Draft
                                                    </span>
                                                @elseif ($item->status == 'proses')
                                                    <span class="badge badge-warning">
                                                        Proses
                                                    </span>
                                                @elseif ($item->status == 'selesai')
                                                    <span class="badge badge-success">
                                                        Selesai
                                                    </span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="form-button-action">

                                                    <a href="{{ route('memo.show', $item->id) }}"
                                                        class="btn btn-link btn-info" data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('memo.edit', $item->id) }}"
                                                        class="btn btn-link btn-primary" data-toggle="tooltip"
                                                        title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <form action="{{ route('memo.destroy', $item->id) }}" method="POST"
                                                        style="display:inline-block">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-link btn-danger"
                                                            data-toggle="tooltip" title="Hapus"
                                                            onclick="return confirm('Yakin ingin menghapus memo ini?')">
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
