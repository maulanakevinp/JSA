@extends('layouts.app')

@section('title', 'Edit Ijin Kerja Di Ketinggian')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Ijin Kerja Di Ketinggian</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Di Ketinggian {{ config('app.name') }}</p>
                                <p class="mb-0 text-sm">{{ $ijinKerja->jsa->nama_perusahaan }} - {{ $ijinKerja->jsa->no_jsa }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-di-ketinggian.index', $ijinKerja->jsa_id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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

@include('bagian-isi-kerja.umum.edit')
@include('bagian-isi-kerja.alat-pelindung-diri.edit')
@include('bagian-isi-kerja.dokumen-pendukung.edit')

<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">SAFETY CHECKLIST</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("ijinKerjaDiKetinggian.update", $ijinKerja->id) }}">
            @csrf @method('patch')
            <p class="mb-0 text-sm font-weight-bold">General</p>
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label">1. Apakah sebagian pekerjaan dapat dikerjakan dipermukaan tanah?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah == 1 ? 'checked' : '' }} name="sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah" value="{{ $ijinKerja->keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">2. Apakah jarak ketinggian sudah diketahui?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->jarak_ketinggian_sudah_diketahui == 1 ? 'checked' : '' }} name="jarak_ketinggian_sudah_diketahui" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_jarak_ketinggian_sudah_diketahui" value="{{ $ijinKerja->keterangan_jarak_ketinggian_sudah_diketahui }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">3. Apakah terdapat bahaya angin?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->terdapat_bahaya_angin == 1 ? 'checked' : '' }} name="terdapat_bahaya_angin" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_terdapat_bahaya_angin" value="{{ $ijinKerja->keterangan_terdapat_bahaya_angin }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">4. Apakah area kerja sudah terbebas dari bahaya benda jatuh?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh == 1 ? 'checked' : '' }} name="area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh" value="{{ $ijinKerja->keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">5. Apakah area kerja sudah terbebas dari semua aliran listrik? (diberikan pengaman atau isolasi)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->area_kerja_sudah_terbebas_dari_semua_aliran_listrik == 1 ? 'checked' : '' }} name="area_kerja_sudah_terbebas_dari_semua_aliran_listrik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik" value="{{ $ijinKerja->keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">6. Apakah area kerja berada di permukaan yang landai?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->area_kerja_berada_dipermukaan_yang_landai == 1 ? 'checked' : '' }} name="area_kerja_berada_dipermukaan_yang_landai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_area_kerja_berada_dipermukaan_yang_landai" value="{{ $ijinKerja->keterangan_area_kerja_berada_dipermukaan_yang_landai }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">7. Apakah area kerja berada di permukaan yang basah/becek/berlumpur?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->area_kerja_berada_di_permukaan_yang_basah == 1 ? 'checked' : '' }} name="area_kerja_berada_di_permukaan_yang_basah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_area_kerja_berada_di_permukaan_yang_basah" value="{{ $ijinKerja->keterangan_area_kerja_berada_di_permukaan_yang_basah }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">8. Apakah area kerja berada di ruang yang sempit?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->area_kerja_berada_di_ruang_yang_sempit == 1 ? 'checked' : '' }} name="area_kerja_berada_di_ruang_yang_sempit" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_area_kerja_berada_di_ruang_yang_sempit" value="{{ $ijinKerja->keterangan_area_kerja_berada_di_ruang_yang_sempit }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">9. Apakah pekerja bekerja sendiri?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->pekerja_bekerja_sendiri == 1 ? 'checked' : '' }} name="pekerja_bekerja_sendiri" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_pekerja_bekerja_sendiri" value="{{ $ijinKerja->keterangan_pekerja_bekerja_sendiri }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">10. Apakah area kerja perlu dipasang barikade?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->area_kerja_perlu_dipasang_barikade == 1 ? 'checked' : '' }} name="area_kerja_perlu_dipasang_barikade" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_area_kerja_perlu_dipasang_barikade" value="{{ $ijinKerja->keterangan_area_kerja_perlu_dipasang_barikade }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">11. Apakah tersedia rambu keselamatan?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->tersedia_rambu_keselamatan == 1 ? 'checked' : '' }} name="tersedia_rambu_keselamatan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_tersedia_rambu_keselamatan" value="{{ $ijinKerja->keterangan_tersedia_rambu_keselamatan }}" placeholder="Masukkan Keterangan ...">
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
                                <input type="checkbox" {{ $ijinKerja->alat_perancah_digunakan_pada_pekerjaan_di_ketinggian == 1 ? 'checked' : '' }} name="alat_perancah_digunakan_pada_pekerjaan_di_ketinggian" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian" value="{{ $ijinKerja->keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">2. Apakah alat perancah disusun oleh petugas alat perancah? (Sesuai Prosedur Operasi No. O-005/0.24)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->alat_perancah_disusun_oleh_petugas_alat_perancah == 1 ? 'checked' : '' }} name="alat_perancah_disusun_oleh_petugas_alat_perancah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah" value="{{ $ijinKerja->keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">3. Apakah komponen-komponen alat perancah dalam kondisi yang baik? (Sesuai Prosedur Operasi No. O-005/0.24)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->komponen_alat_perancah_dalam_kondisi_yang_baik == 1 ? 'checked' : '' }} name="komponen_alat_perancah_dalam_kondisi_yang_baik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik" value="{{ $ijinKerja->keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">4. Apakah komponen-komponen alat perancah sudah terpasang dengan baik?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->komponen_alat_perancah_sudah_terpasang == 1 ? 'checked' : '' }} name="komponen_alat_perancah_sudah_terpasang" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_komponen_alat_perancah_sudah_terpasang" value="{{ $ijinKerja->keterangan_komponen_alat_perancah_sudah_terpasang }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
            </div>
            <p class="mb-0 font-weight-bold text-sm">Alat perancah (Scaffolding)</p>
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label">1. Apakah tangga merupakan alat yang bantu yang paling sesuai untuk digunakan pada pekerjaan di ketinggian?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->tangga_merupakan_alat_yang_bantu_yang_paling_sesuai == 1 ? 'checked' : '' }} name="tangga_merupakan_alat_yang_bantu_yang_paling_sesuai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai" value="{{ $ijinKerja->keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">2. Apakah tangga dalam kondisi layak dan sesuai untuk digunakan?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->tangga_dalam_kondisi_layak_dan_sesuai == 1 ? 'checked' : '' }} name="tangga_dalam_kondisi_layak_dan_sesuai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_tangga_dalam_kondisi_layak_dan_sesuai" value="{{ $ijinKerja->keterangan_tangga_dalam_kondisi_layak_dan_sesuai }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">3. Apakah tangga mampu menahan gerakan saat naik/turun dan bekerja?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->tangga_mampu_menahan_gerakan == 1 ? 'checked' : '' }} name="tangga_mampu_menahan_gerakan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_tangga_mampu_menahan_gerakan" value="{{ $ijinKerja->keterangan_tangga_mampu_menahan_gerakan }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">4. Apakah tangga memiliki panjang yang cukup untuk digunakan?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->tangga_memiliki_panjang_yang_cukup == 1 ? 'checked' : '' }} name="tangga_memiliki_panjang_yang_cukup" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_tangga_memiliki_panjang_yang_cukup" value="{{ $ijinKerja->keterangan_tangga_memiliki_panjang_yang_cukup }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">5. Apakah tangga memiliki stopper/pin/pengunci yang dapat digunakan?</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->tangga_memiliki_stopper == 1 ? 'checked' : '' }} name="tangga_memiliki_stopper" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_tangga_memiliki_stopper" value="{{ $ijinKerja->keterangan_tangga_memiliki_stopper }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">6. Apakah pekerja menggunakan peralatan lain saat bekerja? (jika "YA", pekerja harus menggunakan belt)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" {{ $ijinKerja->pekerja_menggunakan_peralatan_lain == 1 ? 'checked' : '' }} name="pekerja_menggunakan_peralatan_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_pekerja_menggunakan_peralatan_lain" value="{{ $ijinKerja->keterangan_pekerja_menggunakan_peralatan_lain }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
        </form>
    </div>
</div>

@include('bagian-isi-kerja.pengesahan.edit')

@foreach ($ijinKerja->validasi as $validasi)
    <div class="card bg-secondary shadow h-100 mb-3">
        <div class="card-header d-flex justify-content-between">
            <span class="font-weight-bold">VALIDASI</span>
            <button type="button" class="btn btn-sm btn-danger deleteValidasi" data-id="{{ $validasi->id }}"><i class="fa fa-trash"> Hapus</i></button>
        </div>
        <div class="card-body">
            <form class="form" action="javascript:;" method="post" data-url="{{ route("validasi.update", $validasi->id) }}">
                @csrf @method('patch')
                <div class="row mb-0">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->validasi_hari }}" class="form-control" type="date" name="validasi_hari" id="validasi_hari" placeholder="Masukkan Hari ...">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->validasi_mulai_hari }}" class="form-control" type="time" name="validasi_mulai_hari" id="validasi_mulai_hari" placeholder="Masukkan Waktu Mulai ...">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->validasi_selesai_hari }}" class="form-control" type="time" name="validasi_selesai_hari" id="validasi_selesai_hari" placeholder="Masukkan Waktu Selesai ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->nama_pelaksana }}" class="form-control" type="text" name="nama_pelaksana" id="nama_pelaksana" placeholder="Masukkan Nama Pelaksana ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->inisial_pelaksana }}" class="form-control" type="text" name="inisial_pelaksana" id="inisial_pelaksana" placeholder="Masukkan Inisial Pelaksana ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->nama_pengawas }}" class="form-control" type="text" name="nama_pengawas" id="nama_pengawas" placeholder="Masukkan Nama Pengawas ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->inisial_pengawas }}" class="form-control" type="text" name="inisial_pengawas" id="inisial_pengawas" placeholder="Masukkan Inisial Pengawas ...">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
            </form>
        </div>
    </div>
@endforeach
<div id="validasi"></div>
@endsection

@push('scripts')
<script>
    let i = "{{ count($ijinKerja->validasi) }}";
    i = parseInt(i);
    $(document).ready(function () {
        $("#tambahValidasi").click(function () {
            $(this).tooltip('hide');
            if (i < 7) {
                $("#validasi").append(`
                    <div class="card bg-secondary shadow h-100 mb-3 validasi${i}">
                        <div class="card-header d-flex justify-content-between">
                            <span class="font-weight-bold">VALIDASI</span>
                            <button type="button" class="btn btn-sm btn-danger hapusValidasi"><i class="fa fa-trash"> Hapus</i></button>
                        </div>
                        <div class="card-body">
                            <form class="form" action="javascript:;" method="post" data-url="{{ route("validasi.store") }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="post">
                                <input type="hidden" name="ijin_kerja_di_ketinggian_id" value="{{ $ijinKerja->id }}">
                                <div class="pl-lg-4">
                                    <div class="row mb-0">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="validasi_hari" id="validasi_hari" data-toggle="tooltip" title="Hari">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="time" name="validasi_mulai_hari" id="validasi_mulai_hari" placeholder="Masukkan Waktu Mulai ...">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="time" name="validasi_selesai_hari" id="validasi_selesai_hari" placeholder="Masukkan Waktu Selesai ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nama_pelaksana" id="nama_pelaksana" placeholder="Masukkan Nama Pelaksana ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="inisial_pelaksana" id="inisial_pelaksana" placeholder="Masukkan Inisial Pelaksana ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nama_pengawas" id="nama_pengawas" placeholder="Masukkan Nama Pengawas ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="inisial_pengawas" id="inisial_pengawas" placeholder="Masukkan Inisial Pengawas ...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                            </form>
                        </div>
                    </div>
                `);
                $('[data-toggle="tooltip"]').tooltip();
                $('html, body').animate({
                    scrollTop: $(".validasi"+i).offset().top
                }, 800);
                i++;
            } else {
                alert('Maksimal form validasi adalah 7');
            }
        });

        $(document).on("click", ".hapusValidasi", function () {
            i--;
            // window.scrollBy(0, -500);
            $(this).tooltip('hide');
            $(this).parent().parent().remove();
        });

        $(document).on("click", ".deleteValidasi", function () {
            let form = this;
            $(".notifikasi").html('');
            $.ajax({
                url: "{{ url('/validasi') }}" + "/" + $(form).data('id'),
                type: 'delete',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                beforeSend: function(data){
                    $(form).attr('disabled','disabled');
                    $(form).html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt=""> Loading ...`);
                },
                success: function(data){
                    $(form).html('SIMPAN');
                    $(form).removeAttr('disabled');
                    $(".notifikasi").html(`
                        <div class="alert alert-success alert-dismissible fade show">
                            <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
                            <span class="alert-text">
                                ${data.message}
                            </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    i--;
                    // window.scrollBy(0, -500);
                    $(form).tooltip('hide');
                    $(form).parent().parent().remove();
                },
                error: function (data) {
                    console.clear();
                    $(form).children('button:submit').html('SIMPAN');
                    $(form).children('button:submit').removeAttr('disabled');
                    $(".notifikasi").html(`
                        <div class="alert alert-danger alert-dismissible fade show">
                            <span class="alert-icon"><i class="fas fa-times-circle"></i> <strong>Gagal</strong></span>
                            <span class="alert-text">
                                <ul id="pesanError">
                                </ul>
                            </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    $.each(data.responseJSON.errors, function (i, e) {
                        $('#pesanError').append(`<li>`+e+`</li>`);
                        if (!$("[name='" + i + "']").hasClass('is-invalid')) {
                            $("[name='" + i + "']").addClass('is-invalid');
                            $("[name='" + i + "']").focus();
                        }
                    });
                }
            });
        });

        $("input:checkbox").click(function () {
            $(this).tooltip('hide');
        });

        $(document).on('submit', '.form' ,function(){
            let form = this;
            $(".notifikasi").html('');
            $.ajax({
                url: $(form).data('url'),
                type: 'POST',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(data){
                    $(form).children('button:submit').attr('disabled','disabled');
                    $(form).children('button:submit').html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt=""> Loading ...`);
                },
                success: function(data){
                    $(form).children('button:submit').html('SIMPAN');
                    $(form).children('button:submit').removeAttr('disabled');
                    $(".notifikasi").html(`
                        <div class="alert alert-success alert-dismissible fade show">
                            <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
                            <span class="alert-text">
                                ${data.message}
                            </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    document.location.reload(true);
                },
                error: function (data) {
                    console.clear();
                    $(form).children('button:submit').html('SIMPAN');
                    $(form).children('button:submit').removeAttr('disabled');
                    $(".notifikasi").html(`
                        <div class="alert alert-danger alert-dismissible fade show">
                            <span class="alert-icon"><i class="fas fa-times-circle"></i> <strong>Gagal</strong></span>
                            <span class="alert-text">
                                <ul id="pesanError">
                                </ul>
                            </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `);
                    $.each(data.responseJSON.errors, function (i, e) {
                        $('#pesanError').append(`<li>`+e+`</li>`);
                        if (!$(form).find("[name='" + i + "']").hasClass('is-invalid')) {
                            $(form).find("[name='" + i + "']").addClass('is-invalid');
                            $(form).find("[name='" + i + "']").focus();
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
