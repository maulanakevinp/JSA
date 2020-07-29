@extends('layouts.app')

@section('title', 'Detail Ijin Kerja Radiografi')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Ijin Kerja Radiografi</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Radiografi {{ config('app.name') }}</p>
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
                <h3 class="mb-0">Detail Ijin Kerja Radiografi</h3>
            </div>
            <div class="card-body">
                <input type="hidden" name="jsa_id" value="{{ $ijinKerja->jsa->id }}">
                @include('bagian-isi-kerja.umum.show')
                <hr>
                @include('bagian-isi-kerja.alat-pelindung-diri.show')
                <hr>
                <h6 class="heading-small text-muted">DESKRIPSI PEKERJA RADIOGRAFI</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label" for="nama_perusahaan">Nama Perusahaan</label>
                        <input disabled class="form-control" type="text" name="nama_perusahaan" value="{{ $ijinKerja->nama_perusahaan }}" id="nama_perusahaan" data-placeholder="Masukkan Nama Perusahaan ...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="no_lisensi">Nomor Lisensi</label>
                        <input disabled class="form-control" type="text" name="no_lisensi" value="{{ $ijinKerja->no_lisensi }}" id="no_lisensi" data-placeholder="Masukkan Nomor Lisensi ...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="sumber_radioaktif">Sumber Radioaktif</label>
                        <input disabled class="form-control" type="text" name="sumber_radioaktif" value="{{ $ijinKerja->sumber_radioaktif }}" id="sumber_radioaktif" data-placeholder="Masukkan Sumber Radioaktif ...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="proyektor">Proyektor</label>
                        <input disabled class="form-control" type="text" name="proyektor" value="{{ $ijinKerja->proyektor }}" id="proyektor" data-placeholder="Masukkan Proyektor ...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="survey_meter">Survey Meter</label>
                        <input disabled class="form-control" type="text" name="survey_meter" value="{{ $ijinKerja->survey_meter }}" id="survey_meter" data-placeholder="Masukkan Survey Meter ...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="tanggal_service">Tanggal Service</label>
                        <input disabled class="form-control" type="date" name="tanggal_service" value="{{ $ijinKerja->tanggal_service }}" id="tanggal_service" data-placeholder="Masukkan Tanggal Service ...">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="tanggal_kalibrasi">Tanggal Kalibrasi</label>
                        <input disabled class="form-control" type="date" name="tanggal_kalibrasi" value="{{ $ijinKerja->tanggal_kalibrasi }}" id="tanggal_kalibrasi" data-placeholder="Masukkan Tanggal Kalibrasi ...">
                    </div>
                </div>
                <hr>
                @include('bagian-isi-kerja.dokumen-pendukung.show')
                <hr>
                <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                <div class="pl-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">a. Peralatan dapat dioperasikan jarak jauh</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="peralatan_dapat_dioperasikan_jarak_jauh" {{ $ijinKerja->peralatan_dapat_dioperasikan_jarak_jauh == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_peralatan_dapat_dioperasikan_jarak_jauh" value="{{ $ijinKerja->keterangan_peralatan_dapat_dioperasikan_jarak_jauh }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">b. Petugas pemadam kebakaran siap sedia</label>
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
                        <label class="form-control-label">c. Penghalang dan tanda bahaya radiasi siap tersedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="penghalang_dan_tanda_bahaya_radiasi_siap_tersedia" {{ $ijinKerja->penghalang_dan_tanda_bahaya_radiasi_siap_tersedia == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia" value="{{ $ijinKerja->keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">d. Daerah bebas dari orang tidak berkepentingan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="daerah_bebas_dari_orang_tidak_berkepentingan" {{ $ijinKerja->daerah_bebas_dari_orang_tidak_berkepentingan == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_daerah_bebas_dari_orang_tidak_berkepentingan" value="{{ $ijinKerja->keterangan_daerah_bebas_dari_orang_tidak_berkepentingan }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">e. Hubungan radio hanya dengan ccr</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="hubungan_radio_hanya_dengan_ccr" {{ $ijinKerja->hubungan_radio_hanya_dengan_ccr == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_hubungan_radio_hanya_dengan_ccr" value="{{ $ijinKerja->keterangan_hubungan_radio_hanya_dengan_ccr }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">f. Semua peralatan las telah diamankan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_peralatan_las_telah_diamankan" {{ $ijinKerja->semua_peralatan_las_telah_diamankan == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_semua_peralatan_las_telah_diamankan" value="{{ $ijinKerja->keterangan_semua_peralatan_las_telah_diamankan }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">g. Pembacaan hasil pengukuran pada pagar penghalang tidak boleh dari 0.75 mR/jam diudara</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="pembacaan_hasil_pengukuran_pada_pagar_penghalang" {{ $ijinKerja->pembacaan_hasil_pengukuran_pada_pagar_penghalang == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang" value="{{ $ijinKerja->keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">h. Alat pemadam api siap sedia</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="alat_pemadam_api_siap_sedia" {{ $ijinKerja->alat_pemadam_api_siap_sedia == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_alat_pemadam_api_siap_sedia" value="{{ $ijinKerja->keterangan_alat_pemadam_api_siap_sedia }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">i. Perlu dengan ijin kerja yang lain</label>
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
                        <label class="form-control-label">j. Semua pekerjaan telah lengkap alat pelindung diri</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="semua_pekerjaan_telah_lengkap_alat_pelindung_diri" {{ $ijinKerja->semua_pekerjaan_telah_lengkap_alat_pelindung_diri == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri" value="{{ $ijinKerja->keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri }}" data-placeholder="Masukkan Keterangan ...">
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
                                    <label class="form-control-label">Hari</label>
                                    <input disabled disabled value="{{ $validasi->validasi_hari }}" class="form-control form-control-alternative" type="date" name="validasi_hari[]" id="validasi_hari" data-placeholder="Masukkan Hari ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Waktu Mulai</label>
                                    <input disabled disabled value="{{ $validasi->validasi_mulai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_mulai_hari[]" id="validasi_mulai_hari" data-placeholder="Masukkan Waktu Mulai ...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Waktu Selesai</label>
                                    <input disabled disabled value="{{ $validasi->validasi_selesai_hari }}" class="form-control form-control-alternative" type="time" name="validasi_selesai_hari[]" id="validasi_selesai_hari" data-placeholder="Masukkan Waktu Selesai ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Pelaksana</label>
                                    <input disabled disabled value="{{ $validasi->nama_pelaksana }}" class="form-control form-control-alternative" type="text" name="nama_pelaksana[]" id="nama_pelaksana" data-placeholder="Masukkan Nama Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Inisial Pelaksana</label>
                                    <input disabled disabled value="{{ $validasi->inisial_pelaksana }}" class="form-control form-control-alternative" type="text" name="inisial_pelaksana[]" id="inisial_pelaksana" data-placeholder="Masukkan Inisial Pelaksana ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Pengawas</label>
                                    <input disabled disabled value="{{ $validasi->nama_pengawas }}" class="form-control form-control-alternative" type="text" name="nama_pengawas[]" id="nama_pengawas" data-placeholder="Masukkan Nama Pengawas ...">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label">Inisial Pengawas</label>
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
                    <textarea class="form-control" type="text" name="catatan" value="{{ $ijinKerja->catatan }}" id="catatan" data-data-placeholder="Masukkan Catatan ..." disabled>{{ $ijinKerja->catatan }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
