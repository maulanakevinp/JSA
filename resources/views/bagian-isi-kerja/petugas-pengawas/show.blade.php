<p class="mb-0 heading-small font-weight-bold">PETUGAS PENGAWAS</p>
<div class="pl-lg-4 row">
    <div class="col-md-6 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Petugas Isolasi Listrik</p>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="nama_petugas_isolasi_listrik">Nama</label>
                <input disabled class="form-control" type="text" name="nama_petugas_isolasi_listrik" id="nama_petugas_isolasi_listrik" placeholder="Masukkan Nama ..." value="{{ old('nama_petugas_isolasi_listrik', $ijinKerja->petugasPengawas->nama_petugas_isolasi_listrik) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="jabatan_petugas_isolasi_listrik">Jabatan</label>
                <input disabled class="form-control" type="text" name="jabatan_petugas_isolasi_listrik" id="jabatan_petugas_isolasi_listrik" placeholder="Masukkan Jabatan ..." value="{{ old('jabatan_petugas_isolasi_listrik', $ijinKerja->petugasPengawas->jabatan_petugas_isolasi_listrik) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="tanggal_petugas_isolasi_listrik">Tanggal</label>
                <input disabled class="form-control" type="date" name="tanggal_petugas_isolasi_listrik" id="tanggal_petugas_isolasi_listrik" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal_petugas_isolasi_listrik', $ijinKerja->petugasPengawas->tanggal_petugas_isolasi_listrik) }}">
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Petugas Uji Kandungan Gas</p>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="nama_petugas_uji_kandungan_gas">Nama</label>
                <input disabled class="form-control" type="text" name="nama_petugas_uji_kandungan_gas" id="nama_petugas_uji_kandungan_gas" placeholder="Masukkan Nama ..." value="{{ old('nama_petugas_uji_kandungan_gas', $ijinKerja->petugasPengawas->nama_petugas_uji_kandungan_gas) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="jabatan_petugas_uji_kandungan_gas">Jabatan</label>
                <input disabled class="form-control" type="text" name="jabatan_petugas_uji_kandungan_gas" id="jabatan_petugas_uji_kandungan_gas" placeholder="Masukkan Jabatan ..." value="{{ old('jabatan_petugas_uji_kandungan_gas', $ijinKerja->petugasPengawas->jabatan_petugas_uji_kandungan_gas) }}">
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="tanggal_petugas_uji_kandungan_gas">Tanggal</label>
                <input disabled class="form-control" type="date" name="tanggal_petugas_uji_kandungan_gas" id="tanggal_petugas_uji_kandungan_gas" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal_petugas_uji_kandungan_gas', $ijinKerja->petugasPengawas->tanggal_petugas_uji_kandungan_gas) }}">
            </div>
        </div>
    </div>
</div>
