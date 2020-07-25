<p class="mb-0 heading-small font-weight-bold">PETUGAS PENGAWAS</p>
<div class="pl-lg-4 row">
    <div class="col-md-6 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Petugas Isolasi Listrik</p>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="nama_petugas_isolasi_listrik">Nama</label>
                <input class="form-control form-control-alternative @error('nama_petugas_isolasi_listrik') is-invalid @enderror" type="text" name="nama_petugas_isolasi_listrik" id="nama_petugas_isolasi_listrik" placeholder="Masukkan Nama ..." value="{{ old('nama_petugas_isolasi_listrik', $ijinKerja->petugasPengawas->nama_petugas_isolasi_listrik) }}">
                @error('nama_petugas_isolasi_listrik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="jabatan_petugas_isolasi_listrik">Jabatan</label>
                <input class="form-control form-control-alternative @error('jabatan_petugas_isolasi_listrik') is-invalid @enderror" type="text" name="jabatan_petugas_isolasi_listrik" id="jabatan_petugas_isolasi_listrik" placeholder="Masukkan Jabatan ..." value="{{ old('jabatan_petugas_isolasi_listrik', $ijinKerja->petugasPengawas->jabatan_petugas_isolasi_listrik) }}">
                @error('jabatan_petugas_isolasi_listrik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="tanggal_petugas_isolasi_listrik">Tanggal</label>
                <input class="form-control form-control-alternative @error('tanggal_petugas_isolasi_listrik') is-invalid @enderror" type="date" name="tanggal_petugas_isolasi_listrik" id="tanggal_petugas_isolasi_listrik" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal_petugas_isolasi_listrik', $ijinKerja->petugasPengawas->tanggal_petugas_isolasi_listrik) }}">
                @error('tanggal_petugas_isolasi_listrik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <p class="mb-0 heading-small font-weight-bold">Petugas Uji Kandungan Gas</p>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="nama_petugas_uji_kandungan_gas">Nama</label>
                <input class="form-control form-control-alternative @error('nama_petugas_uji_kandungan_gas') is-invalid @enderror" type="text" name="nama_petugas_uji_kandungan_gas" id="nama_petugas_uji_kandungan_gas" placeholder="Masukkan Nama ..." value="{{ old('nama_petugas_uji_kandungan_gas', $ijinKerja->petugasPengawas->nama_petugas_uji_kandungan_gas) }}">
                @error('nama_petugas_uji_kandungan_gas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="jabatan_petugas_uji_kandungan_gas">Jabatan</label>
                <input class="form-control form-control-alternative @error('jabatan_petugas_uji_kandungan_gas') is-invalid @enderror" type="text" name="jabatan_petugas_uji_kandungan_gas" id="jabatan_petugas_uji_kandungan_gas" placeholder="Masukkan Jabatan ..." value="{{ old('jabatan_petugas_uji_kandungan_gas', $ijinKerja->petugasPengawas->jabatan_petugas_uji_kandungan_gas) }}">
                @error('jabatan_petugas_uji_kandungan_gas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="pl-lg-4">
            <div class="form-group">
                <label class="form-control-label" for="tanggal_petugas_uji_kandungan_gas">Tanggal</label>
                <input class="form-control form-control-alternative @error('tanggal_petugas_uji_kandungan_gas') is-invalid @enderror" type="date" name="tanggal_petugas_uji_kandungan_gas" id="tanggal_petugas_uji_kandungan_gas" placeholder="Masukkan Tanggal ..." value="{{ old('tanggal_petugas_uji_kandungan_gas', $ijinKerja->petugasPengawas->tanggal_petugas_uji_kandungan_gas) }}">
                @error('tanggal_petugas_uji_kandungan_gas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
