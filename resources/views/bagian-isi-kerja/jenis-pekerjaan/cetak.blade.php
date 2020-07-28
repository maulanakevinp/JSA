<div class="row px-3">
    <div class="col-6 mb-3">
        <div class="mb-0">
            <input type="checkbox" class="cawang" id="menimbulkan_api" name="menimbulkan_api" value="1" {{ old('menimbulkan_api', $ijinKerja->jenisPekerjaan->menimbulkan_api) ? 'checked' : '' }}>
            <label class="mb-0" for="menimbulkan_api">Menimbulkan Api</label>
        </div>
        <div class="mb-0">
            <input type="checkbox" class="cawang" id="menimbulkan_bunga_api" name="menimbulkan_bunga_api" value="1" {{ old('menimbulkan_bunga_api', $ijinKerja->jenisPekerjaan->menimbulkan_bunga_api) ? 'checked' : '' }}>
            <label class="mb-0" for="menimbulkan_bunga_api">Menimbulkan Bunga Api</label>
        </div>
        <div class="mb-0">
            <input type="checkbox" class="cawang" id="mesin_gerinda_or_alat_potong" name="mesin_gerinda_or_alat_potong" value="1" {{ old('mesin_gerinda_or_alat_potong', $ijinKerja->jenisPekerjaan->mesin_gerinda_or_alat_potong) ? 'checked' : '' }}>
            <label class="mb-0" for="mesin_gerinda_or_alat_potong">Mesin Gerinda/Alat Potong</label>
        </div>
    </div>
    <div class="col-6 mb-3">
        <div class="mb-0">
            <input type="checkbox" class="cawang" id="hot_tapping" name="hot_tapping" value="1" {{ old('hot_tapping', $ijinKerja->jenisPekerjaan->hot_tapping) ? 'checked' : '' }}>
            <label class="mb-0" for="hot_tapping">Hot Tapping</label>
        </div>
        <div class="mb-0">
            <input type="checkbox" class="cawang" id="menyalakan_flare" name="menyalakan_flare" value="1" {{ old('menyalakan_flare', $ijinKerja->jenisPekerjaan->menyalakan_flare) ? 'checked' : '' }}>
            <label class="mb-0" for="menyalakan_flare">Menyalakan Flare</label>
        </div>
        <div class="mb-0">
            <input type="checkbox" class="cawang" id="lainnya_jenis_pekerjaan" name="lainnya_jenis_pekerjaan" value="1" {{ old('lainnya_jenis_pekerjaan', $ijinKerja->jenisPekerjaan->lainnya_jenis_pekerjaan) ? 'checked' : '' }}>
            <label class="mb-0" for="lainnya_jenis_pekerjaan">Lainnya</label>
        </div>
    </div>
</div>
