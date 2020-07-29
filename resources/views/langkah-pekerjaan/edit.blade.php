@extends('layouts.app')

@section('title', 'Edit Langkah Pekerjaan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Langkah Pekerjaan</h2>
                                <p class="mb-0 text-sm">Kelola Langkah Pekerjaan {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('jsa.edit', $langkahPekerjaan->jsa_id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Edit Langkah Pekerjaan</h3>
            </div>
            <div class="card-body">
                <form class="formPekerjaanUpdate" autocomplete="off" action="{{ route('langkahPekerjaan.update', $langkahPekerjaan) }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label class="form-control-label" for="urutan_langkah_langkah_pekerjaan">Urutan Langkah-Langkah Pekerjaan</label>
                        <input class="form-control @error('urutan_langkah_langkah_pekerjaan') is-invalid @enderror" type="text" name="urutan_langkah_langkah_pekerjaan" id="urutan_langkah_langkah_pekerjaan" placeholder="Masukkan Urutan Langkah-Langkah Pekerjaan ..." value="{{ old('urutan_langkah_langkah_pekerjaan', $langkahPekerjaan->urutan_langkah_langkah_pekerjaan) }}">
                        @error('urutan_langkah_langkah_pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-3" id="potensi-bahaya">
                        <label class="form-control-label">Potensi Bahaya</label>
                        @foreach ($langkahPekerjaan->potensiBahaya as $item)
                            <div class="form-group pl-lg-4 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="potensi_bahaya" value="{{ $item->deskripsi }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="input-group-append">
                                        <button data-url="{{ route('potensiBahaya.destroy', $item->id) }}" type="button" class="btn btn-outline-danger delete" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <button data-url="{{ route('potensiBahaya.update', $item->id) }}" type="button" class="btn btn-outline-primary update" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="ml-lg-4 btn btn-primary btn-sm" id="tambah-potensi-bahaya">Tambah potensi bahaya</button>

                    <div class="mt-3" id="bahaya-spesifik">
                        <label class="form-control-label">Bahaya Spesifik</label>
                        @foreach ($langkahPekerjaan->bahayaSpesifik as $item)
                            <div class="form-group pl-lg-4 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="bahaya_spesifik" value="{{ $item->deskripsi }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="input-group-append">
                                        <button data-url="{{ route('bahayaSpesifik.destroy', $item->id) }}" type="button" class="btn btn-outline-danger delete" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <button data-url="{{ route('bahayaSpesifik.update', $item->id) }}" type="button" class="btn btn-outline-primary update" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="ml-lg-4 btn btn-primary btn-sm" id="tambah-bahaya-spesifik">Tambah bahaya spesifik</button>

                    <div class="mt-3" id="rencana-tindakan-pencegahan">
                        <label class="form-control-label">Rencana Tindakan Pencegahan</label>
                        @foreach ($langkahPekerjaan->rencanaTindakanPencegahan as $item)
                            <div class="form-group pl-lg-4 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="rencana_tindakan_pencegahan" value="{{ $item->deskripsi }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="input-group-append">
                                        <button data-url="{{ route('rencanaTindakanPencegahan.destroy', $item->id) }}" type="button" class="btn btn-outline-danger delete" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <button data-url="{{ route('rencanaTindakanPencegahan.update', $item->id) }}" type="button" class="btn btn-outline-primary update" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="ml-lg-4 btn btn-primary btn-sm" id="tambah-rencana-tindakan-pencegahan">Tambah rencana tindakan pencegahan</button>

                    <div class="mt-3" id="pic-pelaksana">
                        <label class="form-control-label">PIC Pelaksana</label>
                        @foreach ($langkahPekerjaan->picPelaksana as $item)
                            <div class="form-group pl-lg-4 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="pic_pelaksana" value="{{ $item->deskripsi }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="input-group-append">
                                        <button data-url="{{ route('picPelaksana.destroy', $item->id) }}" type="button" class="btn btn-outline-danger delete" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <button data-url="{{ route('picPelaksana.update', $item->id) }}" type="button" class="btn btn-outline-primary update" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="ml-lg-4 btn btn-primary btn-sm" id="tambah-pic-pelaksana">Tambah pic pelaksana</button>

                    <div class="mt-3" id="waktu">
                        <label class="form-control-label">Waktu</label>
                        @foreach ($langkahPekerjaan->waktu as $item)
                            <div class="form-group pl-lg-4 mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="waktu" value="{{ $item->deskripsi }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="input-group-append">
                                        <button data-url="{{ route('waktu.destroy', $item->id) }}" type="button" class="btn btn-outline-danger delete" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <button data-url="{{ route('waktu.update', $item->id) }}" type="button" class="btn btn-outline-primary update" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="ml-lg-4 btn btn-primary btn-sm" id="tambah-waktu">Tambah waktu</button>

                    <button type="submit" class="btn btn-primary btn-block mt-3">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function clearError(element) {
        $(element).removeClass('is-invalid');
        $(element).siblings('.invalid-feedback').remove();
    }

    $(document).ready(function () {
        $("#tambah-potensi-bahaya").click(function(){
            $("#potensi-bahaya").append(`
                <div class="pl-lg-4 form-group mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="potensi_bahaya" placeholder="Masukkan Potensi Bahaya ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
    				        <button type="button" data-url="{{ route('potensiBahaya.store') }}" class="btn btn-outline-primary tambah" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-bahaya-spesifik").click(function(){
            $("#bahaya-spesifik").append(`
                <div class="pl-lg-4 form-group mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="bahaya_spesifik" placeholder="Masukkan Bahaya Spesifik ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
    				        <button type="button" data-url="{{ route('bahayaSpesifik.store') }}" class="btn btn-outline-primary tambah" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-pic-pelaksana").click(function(){
            $("#pic-pelaksana").append(`
                <div class="pl-lg-4 form-group mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="pic_pelaksana" placeholder="Masukkan PIC Pelaksana ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
    				        <button type="button" data-url="{{ route('picPelaksana.store') }}" class="btn btn-outline-primary tambah" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-rencana-tindakan-pencegahan").click(function(){
            $("#rencana-tindakan-pencegahan").append(`
                <div class="pl-lg-4 form-group mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="rencana_tindakan_pencegahan" placeholder="Masukkan Rencana Tindakan Pencegahan ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
    				        <button type="button" data-url="{{ route('rencanaTindakanPencegahan.store') }}" class="btn btn-outline-primary tambah" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-waktu").click(function(){
            $("#waktu").append(`
                <div class="pl-lg-4 form-group mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="waktu" placeholder="Masukkan Waktu ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
    				        <button type="button" data-url="{{ route('waktu.store') }}" class="btn btn-outline-primary tambah" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $(document).on("click", ".hapus", function () {
            $(this).tooltip('dispose');
            $(this).parent('div').parent('div').parent('div').remove();
        });

        $(document).on("click", ".tambah", function () {
            let btn                         = this;
            let potensi_bahaya              = $(this).parent().siblings('input[name="potensi_bahaya"]').val();
            let bahaya_spesifik             = $(this).parent().siblings('input[name="bahaya_spesifik"]').val();
            let rencana_tindakan_pencegahan = $(this).parent().siblings('input[name="rencana_tindakan_pencegahan"]').val();
            let pic_pelaksana               = $(this).parent().siblings('input[name="pic_pelaksana"]').val();
            let waktu                       = $(this).parent().siblings('input[name="waktu"]').val();

            $.ajax({
                url: $(btn).data('url'),
                method: "post",
                data: {
                    _token                      : $("meta[name='csrf-token']").attr('content'),
                    potensi_bahaya              : potensi_bahaya,
                    bahaya_spesifik             : bahaya_spesifik,
                    rencana_tindakan_pencegahan : rencana_tindakan_pencegahan,
                    pic_pelaksana               : pic_pelaksana,
                    waktu                       : waktu,
                    langkah_pekerjaan_id        : "{{ $langkahPekerjaan->id }}",
                },
                beforeSend: function () {
                    $(btn).attr('disabled','disabled');
                    $(btn).html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt="">`);
                },
                success : function (result) {
                    $(btn).html('<i class="fas fa-save"></i>');
                    $(btn).removeAttr('disabled');
                    $(btn).removeClass('tambah');
                    $(btn).addClass('update');
                    $(btn).siblings('.hapus').removeClass('hapus');
                    $(btn).siblings('.hapus').addClass('delete');
                    if (result.success) {
                        $('.notifikasi').html(`
                            <div class="alert alert-success alert-dismissible fade show">
                                <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
                                <span class="alert-text">
                                    ${result.message}
                                </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        setTimeout(() => {
                            $(".notifikasi").html('');
                        }, 3000);
                    }
                },
                error: function (data) {
                    console.clear();
                    $(btn).html('<i class="fas fa-save"></i>');
                    $(btn).removeAttr('disabled');
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
                        if (!$(btn).parent().siblings("[name='" + i + "']").hasClass('is-invalid')) {
                            $(btn).parent().siblings("[name='" + i + "']").addClass('is-invalid');
                            $(btn).parent().siblings("[name='" + i + "']").focus();
                        }
                    });
                }
            });
        });

        $(document).on("click", ".delete", function () {
            let btn = $(this);
            $.ajax({
                url         : $(btn).data("url"),
                method      : 'post',
                data        : {
                    _token  : $("meta[name='csrf-token']").attr('content'),
                    _method : 'delete',
                },
                beforeSend: function () {
                    $(btn).attr('disabled','disabled');
                    $(btn).html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt="">`);
                },
                success : function (result) {
                    $(btn).html('<i class="fas fa-trash"></i>');
                    $(btn).removeAttr('disabled');
                    if (result.success) {
                        $('.notifikasi').html(`
                            <div class="alert alert-success alert-dismissible fade show">
                                <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
                                <span class="alert-text">
                                    ${result.message}
                                </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);

                        $(btn).tooltip('dispose');
                        $(btn).parent('div').parent('div').parent('div').remove();

                        setTimeout(() => {
                            $(".notifikasi").html('');
                        }, 3000);
                    }
                },
                error: function (data) {
                    console.clear();
                    $(btn).html('<i class="fas fa-save"></i>');
                    $(btn).removeAttr('disabled');
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
                        if (!$(btn).parent().siblings("[name='" + i + "']").hasClass('is-invalid')) {
                            $(btn).parent().siblings("[name='" + i + "']").addClass('is-invalid');
                            $(btn).parent().siblings("[name='" + i + "']").focus();
                        }
                    });
                }
            });
        });

        $(document).on("click", ".update", function () {
            let btn                         = $(this);
            let id                          = $(this).parent().siblings('input[name="id"]').val();
            let potensi_bahaya              = $(this).parent().siblings('input[name="potensi_bahaya"]').val();
            let bahaya_spesifik             = $(this).parent().siblings('input[name="bahaya_spesifik"]').val();
            let rencana_tindakan_pencegahan = $(this).parent().siblings('input[name="rencana_tindakan_pencegahan"]').val();
            let pic_pelaksana               = $(this).parent().siblings('input[name="pic_pelaksana"]').val();
            let waktu                       = $(this).parent().siblings('input[name="waktu"]').val();
            $.ajax({
                url: $(btn).data("url"),
                method: "post",
                data: {
                    _token                      : $("meta[name='csrf-token']").attr('content'),
                    _method                     : 'patch',
                    potensi_bahaya              : potensi_bahaya,
                    bahaya_spesifik             : bahaya_spesifik,
                    rencana_tindakan_pencegahan : rencana_tindakan_pencegahan,
                    pic_pelaksana               : pic_pelaksana,
                    waktu                       : waktu,
                },
                beforeSend: function () {
                    $(btn).attr('disabled','disabled');
                    $(btn).html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt="">`);
                },
                success : function (result) {
                    $(btn).html('<i class="fas fa-save"></i>');
                    $(btn).removeAttr('disabled');
                    if (result.success) {
                        $('.notifikasi').html(`
                            <div class="alert alert-success alert-dismissible fade show">
                                <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
                                <span class="alert-text">
                                    ${result.message}
                                </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        setTimeout(() => {
                            $(".notifikasi").html('');
                        }, 3000);
                    }
                },
                error: function (data) {
                    console.clear();
                    $(btn).html('<i class="fas fa-save"></i>');
                    $(btn).removeAttr('disabled');
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
                        if (!$(btn).parent().siblings("[name='" + i + "']").hasClass('is-invalid')) {
                            $(btn).parent().siblings("[name='" + i + "']").addClass('is-invalid');
                            $(btn).parent().siblings("[name='" + i + "']").focus();
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
