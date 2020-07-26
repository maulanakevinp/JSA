@extends('layouts.app')

@section('title', 'Detail Ijin Kerja Galian')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="mb-0">Detail Ijin Kerja Galian</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Galian {{ config('app.name') }}</p>
                            </div>
                            <div class="col-6 text-right">
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
                <h3 class="mb-0">Detail Ijin Kerja Galian</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="jsa_id" value="{{ $ijinKerja->jsa->id }}">
                @include('bagian-isi-kerja.umum.show')
                <hr>
                @include('bagian-isi-kerja.jenis-pekerjaan.show')
                <hr>
                @include('bagian-isi-kerja.sumber-bahaya-alat.show')
                <hr>
                @include('bagian-isi-kerja.alat-pelindung-diri.show')
                <hr>
                @include('bagian-isi-kerja.dokumen-pendukung.show')
                <hr>
                <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                <div class="pl-lg-4">
                    <p class="mb-0 text-sm font-weight-bold">a. Jalur tersebut sesungguhnya telah :</p>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">1. Dibebaskan dari tekanan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_dibebaskan_dari_tekanan" value="1" {{ $ijinKerja->jalur_dibebaskan_dari_tekanan == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_dibebaskan_dari_tekanan }}" name="keterangan_jalur_dibebaskan_dari_tekanan" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Dikosongkan atau drain</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_dikosongkan_atau_drain" value="1" {{ $ijinKerja->jalur_dikosongkan_atau_drain == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_dikosongkan_atau_drain }}" name="keterangan_jalur_dikosongkan_atau_drain" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <p class="mb-0 font-weight-bold text-sm">3. Diisolasi dengan :</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Blanking</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_blanking" value="1" {{ $ijinKerja->jalur_diisolasi_dengan_blanking == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_blanking }}" name="keterangan_jalur_diisolasi_dengan_blanking" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Dilepas</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_dilepas" value="1" {{ $ijinKerja->jalur_diisolasi_dengan_dilepas == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_dilepas }}" name="keterangan_jalur_diisolasi_dengan_dilepas" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Keterangan dikunci</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_keterangan_dikunci" value="1" {{ $ijinKerja->jalur_diisolasi_dengan_keterangan_dikunci == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_keterangan_dikunci }}" name="keterangan_jalur_diisolasi_dengan_keterangan_dikunci" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Diberi label</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_keterangan_diberi_label" value="1" {{ $ijinKerja->jalur_diisolasi_dengan_keterangan_diberi_label == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_keterangan_diberi_label }}" name="keterangan_jalur_diisolasi_dengan_keterangan_diberi_label" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">4. Didorong atau flush dengan air</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_didorong_atau_flush_dengan_air" value="1" {{ $ijinKerja->jalur_didorong_atau_flush_dengan_air == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_didorong_atau_flush_dengan_air }}" name="keterangan_jalur_didorong_atau_flush_dengan_air" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">5. Steaming out or Purging</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_steaming_out_or_purging" value="1" {{ $ijinKerja->jalur_steaming_out_or_purging == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_steaming_out_or_purging }}" name="keterangan_jalur_steaming_out_or_purging" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">6. Dinginkan secara alamiah atau mekanis</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_dinginkan_secara_alamiah_atau_mekanis" value="1" {{ $ijinKerja->jalur_dinginkan_secara_alamiah_atau_mekanis == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis }}" name="keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">b. Semua saluran, drain dan kerangan pada jarak 15 m, dan tempat pekerjaan telah ditutup</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_saluran_drain_dan_kerangan_pada_jarak_15m" value="1" {{ $ijinKerja->semua_saluran_drain_dan_kerangan_pada_jarak_15m == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m }}" name="keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">c. Bahan mudah terbakar diamankan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="bahan_mudah_terbakar_diamankan" value="1" {{ $ijinKerja->bahan_mudah_terbakar_diamankan == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_bahan_mudah_terbakar_diamankan }}" name="keterangan_bahan_mudah_terbakar_diamankan" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">d. Alat pemadam kebakaran siap sedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="alat_pemadam_kebakaran_siap_sedia" value="1" {{ $ijinKerja->alat_pemadam_kebakaran_siap_sedia == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_alat_pemadam_kebakaran_siap_sedia }}" name="keterangan_alat_pemadam_kebakaran_siap_sedia" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">e. Petugas pemadam kebakaran siap sedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="petugas_pemadam_kebakaran_siap_sedia" value="1" {{ $ijinKerja->petugas_pemadam_kebakaran_siap_sedia == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_petugas_pemadam_kebakaran_siap_sedia }}" name="keterangan_petugas_pemadam_kebakaran_siap_sedia" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">f. Semua peralatan las telah diamankan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_peralatan_las_telah_diamankan" value="1" {{ $ijinKerja->semua_peralatan_las_telah_diamankan == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_semua_peralatan_las_telah_diamankan }}" name="keterangan_semua_peralatan_las_telah_diamankan" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">g. Pekerjaan harus terus dibasahi dengan air</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="pekerjaan_harus_terus_dibasahi_dengan_air" value="1" {{ $ijinKerja->pekerjaan_harus_terus_dibasahi_dengan_air == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_pekerjaan_harus_terus_dibasahi_dengan_air }}" name="keterangan_pekerjaan_harus_terus_dibasahi_dengan_air" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">h. Perlu dengan ijin kerja yang lain</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" value="1" {{ $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">i. Semua mesin : diesel, kompresor dll, telah diamankan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_mesin_telah_diamankan" value="1" {{ $ijinKerja->semua_mesin_telah_diamankan == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_semua_mesin_telah_diamankan }}" name="keterangan_semua_mesin_telah_diamankan" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">j. Semua pekerjaan telah disetujui untuk penggalian</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_pekerjaan_telah_disetujui_untuk_penggalian" value="1" {{ $ijinKerja->semua_pekerjaan_telah_disetujui_untuk_penggalian == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian }}" name="keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <p class="mb-0 text-sm font-weight-bold">k. Semua penggerak utama peralatan listrik telah :</p>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">1. Diisolasi dan diberi label</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" {{ $ijinKerja->semua_peralatan_listrik_telah_diisolasi == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_diisolasi }}" name="keterangan_semua_peralatan_listrik_telah_diisolasi" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Perlu pemeriksaan ulang</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" {{ $ijinKerja->semua_peralatan_listrik_telah_diisolasi == 1 ? 'checked' : '' }} data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" value="{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_diisolasi }}" name="keterangan_semua_peralatan_listrik_telah_diisolasi" data-placeholder="Masukkan Keterangan ...">
                            </div>
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
                                    <input disabled value="{{ $validasi->validasi_hari }}" class="form-control form-control-alternative" type="date" name="validasi_hari[]" id="validasi_hari" placeholder="Masukkan Hari ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <input disabled value="{{ $validasi->validasi_mulai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_mulai_hari[]" id="validasi_mulai_hari" placeholder="Masukkan Waktu Mulai ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <input disabled value="{{ $validasi->validasi_selesai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_selesai_hari[]" id="validasi_selesai_hari" placeholder="Masukkan Waktu Selesai ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled value="{{ $validasi->nama_pelaksana }}" class="form-control form-control-alternative" type="text" name="nama_pelaksana[]" id="nama_pelaksana" placeholder="Masukkan Nama Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled value="{{ $validasi->inisial_pelaksana }}" class="form-control form-control-alternative" type="text" name="inisial_pelaksana[]" id="inisial_pelaksana" placeholder="Masukkan Inisial Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled value="{{ $validasi->nama_pengawas }}" class="form-control form-control-alternative" type="text" name="nama_pengawas[]" id="nama_pengawas" placeholder="Masukkan Nama Pengawas ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input disabled value="{{ $validasi->inisial_pengawas }}" class="form-control form-control-alternative" type="text" name="inisial_pengawas[]" id="inisial_pengawas" placeholder="Masukkan Inisial Pengawas ...">
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
                    <textarea class="form-control" type="text" name="catatan" id="catatan" data-placeholder="Masukkan Catatan ..." disabled>{{ $ijinKerja->catatan }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
