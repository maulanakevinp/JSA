<h6 class="heading-small text-muted">SUMBER BAHAYA ALAT/KEGIATAN</h6>
<div class="pl-lg-4 row">
    <div class="col-md-3 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="alat_listrik" name="alat_listrik" value="1" {{ old('alat_listrik', $ijinKerja->sumberBahayaAlat->alat_listrik) ? 'checked' : '' }}>
            <label class="custom-control-label" for="alat_listrik">Alat Listrik</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="moving_part" name="moving_part" value="1" {{ old('moving_part', $ijinKerja->sumberBahayaAlat->moving_part) ? 'checked' : '' }}>
            <label class="custom-control-label" for="moving_part">Moving Part</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="crane" name="crane" value="1" {{ old('crane', $ijinKerja->sumberBahayaAlat->crane) ? 'checked' : '' }}>
            <label class="custom-control-label" for="crane">Crane</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="generator_or_compressor" name="generator_or_compressor" value="1" {{ old('generator_or_compressor', $ijinKerja->sumberBahayaAlat->generator_or_compressor) ? 'checked' : '' }}>
            <label class="custom-control-label" for="generator_or_compressor">Generator/Compressor</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="akses_sulit" name="akses_sulit" value="1" {{ old('akses_sulit', $ijinKerja->sumberBahayaAlat->akses_sulit) ? 'checked' : '' }}>
            <label class="custom-control-label" for="akses_sulit">Akses Sulit</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="gas" name="gas" value="1" {{ old('gas', $ijinKerja->sumberBahayaAlat->gas) ? 'checked' : '' }}>
            <label class="custom-control-label" for="gas">Gas</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="bahan_kimia" name="bahan_kimia" value="1" {{ old('bahan_kimia', $ijinKerja->sumberBahayaAlat->bahan_kimia) ? 'checked' : '' }}>
            <label class="custom-control-label" for="bahan_kimia">Bahan Kimia</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="bising" name="bising" value="1" {{ old('bising', $ijinKerja->sumberBahayaAlat->bising) ? 'checked' : '' }}>
            <label class="custom-control-label" for="bising">Bising</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="kejatuhan" name="kejatuhan" value="1" {{ old('kejatuhan', $ijinKerja->sumberBahayaAlat->kejatuhan) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kejatuhan">Kejatuhan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="media_panas_or_dingin" name="media_panas_or_dingin" value="1" {{ old('media_panas_or_dingin', $ijinKerja->sumberBahayaAlat->media_panas_or_dingin) ? 'checked' : '' }}>
            <label class="custom-control-label" for="media_panas_or_dingin">Media Panas/Dingin</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="ergonomi" name="ergonomi" value="1" {{ old('ergonomi', $ijinKerja->sumberBahayaAlat->ergonomi) ? 'checked' : '' }}>
            <label class="custom-control-label" for="ergonomi">Ergonomi</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="bertekanan" name="bertekanan" value="1" {{ old('bertekanan', $ijinKerja->sumberBahayaAlat->bertekanan) ? 'checked' : '' }}>
            <label class="custom-control-label" for="bertekanan">Bertekanan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="mudah_terbakar" name="mudah_terbakar" value="1" {{ old('mudah_terbakar', $ijinKerja->sumberBahayaAlat->mudah_terbakar) ? 'checked' : '' }}>
            <label class="custom-control-label" for="mudah_terbakar">Mudah Terbakar</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="biologi" name="biologi" value="1" {{ old('biologi', $ijinKerja->sumberBahayaAlat->biologi) ? 'checked' : '' }}>
            <label class="custom-control-label" for="biologi">Biologi</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="blasting" name="blasting" value="1" {{ old('blasting', $ijinKerja->sumberBahayaAlat->blasting) ? 'checked' : '' }}>
            <label class="custom-control-label" for="blasting">Blasting</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="penggalan" name="penggalan" value="1" {{ old('penggalan', $ijinKerja->sumberBahayaAlat->penggalan) ? 'checked' : '' }}>
            <label class="custom-control-label" for="penggalan">Penggalan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="bising" name="bising" value="1" {{ old('bising', $ijinKerja->sumberBahayaAlat->bising) ? 'checked' : '' }}>
            <label class="custom-control-label" for="bising">Bising</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="kejatuhan" name="kejatuhan" value="1" {{ old('kejatuhan', $ijinKerja->sumberBahayaAlat->kejatuhan) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kejatuhan">Kejatuhan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="grinding" name="grinding" value="1" {{ old('grinding', $ijinKerja->sumberBahayaAlat->grinding) ? 'checked' : '' }}>
            <label class="custom-control-label" for="grinding">Grinding</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="cuaca_buruk" name="cuaca_buruk" value="1" {{ old('cuaca_buruk', $ijinKerja->sumberBahayaAlat->cuaca_buruk) ? 'checked' : '' }}>
            <label class="custom-control-label" for="cuaca_buruk">Cuaca Buruk</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="materi_berbahaya" name="materi_berbahaya" value="1" {{ old('materi_berbahaya', $ijinKerja->sumberBahayaAlat->materi_berbahaya) ? 'checked' : '' }}>
            <label class="custom-control-label" for="materi_berbahaya">Materi Berbahaya</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="Pilling" name="Pilling" value="1" {{ old('Pilling', $ijinKerja->sumberBahayaAlat->Pilling) ? 'checked' : '' }}>
            <label class="custom-control-label" for="Pilling">Bising</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="paparan_panas_matahari" name="paparan_panas_matahari" value="1" {{ old('paparan_panas_matahari', $ijinKerja->sumberBahayaAlat->paparan_panas_matahari) ? 'checked' : '' }}>
            <label class="custom-control-label" for="paparan_panas_matahari">Paparan Panas Matahari</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="pigging" name="pigging" value="1" {{ old('pigging', $ijinKerja->sumberBahayaAlat->pigging) ? 'checked' : '' }}>
            <label class="custom-control-label" for="pigging">Pigging</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="lifting" name="lifting" value="1" {{ old('lifting', $ijinKerja->sumberBahayaAlat->lifting) ? 'checked' : '' }}>
            <label class="custom-control-label" for="lifting">Lifting</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="drilling" name="drilling" value="1" {{ old('drilling', $ijinKerja->sumberBahayaAlat->drilling) ? 'checked' : '' }}>
            <label class="custom-control-label" for="drilling">Drilling</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="blowdown" name="blowdown" value="1" {{ old('blowdown', $ijinKerja->sumberBahayaAlat->blowdown) ? 'checked' : '' }}>
            <label class="custom-control-label" for="blowdown">Blowdown</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="uji_bertekanan" name="uji_bertekanan" value="1" {{ old('uji_bertekanan', $ijinKerja->sumberBahayaAlat->uji_bertekanan) ? 'checked' : '' }}>
            <label class="custom-control-label" for="uji_bertekanan">Uji Bertekanan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="junction_box_opening" name="junction_box_opening" value="1" {{ old('junction_box_opening', $ijinKerja->sumberBahayaAlat->junction_box_opening) ? 'checked' : '' }}>
            <label class="custom-control-label" for="junction_box_opening">Junction Box Opening</label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="hot_cutting" name="hot_cutting" value="1" {{ old('hot_cutting', $ijinKerja->sumberBahayaAlat->hot_cutting) ? 'checked' : '' }}>
            <label class="custom-control-label" for="hot_cutting">Hot Cutting</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="bongkar_muat" name="bongkar_muat" value="1" {{ old('bongkar_muat', $ijinKerja->sumberBahayaAlat->bongkar_muat) ? 'checked' : '' }}>
            <label class="custom-control-label" for="bongkar_muat">Bongkar Muat</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="power_brushing" name="power_brushing" value="1" {{ old('power_brushing', $ijinKerja->sumberBahayaAlat->power_brushing) ? 'checked' : '' }}>
            <label class="custom-control-label" for="power_brushing">Power Brushing</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="interlock_bypass" name="interlock_bypass" value="1" {{ old('interlock_bypass', $ijinKerja->sumberBahayaAlat->interlock_bypass) ? 'checked' : '' }}>
            <label class="custom-control-label" for="interlock_bypass">Interlock Bypass</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="lainnya_sumber_bahaya_alat" name="lainnya_sumber_bahaya_alat" value="1" {{ old('lainnya_sumber_bahaya_alat', $ijinKerja->sumberBahayaAlat->lainnya_sumber_bahaya_alat) ? 'checked' : '' }}>
            <label class="custom-control-label" for="lainnya_sumber_bahaya_alat">Lainnya</label>
        </div>
    </div>
</div>
