@extends('layouts.app')

@section('title', 'Buat Ijin Kerja Listrik')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Buat Ijin Kerja Listrik</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Listrik {{ config('app.name') }}</p>
                                <p class="mb-0 text-sm">{{ $jsa->nama_perusahaan }} - {{ $jsa->no_jsa }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-listrik.index', $jsa->id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Buat Ijin Kerja Listrik</h3>
            </div>
            <div class="card-body">
                <form id="form" autocomplete="off" action="javascript:;" method="POST">
                    @csrf
                    <input type="hidden" name="jsa_id" value="{{ $jsa->id }}">
                    @include('bagian-isi-kerja.umum.create')
                    <hr>
                    @include('bagian-isi-kerja.alat-pelindung-diri.create')
                    <hr>
                    <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                    <div class="pl-lg-4">
                        <p class="mb-0 text-sm font-weight-bold">a. Jalur tersebut sesungguhnya telah :</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Dibebaskan dari aliran listrik</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_telah_dibebaskan_dari_aliran_listrik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_telah_dibebaskan_dari_aliran_listrik" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Peralatan yang terkait telah aman</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_peralatan_yang_terkait_telah_aman" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_peralatan_yang_terkait_telah_aman" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">3. Pemasangan kabel</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_telah_pemasangan_kabel" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_telah_pemasangan_kabel" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">4. Peralatan dalam keadaan bergerak</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_telah_peralatan_dalam_keadaan_bergerak" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">5. Diisolasi dari sumber listrik</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_telah_diisolasi_dari_sumber_listrik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_telah_diisolasi_dari_sumber_listrik" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">6. Peralatan dalam keadaan panas</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_telah_peralatan_dalam_keadaan_panas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_telah_peralatan_dalam_keadaan_panas" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">b. Tersedia jalan masuk dan keluar yang layak</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="tersedia_jalan_masuk_dan_keluar_yang_layak" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak" placeholder="Masukkan Keterangan ...">
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
                            <label class="form-control-label">d. Alat pemadam kebaaran siap sedia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="alat_pemadam_kebaaran_siap_sedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_alat_pemadam_kebaaran_siap_sedia" placeholder="Masukkan Keterangan ...">
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
                            <label class="form-control-label">f. Pekerjaan pada ketinggian yang membahayakan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="pekerjaan_pada_ketinggian_yang_membahayakan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_pekerjaan_pada_ketinggian_yang_membahayakan" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">g. Perlu dengan ijin kerja yang lain</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                    </div>
                    <hr>
                    @include('bagian-isi-kerja.dokumen-pendukung.create')
                    <hr>
                    @include('bagian-isi-kerja.uji-kandungan-gas.create')
                    <hr>
                    @include('bagian-isi-kerja.petugas-pengawas.create')
                    <hr>
                    @include('bagian-isi-kerja.pengesahan.create')
                    <hr>
                    <p class="mb-0 heading-small font-weight-bold">VALIDASI</p>
                    <div id="validasi" class="pl-lg-4">
                        <input type="hidden" name="validasi_hari[]" value="{{ now() }}">
                        <input type="hidden" name="validasi_mulai_hari[]" value="0">
                        <input type="hidden" name="validasi_selesai_hari[]" value="0">
                        <input type="hidden" name="nama_pelaksana[]" value="0">
                        <input type="hidden" name="inisial_pelaksana[]" value="0">
                        <input type="hidden" name="nama_pengawas[]" value="0">
                        <input type="hidden" name="inisial_pengawas[]" value="0">
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
    let i = 1;
    $(document).ready(function () {
        $("#tambahValidasi").click(function () {
            if (i <= 7) {
                $("#validasi").append(`
                    <div class="row mb-0">
                        <div class="col-md-1 mb-3">
                            <span>#${i}</span>
                            <button type="button" class="btn btn-danger hapusValidasi btn-sm" data-toggle="tooltip" title="Hapus Validasi ${i}"><i class="fas fa-trash"></i></button>
                        </div>
                        <div class="col-md-5 mb-3">
                            <div class="form-group">
                                <label class="form-control-label">Masukkan Hari</label>
                                <input class="form-control" type="date" name="validasi_hari[]" placeholder="Masukkan Hari ...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label class="form-control-label">Masukkan Waktu Mulai</label>
                                <input class="form-control" type="time" name="validasi_mulai_hari[]" placeholder="Masukkan Waktu Mulai ...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label class="form-control-label">Masukkan Waktu Selesai</label>
                                <input class="form-control" type="time" name="validasi_selesai_hari[]" placeholder="Masukkan Waktu Selesai ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nama_pelaksana[]" placeholder="Masukkan Nama Pelaksana ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="inisial_pelaksana[]" placeholder="Masukkan Inisial Pelaksana ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nama_pengawas[]" placeholder="Masukkan Nama Pengawas ...">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input class="form-control" type="text" name="inisial_pengawas[]" placeholder="Masukkan Inisial Pengawas ...">
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
            let btn = this;
            i--;
            $(this).tooltip('hide');
            $(this).parent().parent().remove();
            let x = 1;
            $.each($("#validasi").children(".row"), function (i, row) {
                $(row).children(".col-md-1").children("span").html(`#${x}`);
                $(row).children(".col-md-1").children("button").attr('data-original-title', `Hapus Validasi ${x}`);
                x++;
            });
        });

        $("input:checkbox").click(function () {
            $(this).tooltip('hide');
        })

        $('#form').on('submit',function(){
            let form = this;
            $(".notifikasi").html('');
            $.ajax({
                url: "{{ route('ijinKerjaListrik.store') }}",
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
                    location.href = "{{ route('ijin-kerja-listrik.index', $jsa->id) }}";
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
                    let focus = true;
                    $.each(data.responseJSON.errors, function (i, e) {
                        $('#pesanError').append(`<li>`+e+`</li>`);
                        if (!$("[name='" + i + "']").hasClass('is-invalid')) {
                            $("[name='" + i + "']").addClass('is-invalid');
                            if (focus) {
                                $("[name='" + i + "']").focus();
                                focus = false;
                            }
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
