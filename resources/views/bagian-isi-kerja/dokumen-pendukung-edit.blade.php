<h6 class="heading-small text-muted">DOKUMEN PENDUKUNG</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <input class="form-control form-control-alternative @error('a') is-invalid @enderror" type="text" name="a" id="a" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('a', $ijinKerja->dokumenPendukung->a) }}">
        @error('a')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control form-control-alternative @error('b') is-invalid @enderror" type="text" name="b" id="b" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('b', $ijinKerja->dokumenPendukung->b) }}">
        @error('b')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control form-control-alternative @error('c') is-invalid @enderror" type="text" name="c" id="c" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('c', $ijinKerja->dokumenPendukung->c) }}">
        @error('c')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control form-control-alternative @error('d') is-invalid @enderror" type="text" name="d" id="d" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('d', $ijinKerja->dokumenPendukung->d) }}">
        @error('d')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input class="form-control form-control-alternative @error('e') is-invalid @enderror" type="text" name="e" id="e" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('e', $ijinKerja->dokumenPendukung->e) }}">
        @error('e')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
