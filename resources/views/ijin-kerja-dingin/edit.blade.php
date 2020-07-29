@extends('layouts.app')

@section('title', 'Edit Ijin Kerja Panas')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Ijin Kerja Panas</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja {{ config('app.name') }}</p>
                                <p class="mb-0 text-sm">{{ $ijinKerja->jsa->nama_perusahaan }} - {{ $ijinKerja->jsa->no_jsa }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-panas.index', $ijinKerja->jsa_id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
@include('bagian-isi-kerja.sumber-bahaya-alat.edit')
@include('bagian-isi-kerja.alat-pelindung-diri.edit')
@include('bagian-isi-kerja.dokumen-pendukung.edit')

<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">SAFETY CHECKLIST</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("ijinKerjaPanas.update", $ijinKerja->id) }}">
            @csrf @method('patch')
            <p class="mb-0 text-sm font-weight-bold">a. Jalur tersebut sesungguhnya telah :</p>
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label">1. Dibebaskan dari tekanan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input disabled type="checkbox" name="jalur_dibebaskan_dari_tekanan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                <input disabled type="checkbox" name="jalur_dikosongkan_atau_drain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                    <input disabled type="checkbox" name="jalur_diisolasi_dengan_blanking" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                    <input disabled type="checkbox" name="jalur_diisolasi_dengan_dilepas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                    <input disabled type="checkbox" name="jalur_diisolasi_dengan_kerangan_dikunci" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                    <input disabled type="checkbox" name="jalur_diisolasi_dengan_keterangan_diberi_label" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                </div>
                            </div>
                            <input disabled type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_keterangan_diberi_label" value="{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_keterangan_diberi_label }}" data-placeholder="Masukkan Keterangan ...">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">4. Didorong atau flush dengan air</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input disabled type="checkbox" name="jalur_didorong_atau_flush_dengan_air" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                <input disabled type="checkbox" name="jalur_steaming_out_or_purging" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                <input disabled type="checkbox" name="jalur_dinginkan_secara_alamiah_atau_mekanis" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                            <input disabled type="checkbox" name="semua_pekerjaan_disetujui_untuk_penggalian" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                            <input disabled type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                            <input disabled type="checkbox" name="perlu_dilakukan_uji_kandungan_gas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                <input disabled type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
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
                                <input disabled type="checkbox" name="semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input disabled type="text" class="form-control" name="keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang" value="{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang }}" data-placeholder="Masukkan Keterangan ...">
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
                            <input value="{{ $validasi->validasi_hari }}" class="form-control" type="date" name="validasi_hari" id="validasi_hari" data-placeholder="Masukkan Hari ...">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->validasi_mulai_hari }}" class="form-control" type="time" name="validasi_mulai_hari" id="validasi_mulai_hari" data-placeholder="Masukkan Waktu Mulai ...">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->validasi_selesai_hari }}" class="form-control" type="time" name="validasi_selesai_hari" id="validasi_selesai_hari" data-placeholder="Masukkan Waktu Selesai ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->nama_pelaksana }}" class="form-control" type="text" name="nama_pelaksana" id="nama_pelaksana" data-placeholder="Masukkan Nama Pelaksana ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->inisial_pelaksana }}" class="form-control" type="text" name="inisial_pelaksana" id="inisial_pelaksana" data-placeholder="Masukkan Inisial Pelaksana ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->nama_pengawas }}" class="form-control" type="text" name="nama_pengawas" id="nama_pengawas" data-placeholder="Masukkan Nama Pengawas ...">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <input value="{{ $validasi->inisial_pengawas }}" class="form-control" type="text" name="inisial_pengawas" id="inisial_pengawas" data-placeholder="Masukkan Inisial Pengawas ...">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
            </form>
        </div>
    </div>
@endforeach
<div id="validasi"></div>

<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">CATATAN</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("ijinKerjaPanas.update", $ijinKerja->id) }}">
            @csrf @method('patch')
            <div class="form-group">
                <label class="form-control-label" for="catatan">Catatan</label>
                <textarea class="form-control" type="text" name="catatan" id="catatan" data-data-placeholder="Masukkan Catatan ...">{{ $ijinKerja->catatan }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
        </form>
    </div>
</div>
<div class="container">
    <button id="tambahValidasi" style="position: fixed; bottom: 20px; z-index: 10; right: 20px;" class="btn btn-success rounded-circle" data-toggle="tooltip" title="Tambah Validasi"><i class="fas fa-plus fa-2x"></i></button>
</div>
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
                                <input type="hidden" name="ijin_kerja_panas_id" value="{{ $ijinKerja->id }}">
                                <div class="pl-lg-4">
                                    <div class="row mb-0">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="validasi_hari" id="validasi_hari" data-toggle="tooltip" title="Hari">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="time" name="validasi_mulai_hari" id="validasi_mulai_hari" data-placeholder="Masukkan Waktu Mulai ...">
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="time" name="validasi_selesai_hari" id="validasi_selesai_hari" data-placeholder="Masukkan Waktu Selesai ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nama_pelaksana" id="nama_pelaksana" data-placeholder="Masukkan Nama Pelaksana ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="inisial_pelaksana" id="inisial_pelaksana" data-placeholder="Masukkan Inisial Pelaksana ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="nama_pengawas" id="nama_pengawas" data-placeholder="Masukkan Nama Pengawas ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="inisial_pengawas" id="inisial_pengawas" data-placeholder="Masukkan Inisial Pengawas ...">
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
