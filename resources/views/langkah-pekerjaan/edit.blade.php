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
                    <div id="potensi-bahaya">
                        <label class="form-control-label">Potensi Bahaya</label>
                        @foreach ($langkahPekerjaan->potensiBahaya as $item)
                            <div class="form-group mb-1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="potensi_bahaya" value="{{ $item->deskripsi }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-danger delete" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                                        <button type="button" class="btn btn-outline-primary update" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" id="tambah-potensi-bahaya">Tambah potensi bahaya</button>
                    <div class="form-group mt-3">
                        <label class="form-control-label" for="bahaya_spesifik">Bahaya Spesifik</label>
                        <input class="form-control @error('bahaya_spesifik') is-invalid @enderror" type="text" name="bahaya_spesifik" id="bahaya_spesifik" placeholder="Masukkan Bahaya Spesifik ..." value="{{ old('bahaya_spesifik', $langkahPekerjaan->bahaya_spesifik) }}">
                        @error('bahaya_spesifik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="rencana_tindakan_pencegahan">Rencana Tindakan Pencegahan</label>
                        <textarea class="form-control @error('rencana_tindakan_pencegahan') is-invalid @enderror" name="rencana_tindakan_pencegahan" id="rencana_tindakan_pencegahan" placeholder="Masukkan Rencana Tindakan Pencegahan ...">{{ old('rencana_tindakan_pencegahan', $langkahPekerjaan->rencana_tindakan_pencegahan) }}</textarea>
                        @error('rencana_tindakan_pencegahan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="pic_pelaksana">PIC Pelaksana</label>
                        <input class="form-control @error('pic_pelaksana') is-invalid @enderror" type="text" name="pic_pelaksana" id="pic_pelaksana" placeholder="Masukkan PIC Pelaksana ..." value="{{ old('pic_pelaksana', $langkahPekerjaan->pic_pelaksana) }}">
                        @error('pic_pelaksana')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="waktu">Waktu</label>
                        <input class="form-control @error('waktu') is-invalid @enderror" type="text" name="waktu" id="waktu" placeholder="Masukkan Waktu ..." value="{{ old('waktu', $langkahPekerjaan->waktu) }}">
                        @error('waktu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
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
                <div class="form-group mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="potensi_bahaya" placeholder="Masukkan Potensi Bahaya ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
    				        <button type="button" class="btn btn-outline-primary tambah" data-toggle="tooltip" title="Simpan"><i class="fas fa-save"></i></button>
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
            let btn          = this;
            let potensi_bahaya  = $(this).parent().siblings('input[name="potensi_bahaya"]').val();

            $.ajax({
                url: "{{ route('potensiBahaya.store') }}",
                method: "post",
                data: {
                    _token      : $("meta[name='csrf-token']").attr('content'),
                    potensi_bahaya          : potensi_bahaya,
                    langkah_pekerjaan_id    : "{{ $langkahPekerjaan->id }}",
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
            let btn      = $(this);
            let id          = $(this).parent().siblings('input[name="id"]').val();
            $.ajax({
                url         : "{{ url('/potensiBahaya') }}/" + id,
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

                        $(hapus).tooltip('dispose');
                        $(hapus).parent('div').parent('div').parent('div').remove();

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
            let btn             = $(this);
            let id              = $(this).parent().siblings('input[name="id"]').val();
            let potensi_bahaya  = $(this).parent().siblings('[name="potensi_bahaya"]').val();
            $.ajax({
                url: "{{ url('/potensiBahaya') }}/" + id,
                method: "post",
                data: {
                    _token  : $("meta[name='csrf-token']").attr('content'),
                    _method : 'patch',
                    potensi_bahaya   : potensi_bahaya,
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
