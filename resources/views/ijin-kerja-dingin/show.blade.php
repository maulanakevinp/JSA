@extends('layouts.app')

@section('title', 'Detail Ijin Kerja Dingin')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Ijin Kerja Dingin</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja {{ config('app.name') }}</p>
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
                <h3 class="mb-0">Detail Ijin Kerja Dingin</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="jsa_id" value="{{ $ijinKerja->jsa->id }}">
                @include('bagian-isi-kerja.umum.show')
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
                                        <input disabled type="checkbox" name="jalur_dibebaskan_dari_tekanan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_dibebaskan_dari_tekanan ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_dibebaskan_dari_tekanan" value="{{ $ijinKerja->keterangan_jalur_dibebaskan_dari_tekanan }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Dikosongkan atau drain</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_dikosongkan_atau_drain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_dikosongkan_atau_drain ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_dikosongkan_atau_drain" value="{{ $ijinKerja->keterangan_jalur_dikosongkan_atau_drain }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <p class="mb-0 font-weight-bold text-sm">3. Diisolasi dengan :</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Blanking</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_blanking" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_diisolasi_dengan_blanking ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_blanking" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_blanking }}" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Dilepas</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_dilepas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_diisolasi_dengan_dilepas ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_dilepas" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_dilepas }}" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Kerangan dikunci</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_kerangan_dikunci" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_diisolasi_dengan_kerangan_dikunci ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_kerangan_dikunci" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_kerangan_dikunci }}" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Diberi label</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input disabled type="checkbox" name="jalur_diisolasi_dengan_diberi_label" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_diisolasi_dengan_diberi_label ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input disabled type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_diberi_label" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_diberi_label }}" data-placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">4. Didorong atau flush dengan air</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_didorong_atau_flush_dengan_air" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_didorong_atau_flush_dengan_air ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_didorong_atau_flush_dengan_air" value="{{ $ijinKerja->keterangan_jalur_didorong_atau_flush_dengan_air }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">5. Steaming out or Purging</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_steaming_out_or_purging" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_steaming_out_or_purging ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_steaming_out_or_purging" value="{{ $ijinKerja->keterangan_jalur_steaming_out_or_purging }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">6. Dinginkan secara alamiah atau mekanis</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="jalur_dinginkan_secara_alamiah_atau_mekanis" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->jalur_dinginkan_secara_alamiah_atau_mekanis ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis" value="{{ $ijinKerja->keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">b. Semua pekerjaan disetujui untuk penggalian</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_pekerjaan_disetujui_untuk_penggalian" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->semua_pekerjaan_disetujui_untuk_penggalian ? 'checked' : '' }}>
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_semua_pekerjaan_disetujui_untuk_penggalian" value="{{ $ijinKerja->keterangan_semua_pekerjaan_disetujui_untuk_penggalian }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">c. Perlu dengan ijin kerja yang lain</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->perlu_dengan_ijin_kerja_yang_lain ? 'checked' : '' }}>
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" value="{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">d. Perlu dilakukan uji kandungan gas</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="perlu_dilakukan_uji_kandungan_gas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->perlu_dilakukan_uji_kandungan_gas ? 'checked' : '' }}>
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_perlu_dilakukan_uji_kandungan_gas" value="{{ $ijinKerja->keterangan_perlu_dilakukan_uji_kandungan_gas }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <p class="mb-0 text-sm font-weight-bold">k. Semua penggerak utama peralatan listrik telah :</p>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">1. Diisolasi dan diberi label</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->semua_peralatan_listrik_telah_diisolasi ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_semua_peralatan_listrik_telah_diisolasi" value="{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_diisolasi }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">2. Perlu pemeriksaan ulang</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input disabled type="checkbox" name="semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ $ijinKerja->semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input disabled type="text" class="form-control" name="keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang" value="{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang }}" data-placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                </div>
                @include('bagian-isi-kerja.pengesahan.show')
                <hr>
                <p class="mb-0 heading-small font-weight-bold">VALIDASI</p>
                <div id="validasi" class="pl-lg-4">
                    @forelse ($ijinKerja->validasi as $validasi)
                        <div class="row mb-0">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Hari</label>
                                    <input disabled value="{{ $validasi->validasi_hari }}" class="form-control form-control-alternative" type="date" name="validasi_hari[]" id="validasi_hari" data-placeholder="Masukkan Hari ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Waktu Mulai</label>
                                    <input disabled value="{{ $validasi->validasi_mulai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_mulai_hari[]" id="validasi_mulai_hari" data-placeholder="Masukkan Waktu Mulai ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Waktu Selesai</label>
                                    <input disabled value="{{ $validasi->validasi_selesai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_selesai_hari[]" id="validasi_selesai_hari" data-placeholder="Masukkan Waktu Selesai ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Pelaksana</label>
                                    <input disabled value="{{ $validasi->nama_pelaksana }}" class="form-control form-control-alternative" type="text" name="nama_pelaksana[]" id="nama_pelaksana" data-placeholder="Masukkan Nama Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Inisial Pelaksana</label>
                                    <input disabled value="{{ $validasi->inisial_pelaksana }}" class="form-control form-control-alternative" type="text" name="inisial_pelaksana[]" id="inisial_pelaksana" data-placeholder="Masukkan Inisial Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Pengawas</label>
                                    <input disabled value="{{ $validasi->nama_pengawas }}" class="form-control form-control-alternative" type="text" name="nama_pengawas[]" id="nama_pengawas" data-placeholder="Masukkan Nama Pengawas ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Inisial Pengawas</label>
                                    <input disabled value="{{ $validasi->inisial_pengawas }}" class="form-control form-control-alternative" type="text" name="inisial_pengawas[]" id="inisial_pengawas" data-placeholder="Masukkan Inisial Pengawas ...">
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
                    <textarea class="form-control form-control-alternative @error('catatan') is-invalid @enderror" type="text" name="catatan" id="catatan" data-data-placeholder="Masukkan Catatan ..." disabled>{{ $ijinKerja->catatan }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
