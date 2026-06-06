<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Nomor Memo</label>
            <input type="text" name="nomor_memo" class="form-control"
                value="{{ old('nomor_memo', $memo->nomor_memo ?? '') }}">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Tanggal <span class="text-danger">*</span></label>
            <input type="date" name="tanggal" class="form-control"
                value="{{ old('tanggal', isset($memo) ? $memo->tanggal->format('Y-m-d') : date('Y-m-d')) }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Tujuan <span class="text-danger">*</span></label>
            <input type="text" name="tujuan" class="form-control" value="{{ old('tujuan', $memo->tujuan ?? '') }}"
                required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Status <span class="text-danger">*</span></label>

            <select name="status" class="form-control" required>
                <option value="draft" {{ old('status', $memo->status ?? '') == 'draft' ? 'selected' : '' }}>
                    Draft
                </option>

                <option value="proses" {{ old('status', $memo->status ?? '') == 'proses' ? 'selected' : '' }}>
                    Proses
                </option>

                <option value="selesai" {{ old('status', $memo->status ?? '') == 'selesai' ? 'selected' : '' }}>
                    Selesai
                </option>
            </select>

        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>Perihal <span class="text-danger">*</span></label>
            <input type="text" name="perihal" class="form-control" value="{{ old('perihal', $memo->perihal ?? '') }}"
                required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>Isi Memo <span class="text-danger">*</span></label>

            <textarea name="isi_memo" rows="6" class="form-control" required>{{ old('isi_memo', $memo->isi_memo ?? '') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>Lampiran</label>

            <input type="file" name="lampiran" class="form-control">

            @isset($memo)
                @if ($memo->lampiran)
                    <div class="mt-2">
                        <a href="{{ Storage::url($memo->lampiran) }}" target="_blank" class="btn btn-info btn-sm">
                            <i class="fa fa-file"></i>
                            Lihat Lampiran
                        </a>
                    </div>
                @endif
            @endisset

        </div>
    </div>

</div>
