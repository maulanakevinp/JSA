@extends('layouts.app')

@section('title', 'Tambah Langkah Pekerjaan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah Langkah Pekerjaan</h2>
                                <p class="mb-0 text-sm">Kelola Langkah Pekerjaan {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('jsa.edit', $jsa) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Tambah Langkah Pekerjaan</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="javascript:;" method="POST">
                    @csrf
                    <input type="hidden" name="potensi_bahaya[]" value="1">
                    <input type="hidden" name="bahaya_spesifik[]" value="1">
                    <input type="hidden" name="rencana_tindakan_pencegahan[]" value="1">
                    <input type="hidden" name="pic_pelaksana[]" value="1">
                    <input type="hidden" name="waktu[]" value="1">
                    <input type="hidden" name="jsa_id" value="{{ $jsa->id }}">
                    <div class="form-group">
                        <label class="form-control-label" for="urutan_langkah_langkah_pekerjaan">Urutan Langkah-Langkah Pekerjaan</label>
                        <input class="form-control" type="text" name="urutan_langkah_langkah_pekerjaan" id="urutan_langkah_langkah_pekerjaan" placeholder="Masukkan Urutan Langkah-Langkah Pekerjaan ...">
                    </div>
                    <div class="mt-3" id="potensi-bahaya">
                        <label class="form-control-label" for="potensi_bahaya">Potensi Bahaya</label>
                        <div class="pl-lg-4 form-group mb-1">
                            <input class="form-control" type="text" name="potensi_bahaya[]" placeholder="Masukkan Potensi Bahaya ...">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm ml-lg-4" id="tambah-potensi-bahaya">Tambah potensi bahaya</button>

                    <div class="mt-3" id="bahaya-spesifik">
                        <label class="form-control-label" for="bahaya_spesifik">Bahaya Spesifik</label>
                        <div class="pl-lg-4 form-group mb-1">
                            <input class="form-control" type="text" name="bahaya_spesifik[]" id="bahaya_spesifik" placeholder="Masukkan Bahaya Spesifik ...">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm ml-lg-4" id="tambah-bahaya-spesifik">Tambah Bahaya Spesifik</button>

                    <div class="mt-3" id="rencana-tindakan-pencegahan">
                        <label class="form-control-label" for="rencana_tindakan_pencegahan">Rencana Tindakan Pencegahan</label>
                        <div class="pl-lg-4 form-group mb-1">
                            <textarea class="form-control" name="rencana_tindakan_pencegahan[]" id="rencana_tindakan_pencegahan" placeholder="Masukkan Rencana Tindakan Pencegahan ...">{{ old('rencana_tindakan_pencegahan') }}</textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm ml-lg-4" id="tambah-rencana-tindakan-pencegahan">Tambah Rencana Tindakan Pencegahan</button>

                    <div class="mt-3" id="pic-pelaksana">
                        <label class="form-control-label" for="pic_pelaksana">PIC Pelaksana</label>
                        <div class="pl-lg-4 form-group mb-1">
                            <input class="form-control" type="text" name="pic_pelaksana[]" id="pic_pelaksana" placeholder="Masukkan PIC Pelaksana ...">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm ml-lg-4" id="tambah-pic-pelaksana">Tambah PIC Pelaksana</button>

                    <div class="mt-3" id="waktu">
                        <label class="form-control-label" for="waktu">Waktu</label>
                        <div class="pl-lg-4 form-group mb-1">
                            <input class="form-control" type="text" name="waktu[]" id="waktu" placeholder="Masukkan Waktu ...">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm ml-lg-4" id="tambah-waktu">Tambah Waktu</button>

                    <button type="submit" class="btn btn-primary btn-block mt-3">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-tambah" aria-hidden="true">
    <div class="modal-dialog modal-success modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-success">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Tambah?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="fas fa-check-circle fa-5x"></i>
                    <h4 class="heading mt-4">Berhasil</h4>
                    <p>Langkah langkah pekerjaan berhasil ditambahkan</p>
                    <p><strong>Apakah ingin menambah lagi ???</strong></p>
                </div>

            </div>

            <div class="modal-footer">
                <a href="{{ route('langkahPekerjaan.create', $jsa->id) }}" class="btn btn-white">YA</a>
                <a href="{{ route('jsa.edit', $jsa) }}" class="btn btn-link text-white ml-auto">Tidak</a>
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

    $(document).ready(function(){
        $("#tambah-potensi-bahaya").click(function(){
            $("#potensi-bahaya").append(`
                <div class="form-group pl-lg-4 mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="potensi_bahaya[]" placeholder="Masukkan Potensi Bahaya ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-bahaya-spesifik").click(function(){
            $("#bahaya-spesifik").append(`
                <div class="form-group pl-lg-4 mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="bahaya_spesifik[]" placeholder="Masukkan Bahaya Spesifik ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-pic-pelaksana").click(function(){
            $("#pic-pelaksana").append(`
                <div class="form-group pl-lg-4 mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="pic_pelaksana[]" placeholder="Masukkan PIC Pelaksana ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-rencana-tindakan-pencegahan").click(function(){
            $("#rencana-tindakan-pencegahan").append(`
                <div class="form-group pl-lg-4 mb-1">
                    <div class="input-group">
                        <textarea class="form-control" type="text" name="rencana_tindakan_pencegahan[]" placeholder="Masukkan Rencana Tindakan Pencegahan ..."></textarea>
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            `);
            $('[data-toggle="tooltip"]').tooltip();
        });

        $("#tambah-waktu").click(function(){
            $("#waktu").append(`
                <div class="form-group pl-lg-4 mb-1">
                    <div class="input-group">
                        <input class="form-control" type="text" name="waktu[]" placeholder="Masukkan Waktu ...">
                        <div class="input-group-append">
    				        <button type="button" class="btn btn-outline-danger hapus" data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></button>
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

        $('form').on('submit',function(){
            let form = this;
            $(".notifikasi").html('');
            $.ajax({
                url: "{{ route('langkahPekerjaan.store') }}",
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
                    $("#modal-tambah").modal('show');
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
    });
</script>
@endpush
