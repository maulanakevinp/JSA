<h6 class="heading-small text-muted">UMUM</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <label class="form-control-label" for="nomor">Nomor</label>
        <input class="form-control form-control-alternative @error('nomor') is-invalid @enderror" type="text" name="nomor" id="nomor" placeholder="Masukkan Nomor ..." value="{{ old('nomor', $ijinKerja->umum->nomor) }}">
        @error('nomor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-control-label" for="tanggal_pengesahan">Tanggal Pengesahan</label>
        <input class="form-control form-control-alternative @error('tanggal_pengesahan') is-invalid @enderror" type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" placeholder="Masukkan Tanggal Pengesahan ..." value="{{ old('tanggal_pengesahan', $ijinKerja->umum->tanggal_pengesahan) }}">
        @error('tanggal_pengesahan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <p class="mb-0 heading-small text-muted">Masa Berlaku</p>
    <div class="pl-lg-4">
        <div class="form-group">
            <label class="form-control-label" for="tanggal_mulai">Tanggal Mulai</label>
            <input class="form-control form-control-alternative @error('tanggal_mulai') is-invalid @enderror" type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Mulai ..." value="{{ old('tanggal_mulai', $ijinKerja->umum->tanggal_mulai) }}">
            @error('tanggal_mulai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="tanggal_selesai">Tanggal Selesai</label>
            <input class="form-control form-control-alternative @error('tanggal_selesai') is-invalid @enderror" type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" placeholder="Masukkan Tanggal Selesai ..." value="{{ old('tanggal_selesai', $ijinKerja->umum->tanggal_selesai) }}">
            @error('tanggal_selesai')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="form-control-label" for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
        <input class="form-control form-control-alternative @error('lokasi_pekerjaan') is-invalid @enderror" type="text" name="lokasi_pekerjaan" id="lokasi_pekerjaan" placeholder="Masukkan Lokasi Pekerjaan ..." value="{{ old('lokasi_pekerjaan', $ijinKerja->umum->lokasi_pekerjaan) }}">
        @error('lokasi_pekerjaan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-control-label" for="uraian_pekerjaan">Uraian pekerjaan</label>
        <input class="form-control form-control-alternative @error('uraian_pekerjaan') is-invalid @enderror" type="text" name="uraian_pekerjaan" id="uraian_pekerjaan" placeholder="Masukkan Uraian pekerjaan ..." value="{{ old('uraian_pekerjaan', $ijinKerja->umum->uraian_pekerjaan) }}">
        @error('uraian_pekerjaan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
