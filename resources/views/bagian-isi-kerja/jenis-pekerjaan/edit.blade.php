<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">JENIS PEKERJAAN</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("jenisPekerjaan.update", $ijinKerja->jenis_pekerjaan_id) }}">
            @csrf @method('patch')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="menimbulkan_api" name="menimbulkan_api" value="1" {{ old('menimbulkan_api', $ijinKerja->jenisPekerjaan->menimbulkan_api) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="menimbulkan_api">Menimbulkan Api</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="menimbulkan_bunga_api" name="menimbulkan_bunga_api" value="1" {{ old('menimbulkan_bunga_api', $ijinKerja->jenisPekerjaan->menimbulkan_bunga_api) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="menimbulkan_bunga_api">Menimbulkan Bunga Api</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="mesin_gerinda_or_alat_potong" name="mesin_gerinda_or_alat_potong" value="1" {{ old('mesin_gerinda_or_alat_potong', $ijinKerja->jenisPekerjaan->mesin_gerinda_or_alat_potong) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="mesin_gerinda_or_alat_potong">Mesin Gerinda/Alat Potong</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="hot_tapping_jenis_pekerjaan" name="hot_tapping_jenis_pekerjaan" value="1" {{ old('hot_tapping_jenis_pekerjaan', $ijinKerja->jenisPekerjaan->hot_tapping_jenis_pekerjaan) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="hot_tapping_jenis_pekerjaan">Hot Tapping</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="menyalakan_flare" name="menyalakan_flare" value="1" {{ old('menyalakan_flare', $ijinKerja->jenisPekerjaan->menyalakan_flare) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="menyalakan_flare">Menyalakan Flare</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="lainnya_jenis_pekerjaan" name="lainnya_jenis_pekerjaan" value="1" {{ old('lainnya_jenis_pekerjaan', $ijinKerja->jenisPekerjaan->lainnya_jenis_pekerjaan) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="lainnya_jenis_pekerjaan">Lainnya</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
        </form>
    </div>
</div>
