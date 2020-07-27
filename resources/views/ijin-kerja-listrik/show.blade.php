@extends('layouts.app')

@section('title', 'Detail Ijin Kerja Listrik')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Ijin Kerja Listrik</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Listrik {{ config('app.name') }}</p>
                                <p class="mb-0 text-sm">{{ $ijinKerja->jsa->nama_perusahaan }} - {{ $ijinKerja->jsa->no_jsa }}</p>
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
                <h3 class="mb-0">Detail Ijin Kerja Listrik</h3>
            </div>
            <div class="card-body">
                <input disabled type="hidden" name="jsa_id" value="{{ $ijinKerja->jsa->id }}">
                @include('bagian-isi-kerja.umum.show')
                <hr>
                @include('bagian-isi-kerja.alat-pelindung-diri.show')
                <hr>
                <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                <div class="pl-lg-4">
                    <p class="mb-0 text-sm font-weight-bold">a. Jalur tersebut sesungguhnya telah :</p>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">1. Dibebaskan dari aliran listrik</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_telah_dibebaskan_dari_aliran_listrik" {{ $ijinKerja->jalur_telah_dibebaskan_dari_aliran_listrik == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_telah_dibebaskan_dari_aliran_listrik" value="{{ $ijinKerja->keterangan_jalur_telah_dibebaskan_dari_aliran_listrik }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Peralatan yang terkait telah aman</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_peralatan_yang_terkait_telah_aman" {{ $ijinKerja->jalur_peralatan_yang_terkait_telah_aman == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_peralatan_yang_terkait_telah_aman" value="{{ $ijinKerja->keterangan_jalur_peralatan_yang_terkait_telah_aman }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">3. Pemasangan kabel</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_telah_pemasangan_kabel" {{ $ijinKerja->jalur_telah_pemasangan_kabel == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_telah_pemasangan_kabel" value="{{ $ijinKerja->keterangan_jalur_telah_pemasangan_kabel }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">4. Peralatan dalam keadaan bergerak</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_telah_peralatan_dalam_keadaan_bergerak" {{ $ijinKerja->jalur_telah_peralatan_dalam_keadaan_bergerak == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak" value="{{ $ijinKerja->keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">5. Diisolasi dari sumber listrsik</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_telah_diisolasi_dari_sumber_listrik" {{ $ijinKerja->jalur_telah_diisolasi_dari_sumber_listrik == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_telah_diisolasi_dari_sumber_listrik" value="{{ $ijinKerja->keterangan_jalur_telah_diisolasi_dari_sumber_listrik }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">6. Peralatan dalam keadaan panas</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_telah_peralatan_dalam_keadaan_panas" {{ $ijinKerja->jalur_telah_peralatan_dalam_keadaan_panas == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_telah_peralatan_dalam_keadaan_panas" value="{{ $ijinKerja->keterangan_jalur_telah_peralatan_dalam_keadaan_panas }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">b. Tersedia jalan masuk dan keluar yang layak</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="tersedia_jalan_masuk_dan_keluar_yang_layak" {{ $ijinKerja->tersedia_jalan_masuk_dan_keluar_yang_layak == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak" value="{{ $ijinKerja->keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">c. Bahan mudah terbakar diamankan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="bahan_mudah_terbakar_diamankan" {{ $ijinKerja->bahan_mudah_terbakar_diamankan == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_bahan_mudah_terbakar_diamankan" value="{{ $ijinKerja->keterangan_bahan_mudah_terbakar_diamankan }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">d. Alat pemadam kebaaran siap sedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="alat_pemadam_kebaaran_siap_sedia" {{ $ijinKerja->alat_pemadam_kebaaran_siap_sedia == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_alat_pemadam_kebaaran_siap_sedia" value="{{ $ijinKerja->keterangan_alat_pemadam_kebaaran_siap_sedia }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">e. Petugas pemadam kebakaran siap sedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="petugas_pemadam_kebakaran_siap_sedia" {{ $ijinKerja->petugas_pemadam_kebakaran_siap_sedia == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_petugas_pemadam_kebakaran_siap_sedia" value="{{ $ijinKerja->keterangan_petugas_pemadam_kebakaran_siap_sedia }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">f. Pekerjaan pada ketinggian yang membahayakan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="pekerjaan_pada_ketinggian_yang_membahayakan" {{ $ijinKerja->pekerjaan_pada_ketinggian_yang_membahayakan == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_pekerjaan_pada_ketinggian_yang_membahayakan" value="{{ $ijinKerja->keterangan_pekerjaan_pada_ketinggian_yang_membahayakan }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">g. Perlu dengan ijin kerja yang lain</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" {{ $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" value="{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                </div>
                <hr>
                @include('bagian-isi-kerja.dokumen-pendukung.show')
                <hr>
                @include('bagian-isi-kerja.uji-kandungan-gas.show')
                <hr>
                @include('bagian-isi-kerja.petugas-pengawas.show')
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
                <div class="form-group">
                    <label class="form-control-label" for="catatan">Catatan</label>
                    <textarea class="form-control" type="text" name="catatan" id="catatan" data-data-placeholder="Masukkan Catatan ..." disabled>{{ $ijinKerja->catatan }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
