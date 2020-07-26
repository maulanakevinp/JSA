<h6 class="heading-small text-muted">UMUM</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <label class="form-control-label" for="nomor">Nomor</label>
        <input disabled class="form-control" type="text" name="nomor" id="nomor" placeholder="Masukkan Nomor ..." value="{{ old('nomor', $ijinKerja->umum->nomor) }}">
    </div>
    <div class="form-group">
        <label class="form-control-label" for="tanggal_pengesahan">Tanggal Pengesahan</label>
        <input disabled class="form-control" type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" placeholder="Masukkan Tanggal Pengesahan ..." value="{{ old('tanggal_pengesahan', $ijinKerja->umum->tanggal_pengesahan) }}">
    </div>
    <p class="mb-0 heading-small text-muted">Masa Berlaku</p>
    <div class="pl-lg-4">
        <div class="form-group">
            <label class="form-control-label" for="tanggal_mulai">Tanggal Mulai</label>
            <input disabled class="form-control" type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Mulai ..." value="{{ date('Y-m-d\TH:i' ,strtotime(old('tanggal_mulai', $ijinKerja->umum->tanggal_mulai))) }}">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="tanggal_selesai">Tanggal Selesai</label>
            <input disabled class="form-control" type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" placeholder="Masukkan Tanggal Selesai ..." value="{{ date('Y-m-d\TH:i' ,strtotime(old('tanggal_selesai', $ijinKerja->umum->tanggal_selesai))) }}">
        </div>
    </div>
    <div class="form-group">
        <label class="form-control-label" for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
        <input disabled class="form-control" type="text" name="lokasi_pekerjaan" id="lokasi_pekerjaan" placeholder="Masukkan Lokasi Pekerjaan ..." value="{{ old('lokasi_pekerjaan', $ijinKerja->umum->lokasi_pekerjaan) }}">
    </div>
    <div class="form-group">
        <label class="form-control-label" for="uraian_pekerjaan">Uraian pekerjaan</label>
        <input disabled class="form-control" type="text" name="uraian_pekerjaan" id="uraian_pekerjaan" placeholder="Masukkan Uraian pekerjaan ..." value="{{ old('uraian_pekerjaan', $ijinKerja->umum->uraian_pekerjaan) }}">
    </div>
</div>
