@extends('layouts.app')

@section('title', 'Detail Ijin Kerja Di Ketinggian')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Ijin Kerja Di Ketinggian</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Di Ketinggian {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ URL::previous() }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Detail Ijin Kerja Di Ketinggian</h3>
            </div>
            <div class="card-body">
                @include('bagian-isi-kerja.umum.show')
                <hr>
                @include('bagian-isi-kerja.alat-pelindung-diri.show')
                <hr>
                @include('bagian-isi-kerja.dokumen-pendukung.show')
                <hr>
                <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                <div class="pl-lg-4">
                    <p class="mb-0 text-sm font-weight-bold">General</p>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">1. Apakah sebagian pekerjaan dapat dikerjakan dipermukaan tanah?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah == 1 ? 'checked' : '' }} name="sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah" value="{{ $ijinKerja->keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Apakah jarak ketinggian sudah diketahui?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->jarak_ketinggian_sudah_diketahui == 1 ? 'checked' : '' }} name="jarak_ketinggian_sudah_diketahui" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jarak_ketinggian_sudah_diketahui" value="{{ $ijinKerja->keterangan_jarak_ketinggian_sudah_diketahui }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">3. Apakah terdapat bahaya angin?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->terdapat_bahaya_angin == 1 ? 'checked' : '' }} name="terdapat_bahaya_angin" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_terdapat_bahaya_angin" value="{{ $ijinKerja->keterangan_terdapat_bahaya_angin }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">4. Apakah area kerja sudah terbebas dari bahaya benda jatuh?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh == 1 ? 'checked' : '' }} name="area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh" value="{{ $ijinKerja->keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">5. Apakah area kerja sudah terbebas dari semua aliran listrik? (diberikan pengaman atau isolasi)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->area_kerja_sudah_terbebas_dari_semua_aliran_listrik == 1 ? 'checked' : '' }} name="area_kerja_sudah_terbebas_dari_semua_aliran_listrik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik" value="{{ $ijinKerja->keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">6. Apakah area kerja berada di permukaan yang landai?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->area_kerja_berada_dipermukaan_yang_landai == 1 ? 'checked' : '' }} name="area_kerja_berada_dipermukaan_yang_landai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_area_kerja_berada_dipermukaan_yang_landai" value="{{ $ijinKerja->keterangan_area_kerja_berada_dipermukaan_yang_landai }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">7. Apakah area kerja berada di permukaan yang basah/becek/berlumpur?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->area_kerja_berada_di_permukaan_yang_basah == 1 ? 'checked' : '' }} name="area_kerja_berada_di_permukaan_yang_basah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_area_kerja_berada_di_permukaan_yang_basah" value="{{ $ijinKerja->keterangan_area_kerja_berada_di_permukaan_yang_basah }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">8. Apakah area kerja berada di ruang yang sempit?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->area_kerja_berada_di_ruang_yang_sempit == 1 ? 'checked' : '' }} name="area_kerja_berada_di_ruang_yang_sempit" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_area_kerja_berada_di_ruang_yang_sempit" value="{{ $ijinKerja->keterangan_area_kerja_berada_di_ruang_yang_sempit }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">9. Apakah pekerja bekerja sendiri?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->pekerja_bekerja_sendiri == 1 ? 'checked' : '' }} name="pekerja_bekerja_sendiri" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_pekerja_bekerja_sendiri" value="{{ $ijinKerja->keterangan_pekerja_bekerja_sendiri }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">10. Apakah area kerja perlu dipasang barikade?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->area_kerja_perlu_dipasang_barikade == 1 ? 'checked' : '' }} name="area_kerja_perlu_dipasang_barikade" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_area_kerja_perlu_dipasang_barikade" value="{{ $ijinKerja->keterangan_area_kerja_perlu_dipasang_barikade }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">11. Apakah tersedia rambu keselamatan?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->tersedia_rambu_keselamatan == 1 ? 'checked' : '' }} name="tersedia_rambu_keselamatan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_tersedia_rambu_keselamatan" value="{{ $ijinKerja->keterangan_tersedia_rambu_keselamatan }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                    <p class="mb-0 font-weight-bold text-sm">Alat perancah (Scaffolding)</p>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">1. Apakah alat perancah merupakan alat yang bantu yang paling sesuai untuk digunakan pada pekerjaan di ketinggian?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->alat_perancah_digunakan_pada_pekerjaan_di_ketinggian == 1 ? 'checked' : '' }} name="alat_perancah_digunakan_pada_pekerjaan_di_ketinggian" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian" value="{{ $ijinKerja->keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Apakah alat perancah disusun oleh petugas alat perancah? (Sesuai Prosedur Operasi No. O-005/0.24)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->alat_perancah_disusun_oleh_petugas_alat_perancah == 1 ? 'checked' : '' }} name="alat_perancah_disusun_oleh_petugas_alat_perancah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah" value="{{ $ijinKerja->keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">3. Apakah komponen-komponen alat perancah dalam kondisi yang baik? (Sesuai Prosedur Operasi No. O-005/0.24)</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->komponen_alat_perancah_dalam_kondisi_yang_baik == 1 ? 'checked' : '' }} name="komponen_alat_perancah_dalam_kondisi_yang_baik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik" value="{{ $ijinKerja->keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">4. Apakah komponen-komponen alat perancah sudah terpasang dengan baik?</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" {{ $ijinKerja->komponen_alat_perancah_sudah_terpasang == 1 ? 'checked' : '' }} name="komponen_alat_perancah_sudah_terpasang" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_komponen_alat_perancah_sudah_terpasang" value="{{ $ijinKerja->keterangan_komponen_alat_perancah_sudah_terpasang }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @include('bagian-isi-kerja.pengesahan.show')
                <hr>
                <p class="mb-0 heading-small font-weight-bold">VALIDASI</p>
                <div id="validasi" class="pl-lg-4">
                    @forelse ($ijinKerja->validasi as $validasi)
                        <div class="row mb-0">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled disabled value="{{ $validasi->validasi_hari }}" class="form-control form-control-alternative" type="date" name="validasi_hari[]" id="validasi_hari" data-placeholder="Masukkan Hari ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <input disabled disabled value="{{ $validasi->validasi_mulai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_mulai_hari[]" id="validasi_mulai_hari" data-placeholder="Masukkan Waktu Mulai ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <input disabled disabled value="{{ $validasi->validasi_selesai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_selesai_hari[]" id="validasi_selesai_hari" data-placeholder="Masukkan Waktu Selesai ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled disabled value="{{ $validasi->nama_pelaksana }}" class="form-control form-control-alternative" type="text" name="nama_pelaksana[]" id="nama_pelaksana" data-placeholder="Masukkan Nama Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled disabled value="{{ $validasi->inisial_pelaksana }}" class="form-control form-control-alternative" type="text" name="inisial_pelaksana[]" id="inisial_pelaksana" data-placeholder="Masukkan Inisial Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled disabled value="{{ $validasi->nama_pengawas }}" class="form-control form-control-alternative" type="text" name="nama_pengawas[]" id="nama_pengawas" data-placeholder="Masukkan Nama Pengawas ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled disabled value="{{ $validasi->inisial_pengawas }}" class="form-control form-control-alternative" type="text" name="inisial_pengawas[]" id="inisial_pengawas" data-placeholder="Masukkan Inisial Pengawas ...">
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class=mt-0>
                            </div>
                        </div>
                    @empty
                        <h3>Belum ada data validasi</h3>
                    @endforelse
                </div>
                <hr>
                <h6 class="heading-small text-muted">Tangga (Ladder / Step Ladder)</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">1. Apakah tangga merupakan alat yang bantu yang paling sesuai untuk digunakan pada pekerjaan di ketinggian?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" {{ $ijinKerja->tangga_merupakan_alat_yang_bantu_yang_paling_sesuai == 1 ? 'checked' : '' }} name="tangga_merupakan_alat_yang_bantu_yang_paling_sesuai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai" value="{{ $ijinKerja->keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">2. Apakah tangga dalam kondisi layak dan sesuai untuk digunakan?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" {{ $ijinKerja->tangga_dalam_kondisi_layak_dan_sesuai == 1 ? 'checked' : '' }} name="tangga_dalam_kondisi_layak_dan_sesuai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_tangga_dalam_kondisi_layak_dan_sesuai" value="{{ $ijinKerja->keterangan_tangga_dalam_kondisi_layak_dan_sesuai }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">3. Apakah tangga mampu menahan gerakan saat naik/turun dan bekerja?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" {{ $ijinKerja->tangga_mampu_menahan_gerakan == 1 ? 'checked' : '' }} name="tangga_mampu_menahan_gerakan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_tangga_mampu_menahan_gerakan" value="{{ $ijinKerja->keterangan_tangga_mampu_menahan_gerakan }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">4. Apakah tangga memiliki panjang yang cukup untuk digunakan?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" {{ $ijinKerja->tangga_memiliki_panjang_yang_cukup == 1 ? 'checked' : '' }} name="tangga_memiliki_panjang_yang_cukup" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_tangga_memiliki_panjang_yang_cukup" value="{{ $ijinKerja->keterangan_tangga_memiliki_panjang_yang_cukup }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">5. Apakah tangga memiliki stopper/pin/pengunci yang dapat digunakan?</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" {{ $ijinKerja->tangga_memiliki_stopper == 1 ? 'checked' : '' }} name="tangga_memiliki_stopper" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_tangga_memiliki_stopper" value="{{ $ijinKerja->keterangan_tangga_memiliki_stopper }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">6. Apakah pekerja menggunakan peralatan lain saat bekerja? (jika "YA", pekerja harus menggunakan belt)</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" {{ $ijinKerja->pekerja_menggunakan_peralatan_lain == 1 ? 'checked' : '' }} name="pekerja_menggunakan_peralatan_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_pekerja_menggunakan_peralatan_lain" value="{{ $ijinKerja->keterangan_pekerja_menggunakan_peralatan_lain }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="form-control-label" for="catatan">Catatan</label>
                    <textarea class="form-control" type="text" name="catatan" id="catatan" data-data-placeholder="Masukkan Catatan ..." disabled>{{ $ijinKerja->catatan }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
