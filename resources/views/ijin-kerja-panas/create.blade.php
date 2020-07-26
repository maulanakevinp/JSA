@extends('layouts.app')

@section('title', 'Buat Ijin Kerja Panas')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Buat Ijin Kerja Panas</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Panas {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-panas.index', $jsa->id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Buat Ijin Kerja Panas</h3>
            </div>
            <div class="card-body">
                <form id="form" autocomplete="off" action="javascript:;" method="POST">
                    @csrf
                    <input type="hidden" name="jsa_id" value="{{ $jsa->id }}">
                    @include('bagian-isi-kerja.umum.create')
                    <hr>
                    @include('bagian-isi-kerja.jenis-pekerjaan.create')
                    <hr>
                    @include('bagian-isi-kerja.sumber-bahaya-alat.create')
                    <hr>
                    @include('bagian-isi-kerja.alat-pelindung-diri.create')
                    <hr>
                    @include('bagian-isi-kerja.dokumen-pendukung.create')
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
                                            <input type="checkbox" name="jalur_dibebaskan_dari_tekanan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_dibebaskan_dari_tekanan" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Dikosongkan atau drain</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_dikosongkan_atau_drain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_dikosongkan_atau_drain" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <p class="mb-0 font-weight-bold text-sm">3. Diisolasi dengan :</p>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Blanking</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_blanking" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_blanking" placeholder="Masukkan Keterangan ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Dilepas</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_dilepas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_dilepas" placeholder="Masukkan Keterangan ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Keterangan dikunci</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_keterangan_dikunci" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_keterangan_dikunci" placeholder="Masukkan Keterangan ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Diberi label</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_keterangan_diberi_label" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_keterangan_diberi_label" placeholder="Masukkan Keterangan ...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">4. Didorong atau flush dengan air</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_didorong_atau_flush_dengan_air" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_didorong_atau_flush_dengan_air" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">5. Steaming out or Purging</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_steaming_out_or_purging" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_steaming_out_or_purging" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">6. Dinginkan secara alamiah atau mekanis</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_dinginkan_secara_alamiah_atau_mekanis" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">b. Semua saluran, drain dan kerangan pada jarak 15 m, dan tempat pekerjaan telah ditutup</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_saluran_drain_dan_kerangan_pada_jarak_15m" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">c. Bahan mudah terbakar diamankan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="bahan_mudah_terbakar_diamankan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_bahan_mudah_terbakar_diamankan" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">d. Alat pemadam kebakaran siap sedia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="alat_pemadam_kebakaran_siap_sedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_alat_pemadam_kebakaran_siap_sedia" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">e. Petugas pemadam kebakaran siap sedia</label>
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
                            <label class="form-control-label">g. Pekerjaan harus terus dibasahi dengan air</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="pekerjaan_harus_terus_dibasahi_dengan_air" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_pekerjaan_harus_terus_dibasahi_dengan_air" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">h. Perlu dengan ijin kerja yang lain</label>
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
                            <label class="form-control-label">i. Semua mesin : diesel, kompresor dll, telah diamankan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_mesin_telah_diamankan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_mesin_telah_diamankan" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">j. Semua pekerjaan telah disetujui untuk penggalian</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_pekerjaan_telah_disetujui_untuk_penggalian" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <p class="mb-0 text-sm font-weight-bold">k. Semua penggerak utama peralatan listrik telah :</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Diisolasi dan diberi label</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_semua_peralatan_listrik_telah_diisolasi" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Perlu pemeriksaan ulang</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_semua_peralatan_listrik_telah_diisolasi" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @include('bagian-isi-kerja.uji-kandungan-gas.create')
                    <hr>
                    @include('bagian-isi-kerja.petugas-pengawas.create')
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
                        <textarea class="form-control form-control-alternative @error('catatan') is-invalid @enderror" type="text" name="catatan" id="catatan" placeholder="Masukkan Catatan ...">{{ old('catatan') }}</textarea>
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
                                <input class="form-control form-control-alternative" type="date" name="validasi_hari[]" id="validasi_hari" placeholder="Masukkan Hari ...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="time" name="validasi_mulai_hari[]" id="validasi_mulai_hari" placeholder="Masukkan Waktu Mulai ...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="time" name="validasi_selesai_hari[]" id="validasi_selesai_hari" placeholder="Masukkan Waktu Selesai ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="text" name="nama_pelaksana[]" id="nama_pelaksana" placeholder="Masukkan Nama Pelaksana ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="text" name="inisial_pelaksana[]" id="inisial_pelaksana" placeholder="Masukkan Inisial Pelaksana ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="text" name="nama_pengawas[]" id="nama_pengawas" placeholder="Masukkan Nama Pengawas ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" type="text" name="inisial_pengawas[]" id="inisial_pengawas" placeholder="Masukkan Inisial Pengawas ...">
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
                url: "{{ route('ijinKerjaPanas.store') }}",
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
                    location.href = "{{ route('ijin-kerja-panas.index', $jsa->id) }}";
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
