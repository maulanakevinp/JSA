@extends('layouts.app')

@section('title', 'Edit Ijin Kerja Galian')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Ijin Kerja Galian</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Galian {{ config('app.name') }}</p>
                                <p class="mb-0 text-sm">{{ $ijinKerja->jsa->nama_perusahaan }} - {{ $ijinKerja->jsa->no_jsa }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-galian.index', $ijinKerja->jsa_id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form class="form" action="javascript:;" method="post" data-url="{{ route("ijinKerjaGalian.update", $ijinKerja->id) }}">
            @csrf @method('patch')
            <p class="mb-0 text-sm font-weight-bold">a. Jalur tersebut telah bebas dari :</p>
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label">1. Kabel listrik bawah tanah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="jalur_bebas_dari_kabel_listrik" {{ $ijinKerja->jalur_bebas_dari_kabel_listrik == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_jalur_bebas_dari_kabel_listrik" value="{{ $ijinKerja->keterangan_jalur_bebas_dari_kabel_listrik }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">2. Kabel telepon bawah tanah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="jalur_bebas_dari_kabel_telepon" {{ $ijinKerja->jalur_bebas_dari_kabel_telepon == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_jalur_bebas_dari_kabel_telepon" value="{{ $ijinKerja->keterangan_jalur_bebas_dari_kabel_telepon }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">3. Kabel instrument bawah tanah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="jalur_bebas_dari_kabel_instrument" {{ $ijinKerja->jalur_bebas_dari_kabel_instrument == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_jalur_bebas_dari_kabel_instrument" value="{{ $ijinKerja->keterangan_jalur_bebas_dari_kabel_instrument }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">4. Gorong-gorong bawah tanah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="jalur_bebas_dari_gorong_gorong" {{ $ijinKerja->jalur_bebas_dari_gorong_gorong == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_jalur_bebas_dari_gorong_gorong" value="{{ $ijinKerja->keterangan_jalur_bebas_dari_gorong_gorong }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-control-label">5. Pipa air/gas/minyak bawah tanah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="jalur_bebas_dari_pipa_air_or_gas_or_minyak" {{ $ijinKerja->jalur_bebas_dari_pipa_air_or_gas_or_minyak == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak" value="{{ $ijinKerja->keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak }}" placeholder="Masukkan Keterangan ...">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label">b. Dinding penggalian perlu di topang</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="dinding_penggalian_perlu_di_topang" {{ $ijinKerja->dinding_penggalian_perlu_di_topang == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="keterangan_dinding_penggalian_perlu_di_topang" value="{{ $ijinKerja->keterangan_dinding_penggalian_perlu_di_topang }}" placeholder="Masukkan Keterangan ...">
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label">c. Rambu peringatan telah terpasang</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="rambu_peringatan_telah_terpasang" {{ $ijinKerja->rambu_peringatan_telah_terpasang == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="keterangan_rambu_peringatan_telah_terpasang" value="{{ $ijinKerja->keterangan_rambu_peringatan_telah_terpasang }}" placeholder="Masukkan Keterangan ...">
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label">d. Lokasi telah diberi batas or pengalang</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="lokasi_telah_diberi_batas_or_pengalang" {{ $ijinKerja->lokasi_telah_diberi_batas_or_pengalang == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="keterangan_lokasi_telah_diberi_batas_or_pengalang" value="{{ $ijinKerja->keterangan_lokasi_telah_diberi_batas_or_pengalang }}" placeholder="Masukkan Keterangan ...">
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label">e. Lokasi bebas dari area mudah terbakar</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="lokasi_bebas_dari_area_mudah_terbakar" {{ $ijinKerja->lokasi_bebas_dari_area_mudah_terbakar == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="keterangan_lokasi_bebas_dari_area_mudah_terbakar" value="{{ $ijinKerja->keterangan_lokasi_bebas_dari_area_mudah_terbakar }}" placeholder="Masukkan Keterangan ...">
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label">f. Perlu dengan ijin kerja yang lain</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" {{ $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'checked' : '' }} value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                        </div>
                    </div>
                    <input type="text" class="form-control" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" value="{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}" placeholder="Masukkan Keterangan ...">
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

<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">CATATAN</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("ijinKerjaGalian.update", $ijinKerja->id) }}">
            @csrf @method('patch')
            <div class="form-group">
                <label class="form-control-label" for="catatan">Catatan</label>
                <textarea class="form-control" type="text" name="catatan" id="catatan" data-placeholder="Masukkan Catatan ...">{{ $ijinKerja->catatan }}</textarea>
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
                                <input type="hidden" name="ijin_kerja_galian_id" value="{{ $ijinKerja->id }}">
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
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
