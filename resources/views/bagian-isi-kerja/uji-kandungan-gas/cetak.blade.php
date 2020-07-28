<table class="table table-borderless" style="font-size: 5pt">
    <tr>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" id="o2" name="o2" value="1" {{ old('o2', $ijinKerja->ujiKandunganGas->o2) ? 'checked' : '' }}>
                <label class="mb-0" for="o2">O2</label>
            </div>
        </td>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" id="sebelum_pelaksanaan_pekerjaan1" name="sebelum_pelaksanaan_pekerjaan1" value="1" {{ old('sebelum_pelaksanaan_pekerjaan1', $ijinKerja->ujiKandunganGas->sebelum_pelaksanaan_pekerjaan1) ? 'checked' : '' }}>
                <label class="mb-0" for="sebelum_pelaksanaan_pekerjaan1">Sebelum pelaksanaan pekerjaan</label>
            </div>
        </td>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" name="saat_pelaksanaan_pekerjaan_setiap1" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('saat_pelaksanaan_pekerjaan_setiap1', $ijinKerja->ujiKandunganGas->saat_pelaksanaan_pekerjaan_setiap1) ? 'checked' : '' }}>
                <label class="mb-0">Setiap {{ $ijinKerja->waktu_saat_pelaksanaan_pekerjaan_setiap1 ? $ijinKerja->waktu_saat_pelaksanaan_pekerjaan_setiap1 : ' .................................................. ' }}Jam / Hari</label>
            </div>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" id="toxic" name="toxic" value="1" {{ old('toxic', $ijinKerja->ujiKandunganGas->toxic) ? 'checked' : '' }}>
                <label class="mb-0" for="toxic">Toxic</label>
            </div>
        </td>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" id="sebelum_pelaksanaan_pekerjaan2" name="sebelum_pelaksanaan_pekerjaan2" value="1" {{ old('sebelum_pelaksanaan_pekerjaan2', $ijinKerja->ujiKandunganGas->sebelum_pelaksanaan_pekerjaan2) ? 'checked' : '' }}>
                <label class="mb-0" for="sebelum_pelaksanaan_pekerjaan2">Sebelum pelaksanaan pekerjaan</label>
            </div>
        </td>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" name="saat_pelaksanaan_pekerjaan_setiap2" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('saat_pelaksanaan_pekerjaan_setiap2', $ijinKerja->ujiKandunganGas->saat_pelaksanaan_pekerjaan_setiap2) ? 'checked' : '' }}>
                <label class="mb-0">Setiap {{ $ijinKerja->waktu_saat_pelaksanaan_pekerjaan_setiap2 ? $ijinKerja->waktu_saat_pelaksanaan_pekerjaan_setiap2 : ' .................................................. ' }}Jam / Hari</label>
            </div>
        </td>
    </tr>
    <tr>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" id="combustible" name="combustible" value="1" {{ old('combustible', $ijinKerja->ujiKandunganGas->combustible) ? 'checked' : '' }}>
                <label class="mb-0" for="combustible">Goggle</label>
            </div>
        </td>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" id="sebelum_pelaksanaan_pekerjaan3" name="sebelum_pelaksanaan_pekerjaan3" value="1" {{ old('sebelum_pelaksanaan_pekerjaan3', $ijinKerja->ujiKandunganGas->sebelum_pelaksanaan_pekerjaan3) ? 'checked' : '' }}>
                <label class="mb-0" for="sebelum_pelaksanaan_pekerjaan3">Sebelum pelaksanaan pekerjaan</label>
            </div>
        </td>
        <td class="p-1">
            <div class="mb-0">
                <input type="checkbox" class="cawang" name="saat_pelaksanaan_pekerjaan_setiap3" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('saat_pelaksanaan_pekerjaan_setiap3', $ijinKerja->ujiKandunganGas->saat_pelaksanaan_pekerjaan_setiap3) ? 'checked' : '' }}>
                <label class="mb-0">Setiap {{ $ijinKerja->waktu_saat_pelaksanaan_pekerjaan_setiap3 ? $ijinKerja->waktu_saat_pelaksanaan_pekerjaan_setiap3 : ' .................................................. ' }}Jam / Hari</label>
            </div>
        </td>
    </tr>
</table>
