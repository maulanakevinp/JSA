@extends('layouts.app')

@section('title', 'Detail Ijin Kerja Memasuki Ruangan Terbatas')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Ijin Kerja Memasuki Ruangan Terbatas</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Memasuki Ruangan Terbatas {{ config('app.name') }}</p>
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
                <h3 class="mb-0">Detail Ijin Kerja Memasuki Ruangan Terbatas</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="jsa_id" value="{{ $ijinKerja->jsa->id }}">
                @include('bagian-isi-kerja.umum.show')
                <hr>
                @include('bagian-isi-kerja.alat-pelindung-diri.show')
                <hr>
                @include('bagian-isi-kerja.dokumen-pendukung.show')
                <hr>
                <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                <div class="pl-lg-4">
                    <p class="mb-0 text-sm font-weight-bold">a. Ruang terbatas tersebut sesungguhnya telah :</p>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">1. Dibebaskan dari tekanan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="ruang_terbatas_dibebaskan_dari_tekanan" {{ $ijinKerja->ruang_terbatas_dibebaskan_dari_tekanan == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_ruang_terbatas_dibebaskan_dari_tekanan" value="{{ $ijinKerja->keterangan_ruang_terbatas_dibebaskan_dari_tekanan }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Dikosongkan atau drain</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="ruang_terbatas_dikosongkan_atau_drain" {{ $ijinKerja->ruang_terbatas_dikosongkan_atau_drain == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_ruang_terbatas_dikosongkan_atau_drain" value="{{ $ijinKerja->keterangan_ruang_terbatas_dikosongkan_atau_drain }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">3. Diisolasi </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="ruang_terbatas_diisolasi" {{ $ijinKerja->ruang_terbatas_diisolasi == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_ruang_terbatas_diisolasi" value="{{ $ijinKerja->keterangan_ruang_terbatas_diisolasi }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">b. Semua sambungan listrik/hidrolik diluar dan didalam ruangan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="listrik_or_hidrolik_diluar_dan_didalam_ruangan" {{ $ijinKerja->listrik_or_hidrolik_diluar_dan_didalam_ruangan == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan" value="{{ $ijinKerja->keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">c. Aman dari kandungan gas beracun dan mudah terbakar</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="aman_dari_kandungan_gas_beracun_dan_mudah_terbakar" {{ $ijinKerja->aman_dari_kandungan_gas_beracun_dan_mudah_terbakar == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar" value="{{ $ijinKerja->keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">d. Kandungan oksigen mencukupi</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="kandungan_oksigen_mencukupi" {{ $ijinKerja->kandungan_oksigen_mencukupi == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_kandungan_oksigen_mencukupi" value="{{ $ijinKerja->keterangan_kandungan_oksigen_mencukupi }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">e. Ventilasi udara pembantu tersedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="ventilasi_udara_pembantu_tersedia" {{ $ijinKerja->ventilasi_udara_pembantu_tersedia == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_ventilasi_udara_pembantu_tersedia" value="{{ $ijinKerja->keterangan_ventilasi_udara_pembantu_tersedia }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">f. Terdapat kerja panas di ruangan terbatas</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="terdapat_kerja_panas_di_ruangan_terbatas" {{ $ijinKerja->terdapat_kerja_panas_di_ruangan_terbatas == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_terdapat_kerja_panas_di_ruangan_terbatas" value="{{ $ijinKerja->keterangan_terdapat_kerja_panas_di_ruangan_terbatas }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">g. Terdapat pekerjaan radiografi di ruangan terbatas</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="terdapat_pekerjaan_radiografi_di_ruangan_terbatas" {{ $ijinKerja->terdapat_pekerjaan_radiografi_di_ruangan_terbatas == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas" value="{{ $ijinKerja->keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">h. Perlu dengan ijin kerja yang lain</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" {{ $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" value="{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">i. Peringatan bahaya dan tanda batas tersedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="peringatan_bahaya_dan_tanda_batas_tersedia" {{ $ijinKerja->peringatan_bahaya_dan_tanda_batas_tersedia == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_peringatan_bahaya_dan_tanda_batas_tersedia" value="{{ $ijinKerja->keterangan_peringatan_bahaya_dan_tanda_batas_tersedia }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">j. Semua alat kerja penunjang aman untuk digunakan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_alat_kerja_penunjang_aman_untuk_digunakan" {{ $ijinKerja->semua_alat_kerja_penunjang_aman_untuk_digunakan == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan" value="{{ $ijinKerja->keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">k.Semua pekerja terlatih untuk masuk ke ruangan terbatas</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas" {{ $ijinKerja->pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas" value="{{ $ijinKerja->keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">l. Semua pekerja telah lengkap alat pelindung diri</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_pekerja_telah_lengkap_alat_pelindung_diri" {{ $ijinKerja->semua_pekerja_telah_lengkap_alat_pelindung_diri == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri" value="{{ $ijinKerja->keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                </div>
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
