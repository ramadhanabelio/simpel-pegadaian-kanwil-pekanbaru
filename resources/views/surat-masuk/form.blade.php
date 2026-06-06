<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nomor Agenda</label>
            <input type="text" name="nomor_agenda" class="form-control @error('nomor_agenda') is-invalid @enderror"
                value="{{ old('nomor_agenda', $suratMasuk->nomor_agenda ?? '') }}" placeholder="Masukkan nomor agenda">

            @error('nomor_agenda')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Nomor Surat <span class="text-danger">*</span></label>
            <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror"
                value="{{ old('nomor_surat', $suratMasuk->nomor_surat ?? '') }}" required>

            @error('nomor_surat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Tanggal Surat <span class="text-danger">*</span></label>
            <input type="date" name="tanggal_surat" class="form-control"
                value="{{ old('tanggal_surat', $suratMasuk->tanggal_surat ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Tanggal Terima <span class="text-danger">*</span></label>
            <input type="date" name="tanggal_terima" class="form-control"
                value="{{ old('tanggal_terima', $suratMasuk->tanggal_terima ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Asal Surat <span class="text-danger">*</span></label>
            <input type="text" name="asal_surat" class="form-control"
                value="{{ old('asal_surat', $suratMasuk->asal_surat ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Perihal <span class="text-danger">*</span></label>
            <input type="text" name="perihal" class="form-control"
                value="{{ old('perihal', $suratMasuk->perihal ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" rows="4" class="form-control">{{ old('keterangan', $suratMasuk->keterangan ?? '') }}</textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>File Surat</label>

            <input type="file" name="file_surat" class="form-control">

            <small class="text-muted">
                Format yang diperbolehkan: PDF, JPG, JPEG, PNG (Maks. 5 MB)
            </small>

            @isset($suratMasuk)
                @if ($suratMasuk->file_surat)
                    <div class="mt-2">
                        <a href="{{ Storage::url($suratMasuk->file_surat) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fa fa-file"></i>
                            Lihat File Saat Ini
                        </a>
                    </div>
                @endif
            @endisset
        </div>
    </div>
</div>
