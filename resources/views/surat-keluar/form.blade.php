<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nomor Agenda</label>
            <input type="text" name="nomor_agenda" class="form-control @error('nomor_agenda') is-invalid @enderror"
                value="{{ old('nomor_agenda', $suratKeluar->nomor_agenda ?? '') }}" placeholder="Masukkan nomor agenda">

            @error('nomor_agenda')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Nomor Surat <span class="text-danger">*</span></label>
            <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror"
                value="{{ old('nomor_surat', $suratKeluar->nomor_surat ?? '') }}" required>

            @error('nomor_surat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Tanggal Surat <span class="text-danger">*</span></label>
            <input type="date" name="tanggal_surat" class="form-control"
                value="{{ old('tanggal_surat', $suratKeluar->tanggal_surat ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Tujuan Surat <span class="text-danger">*</span></label>
            <input type="text" name="tujuan_surat" class="form-control"
                value="{{ old('tujuan_surat', $suratKeluar->tujuan_surat ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Perihal <span class="text-danger">*</span></label>
            <input type="text" name="perihal" class="form-control"
                value="{{ old('perihal', $suratKeluar->perihal ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="4" class="form-control">{{ old('keterangan', $suratKeluar->keterangan ?? '') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>File Surat</label>

            <input type="file" name="file_surat" class="form-control">

            <small class="text-muted">
                Format yang diperbolehkan: PDF, JPG, JPEG, PNG (Maks. 5 MB)
            </small>

            @isset($suratKeluar)
                @if ($suratKeluar->file_surat)
                    <div class="mt-2">
                        <a href="{{ Storage::url($suratKeluar->file_surat) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fa fa-file"></i>
                            Lihat File Saat Ini
                        </a>
                    </div>
                @endif
            @endisset
        </div>
    </div>
</div>
