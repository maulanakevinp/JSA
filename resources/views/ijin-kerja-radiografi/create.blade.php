@extends('layouts.app')

@section('title', 'Buat Ijin Kerja Radiografi')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Buat Ijin Kerja Radiografi</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Radiografi {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-radiografi.index', $jsa->id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Buat Ijin Kerja Radiografi</h3>
            </div>
            <div class="card-body">
                <form id="form" autocomplete="off" action="javascript:;" method="POST">
                    @csrf
                    <input type="hidden" name="jsa_id" value="{{ $jsa->id }}">
                    @include('bagian-isi-kerja.umum.create')
                    <hr>
                    @include('bagian-isi-kerja.alat-pelindung-diri.create')
                    <hr>
                    <h6 class="heading-small text-muted">DESKRIPSI PEKERJA RADIOGRAFI</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nama_perusahaan">Nama Perusahaan</label>
                            <input class="form-control" type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukkan Nama Perusahaan ...">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="no_lisensi">Nomor Lisensi</label>
                            <input class="form-control" type="text" name="no_lisensi" id="no_lisensi" placeholder="Masukkan Nomor Lisensi ...">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="sumber_radioaktif">Sumber Radioaktif</label>
                            <input class="form-control" type="text" name="sumber_radioaktif" id="sumber_radioaktif" placeholder="Masukkan Sumber Radioaktif ...">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="proyektor">Proyektor</label>
                            <input class="form-control" type="text" name="proyektor" id="proyektor" placeholder="Masukkan Proyektor ...">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="survey_meter">Survey Meter</label>
                            <input class="form-control" type="text" name="survey_meter" id="survey_meter" placeholder="Masukkan Survey Meter ...">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="tanggal_service">Tanggal Service</label>
                            <input class="form-control" type="date" name="tanggal_service" id="tanggal_service" placeholder="Masukkan Tanggal Service ...">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="tanggal_kalibrasi">Tanggal Kalibrasi</label>
                            <input class="form-control" type="date" name="tanggal_kalibrasi" id="tanggal_kalibrasi" placeholder="Masukkan Tanggal Kalibrasi ...">
                        </div>
                    </div>
                    <hr>
                    @include('bagian-isi-kerja.dokumen-pendukung.create')
                    <hr>
                    <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">a. Peralatan dapat dioperasikan jarak jauh</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="peralatan_dapat_dioperasikan_jarak_jauh" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_peralatan_dapat_dioperasikan_jarak_jauh" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">b. Petugas pemadam kebakaran siap sedia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="petugas_pemadam_kebakaran_siap_sedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_petugas_pemadam_kebakaran_siap_sedia" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">c. Penghalang dan tanda bahaya radiasi siap tersedia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="penghalang_dan_tanda_bahaya_radiasi_siap_tersedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">d. Daerah bebas dari orang tidak berkepentingan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="daerah_bebas_dari_orang_tidak_berkepentingan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_daerah_bebas_dari_orang_tidak_berkepentingan" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">e. Hubungan radio hanya dengan ccr</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="hubungan_radio_hanya_dengan_ccr" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_hubungan_radio_hanya_dengan_ccr" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">f. Semua peralatan las telah diamankan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_peralatan_las_telah_diamankan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_peralatan_las_telah_diamankan" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">g. Pembacaan hasil pengukuran pada pagar penghalang tidak boleh dari 0.75 mR/jam diudara</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="pembacaan_hasil_pengukuran_pada_pagar_penghalang" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">h. Alat pemadam api siap sedia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="alat_pemadam_api_siap_sedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_alat_pemadam_api_siap_sedia" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">i. Perlu dengan ijin kerja yang lain</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">j. Semua pekerjaan telah lengkap alat pelindung diri</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_pekerjaan_telah_lengkap_alat_pelindung_diri" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                    <hr>
                    @include('bagian-isi-kerja.pengesahan.create')
                    <hr>
                    <p class="mb-0 heading-small font-weight-bold">VALIDASI</p>
                    <div id="validasi" class="pl-lg-4">

                    </div>
                    <button type="button" class="btn btn-primary btn-sm" id="tambahValidasi">Tambah Validasi</button>
                    <hr>
                    <div class="form-group">
                        <label class="form-control-label" for="catatan">Catatan</label>
                        <textarea class="form-control" type="text" name="catatan" id="catatan" placeholder="Masukkan Catatan ...">{{ old('catatan') }}</textarea>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let i = 0;
    $(document).ready(function () {
        $("#tambahValidasi").click(function () {
            if (i < 7) {
                $("#validasi").append(`
                    <div class="row mb-0">
                        <div class="col-md-1 mb-3">
                            <button type="button" class="btn btn-danger hapusValidasi" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="date" name="validasi_hari[]" id="validasi_hari" placeholder="Masukkan Hari ...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="time" name="validasi_mulai_hari[]" id="validasi_mulai_hari" placeholder="Masukkan Waktu Mulai ...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="time" name="validasi_selesai_hari[]" id="validasi_selesai_hari" placeholder="Masukkan Waktu Selesai ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nama_pelaksana[]" id="nama_pelaksana" placeholder="Masukkan Nama Pelaksana ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="inisial_pelaksana[]" id="inisial_pelaksana" placeholder="Masukkan Inisial Pelaksana ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nama_pengawas[]" id="nama_pengawas" placeholder="Masukkan Nama Pengawas ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="inisial_pengawas[]" id="inisial_pengawas" placeholder="Masukkan Inisial Pengawas ...">
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class=mt-0>
                        </div>
                    </div>
                `);
                $('[data-toggle="tooltip"]').tooltip();
                i++;
            } else {
                alert('Maksimal form validasi adalah 7');
            }
        });

        $(document).on("click", ".hapusValidasi", function () {
            i--;
            $(this).tooltip('hide');
            $(this).parent().parent().remove();
        });

        $("input:checkbox").click(function () {
            $(this).tooltip('hide');
        })

        $('#form').on('submit',function(){
            let form = this;
            $(".notifikasi").html('');
            $.ajax({
                url: "{{ route('ijinKerjaRadiografi.store') }}",
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
                    location.href = "{{ route('ijin-kerja-radiografi.index', $jsa->id) }}";
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
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
