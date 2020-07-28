<table class="table table-bordered" style="font-size: 6pt">
    <tr>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="alat_listrik" name="alat_listrik" value="1" {{ old('alat_listrik', $ijinKerja->sumberBahayaAlat->alat_listrik) ? 'checked' : '' }}>
            <label class="mb-0" for="alat_listrik">Alat Listrik</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="moving_part" name="moving_part" value="1" {{ old('moving_part', $ijinKerja->sumberBahayaAlat->moving_part) ? 'checked' : '' }}>
            <label class="mb-0" for="moving_part">Moving Part</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="crane" name="crane" value="1" {{ old('crane', $ijinKerja->sumberBahayaAlat->crane) ? 'checked' : '' }}>
            <label class="mb-0" for="crane">Crane</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="generator_or_compressor" name="generator_or_compressor" value="1" {{ old('generator_or_compressor', $ijinKerja->sumberBahayaAlat->generator_or_compressor) ? 'checked' : '' }}>
            <label class="mb-0" for="generator_or_compressor">Generator/Compressor</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="akses_sulit" name="akses_sulit" value="1" {{ old('akses_sulit', $ijinKerja->sumberBahayaAlat->akses_sulit) ? 'checked' : '' }}>
            <label class="mb-0" for="akses_sulit">Akses Sulit</label>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="gas" name="gas" value="1" {{ old('gas', $ijinKerja->sumberBahayaAlat->gas) ? 'checked' : '' }}>
            <label class="mb-0" for="gas">Gas</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="bahan_kimia" name="bahan_kimia" value="1" {{ old('bahan_kimia', $ijinKerja->sumberBahayaAlat->bahan_kimia) ? 'checked' : '' }}>
            <label class="mb-0" for="bahan_kimia">Bahan Kimia</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="bising" name="bising" value="1" {{ old('bising', $ijinKerja->sumberBahayaAlat->bising) ? 'checked' : '' }}>
            <label class="mb-0" for="bising">Bising</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="kejatuhan" name="kejatuhan" value="1" {{ old('kejatuhan', $ijinKerja->sumberBahayaAlat->kejatuhan) ? 'checked' : '' }}>
            <label class="mb-0" for="kejatuhan">Kejatuhan</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="media_panas_or_dingin" name="media_panas_or_dingin" value="1" {{ old('media_panas_or_dingin', $ijinKerja->sumberBahayaAlat->media_panas_or_dingin) ? 'checked' : '' }}>
            <label class="mb-0" for="media_panas_or_dingin">Media Panas/Dingin</label>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="ergonomi" name="ergonomi" value="1" {{ old('ergonomi', $ijinKerja->sumberBahayaAlat->ergonomi) ? 'checked' : '' }}>
            <label class="mb-0" for="ergonomi">Ergonomi</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="bertekanan" name="bertekanan" value="1" {{ old('bertekanan', $ijinKerja->sumberBahayaAlat->bertekanan) ? 'checked' : '' }}>
            <label class="mb-0" for="bertekanan">Bertekanan</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="mudah_terbakar" name="mudah_terbakar" value="1" {{ old('mudah_terbakar', $ijinKerja->sumberBahayaAlat->mudah_terbakar) ? 'checked' : '' }}>
            <label class="mb-0" for="mudah_terbakar">Mudah Terbakar</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="biologi" name="biologi" value="1" {{ old('biologi', $ijinKerja->sumberBahayaAlat->biologi) ? 'checked' : '' }}>
            <label class="mb-0" for="biologi">Biologi</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="blasting" name="blasting" value="1" {{ old('blasting', $ijinKerja->sumberBahayaAlat->blasting) ? 'checked' : '' }}>
            <label class="mb-0" for="blasting">Blasting</label>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="penggalan" name="penggalan" value="1" {{ old('penggalan', $ijinKerja->sumberBahayaAlat->penggalan) ? 'checked' : '' }}>
            <label class="mb-0" for="penggalan">Penggalan</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="bising" name="bising" value="1" {{ old('bising', $ijinKerja->sumberBahayaAlat->bising) ? 'checked' : '' }}>
            <label class="mb-0" for="bising">Bising</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="kejatuhan" name="kejatuhan" value="1" {{ old('kejatuhan', $ijinKerja->sumberBahayaAlat->kejatuhan) ? 'checked' : '' }}>
            <label class="mb-0" for="kejatuhan">Kejatuhan</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="grinding" name="grinding" value="1" {{ old('grinding', $ijinKerja->sumberBahayaAlat->grinding) ? 'checked' : '' }}>
            <label class="mb-0" for="grinding">Grinding</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="cuaca_buruk" name="cuaca_buruk" value="1" {{ old('cuaca_buruk', $ijinKerja->sumberBahayaAlat->cuaca_buruk) ? 'checked' : '' }}>
            <label class="mb-0" for="cuaca_buruk">Cuaca Buruk</label>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="materi_berbahaya" name="materi_berbahaya" value="1" {{ old('materi_berbahaya', $ijinKerja->sumberBahayaAlat->materi_berbahaya) ? 'checked' : '' }}>
            <label class="mb-0" for="materi_berbahaya">Materi Berbahaya</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="Pilling" name="Pilling" value="1" {{ old('Pilling', $ijinKerja->sumberBahayaAlat->Pilling) ? 'checked' : '' }}>
            <label class="mb-0" for="Pilling">Bising</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="paparan_panas_matahari" name="paparan_panas_matahari" value="1" {{ old('paparan_panas_matahari', $ijinKerja->sumberBahayaAlat->paparan_panas_matahari) ? 'checked' : '' }}>
            <label class="mb-0" for="paparan_panas_matahari">Paparan Panas Matahari</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="pigging" name="pigging" value="1" {{ old('pigging', $ijinKerja->sumberBahayaAlat->pigging) ? 'checked' : '' }}>
            <label class="mb-0" for="pigging">Pigging</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="lifting" name="lifting" value="1" {{ old('lifting', $ijinKerja->sumberBahayaAlat->lifting) ? 'checked' : '' }}>
            <label class="mb-0" for="lifting">Lifting</label>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="drilling" name="drilling" value="1" {{ old('drilling', $ijinKerja->sumberBahayaAlat->drilling) ? 'checked' : '' }}>
            <label class="mb-0" for="drilling">Drilling</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="blowdown" name="blowdown" value="1" {{ old('blowdown', $ijinKerja->sumberBahayaAlat->blowdown) ? 'checked' : '' }}>
            <label class="mb-0" for="blowdown">Blowdown</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="uji_bertekanan" name="uji_bertekanan" value="1" {{ old('uji_bertekanan', $ijinKerja->sumberBahayaAlat->uji_bertekanan) ? 'checked' : '' }}>
            <label class="mb-0" for="uji_bertekanan">Uji Bertekanan</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="junction_box_opening" name="junction_box_opening" value="1" {{ old('junction_box_opening', $ijinKerja->sumberBahayaAlat->junction_box_opening) ? 'checked' : '' }}>
            <label class="mb-0" for="junction_box_opening">Junction Box Opening</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="hot_cutting" name="hot_cutting" value="1" {{ old('hot_cutting', $ijinKerja->sumberBahayaAlat->hot_cutting) ? 'checked' : '' }}>
            <label class="mb-0" for="hot_cutting">Hot Cutting</label>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="bongkar_muat" name="bongkar_muat" value="1" {{ old('bongkar_muat', $ijinKerja->sumberBahayaAlat->bongkar_muat) ? 'checked' : '' }}>
            <label class="mb-0" for="bongkar_muat">Bongkar Muat</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="power_brushing" name="power_brushing" value="1" {{ old('power_brushing', $ijinKerja->sumberBahayaAlat->power_brushing) ? 'checked' : '' }}>
            <label class="mb-0" for="power_brushing">Power Brushing</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="interlock_bypass" name="interlock_bypass" value="1" {{ old('interlock_bypass', $ijinKerja->sumberBahayaAlat->interlock_bypass) ? 'checked' : '' }}>
            <label class="mb-0" for="interlock_bypass">Interlock Bypass</label>
        </td>
        <td class="p-1">
            <input type="checkbox" class="cawang" id="lainnya_sumber_bahaya_alat" name="lainnya_sumber_bahaya_alat" value="1" {{ old('lainnya_sumber_bahaya_alat', $ijinKerja->sumberBahayaAlat->lainnya_sumber_bahaya_alat) ? 'checked' : '' }}>
            <label class="mb-0" for="lainnya_sumber_bahaya_alat">Lainnya</label>
        </td>
    </tr>
</table>
