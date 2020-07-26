<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">UJI KANDUNGAN GAS</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("ujiKandunganGas.update", $ijinKerja->uji_kandungan_gas_id) }}">
            @csrf @method('patch')
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="o2" name="o2" value="1" {{ old('o2', $ijinKerja->ujiKandunganGas->o2) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="o2">O2</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sebelum_pelaksanaan_pekerjaan1" name="sebelum_pelaksanaan_pekerjaan1" value="1" {{ old('sebelum_pelaksanaan_pekerjaan1', $ijinKerja->ujiKandunganGas->sebelum_pelaksanaan_pekerjaan1) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sebelum_pelaksanaan_pekerjaan1">Sebelum pelaksanaan pekerjaan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="form-control-label">Saat Pelaksanaan Pekerjaan Setiap (hari/jam)</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="saat_pelaksanaan_pekerjaan_setiap1" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('saat_pelaksanaan_pekerjaan_setiap1', $ijinKerja->ujiKandunganGas->saat_pelaksanaan_pekerjaan_setiap1) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="waktu_pelaksanaan_pekerjaan_setiap1" placeholder="Masukkan Waktu (hari/jam) ..." value="{{ old('waktu_pelaksanaan_pekerjaan_setiap1', $ijinKerja->ujiKandunganGas->waktu_pelaksanaan_pekerjaan_setiap1) }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="toxic" name="toxic" value="1" {{ old('toxic', $ijinKerja->ujiKandunganGas->toxic) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="toxic">Toxic</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sebelum_pelaksanaan_pekerjaan2" name="sebelum_pelaksanaan_pekerjaan2" value="1" {{ old('sebelum_pelaksanaan_pekerjaan2', $ijinKerja->ujiKandunganGas->sebelum_pelaksanaan_pekerjaan2) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sebelum_pelaksanaan_pekerjaan2">Sebelum pelaksanaan pekerjaan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="form-control-label">Saat Pelaksanaan Pekerjaan Setiap (hari/jam)</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="saat_pelaksanaan_pekerjaan_setiap2" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('saat_pelaksanaan_pekerjaan_setiap2', $ijinKerja->ujiKandunganGas->saat_pelaksanaan_pekerjaan_setiap2) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="waktu_pelaksanaan_pekerjaan_setiap2" placeholder="Masukkan Waktu (hari/jam) ..." value="{{ old('waktu_pelaksanaan_pekerjaan_setiap2', $ijinKerja->ujiKandunganGas->waktu_pelaksanaan_pekerjaan_setiap2) }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="combustible" name="combustible" value="1" {{ old('combustible', $ijinKerja->ujiKandunganGas->combustible) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="combustible">Goggle</label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sebelum_pelaksanaan_pekerjaan3" name="sebelum_pelaksanaan_pekerjaan3" value="1" {{ old('sebelum_pelaksanaan_pekerjaan3', $ijinKerja->ujiKandunganGas->sebelum_pelaksanaan_pekerjaan3) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sebelum_pelaksanaan_pekerjaan3">Sebelum pelaksanaan pekerjaan</label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label class="form-control-label">Saat Pelaksanaan Pekerjaan Setiap (hari/jam)</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="saat_pelaksanaan_pekerjaan_setiap3" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('saat_pelaksanaan_pekerjaan_setiap3', $ijinKerja->ujiKandunganGas->saat_pelaksanaan_pekerjaan_setiap3) ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="waktu_pelaksanaan_pekerjaan_setiap3" placeholder="Masukkan Waktu (hari/jam) ..." value="{{ old('waktu_pelaksanaan_pekerjaan_setiap3', $ijinKerja->ujiKandunganGas->waktu_pelaksanaan_pekerjaan_setiap3) }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
        </form>
    </div>
</div>
