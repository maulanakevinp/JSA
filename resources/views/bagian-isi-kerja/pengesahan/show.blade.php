<p class="mb-0 heading-small font-weight-bold">PENGESAHAN</p>
<div class="pl-lg-4 row">
    <div class="col-md-6 mb-3">
        <p class="mb-0 text-sm">Saya memahami tindakan pecegahan dan akan menghubungi operasi yang berwenang</p>
        <p class="mb-0 heading-small font-weight-bold">Pelaksana Pekerjaan</p>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="nama_pelaksana_pekerjaan">Nama</label>
                <input disabled class="form-control form-control-alternative @error('nama_pelaksana_pekerjaan') is-invalid @enderror" type="text" name="nama_pelaksana_pekerjaan" id="nama_pelaksana_pekerjaan" placeholder="Masukkan Nama ..." value="{{ old('nama_pelaksana_pekerjaan', $ijinKerja->pengesahan->nama_pelaksana_pekerjaan) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="jabatan_pelaksana_pekerjaan">Jabatan</label>
                <input disabled class="form-control form-control-alternative @error('jabatan_pelaksana_pekerjaan') is-invalid @enderror" type="text" name="jabatan_pelaksana_pekerjaan" id="jabatan_pelaksana_pekerjaan" placeholder="Masukkan Jabatan ..." value="{{ old('jabatan_pelaksana_pekerjaan', $ijinKerja->pengesahan->jabatan_pelaksana_pekerjaan) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="tanggal_pelaksana_pekerjaan">Tanggal</label>
                <input disabled class="form-control form-control-alternative @error('tanggal_pelaksana_pekerjaan') is-invalid @enderror" type="date" name="tanggal_pelaksana_pekerjaan" id="tanggal_pelaksana_pekerjaan" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal_pelaksana_pekerjaan', $ijinKerja->pengesahan->tanggal_pelaksana_pekerjaan) }}">
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <p class="mb-0 text-sm">Saya sendiri telah memeriksa lokasi dan keadaannya, ijin ini menjamin untuk pekerjaan pada saat beroperasi.</p>
        <p class="mb-0 heading-small font-weight-bold">Penanggung Jawab Area</p>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="nama_penanggung_jawab_area">Nama</label>
                <input disabled class="form-control form-control-alternative @error('nama_penanggung_jawab_area') is-invalid @enderror" type="text" name="nama_penanggung_jawab_area" id="nama_penanggung_jawab_area" placeholder="Masukkan Nama ..." value="{{ old('nama_penanggung_jawab_area', $ijinKerja->pengesahan->nama_penanggung_jawab_area) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="jabatan_penanggung_jawab_area">Jabatan</label>
                <input disabled class="form-control form-control-alternative @error('jabatan_penanggung_jawab_area') is-invalid @enderror" type="text" name="jabatan_penanggung_jawab_area" id="jabatan_penanggung_jawab_area" placeholder="Masukkan Jabatan ..." value="{{ old('jabatan_penanggung_jawab_area', $ijinKerja->pengesahan->jabatan_penanggung_jawab_area) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="tanggal_penanggung_jawab_area">Tanggal</label>
                <input disabled class="form-control form-control-alternative @error('tanggal_penanggung_jawab_area') is-invalid @enderror" type="date" name="tanggal_penanggung_jawab_area" id="tanggal_penanggung_jawab_area" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal_penanggung_jawab_area', $ijinKerja->pengesahan->tanggal_penanggung_jawab_area) }}">
            </div>
        </div>
    </div>
</div>
