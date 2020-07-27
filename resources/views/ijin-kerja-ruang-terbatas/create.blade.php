@extends('layouts.app')

@section('title', 'Buat Ijin Kerja Memasuki Ruangan Terbatas')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Buat Ijin Kerja Memasuki Ruangan Terbatas</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Memasuki Ruangan Terbatas {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-ruang-terbatas.index', $jsa->id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Buat Ijin Kerja Memasuki Ruangan Terbatas</h3>
            </div>
            <div class="card-body">
                <form id="form" autocomplete="off" action="javascript:;" method="POST">
                    @csrf
                    <input type="hidden" name="jsa_id" value="{{ $jsa->id }}">
                    @include('bagian-isi-kerja.umum.create')
                    <hr>
                    @include('bagian-isi-kerja.alat-pelindung-diri.create')
                    <hr>
                    @include('bagian-isi-kerja.dokumen-pendukung.create')
                    <hr>
                    <h6 class="heading-small text-muted">SAFETY CHECKLIST</h6>
                    <div class="pl-lg-4">
                        <p class="mb-0 text-sm font-weight-bold">a. Ruang terbatas tersebut sesungguhnya telah :</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Dibebaskan dari tekanan</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="ruang_terbatas_dibebaskan_dari_tekanan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_ruang_terbatas_dibebaskan_dari_tekanan" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Dikosongkan atau drain</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="ruang_terbatas_dikosongkan_atau_drain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_ruang_terbatas_dikosongkan_atau_drain" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">3. Diisolasi </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="ruang_terbatas_diisolasi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_ruang_terbatas_diisolasi" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">b. Semua sambungan listrik/hidrolik diluar dan didalam ruangan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="listrik_or_hidrolik_diluar_dan_didalam_ruangan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">c. Aman dari kandungan gas beracun dan mudah terbakar</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="aman_dari_kandungan_gas_beracun_dan_mudah_terbakar" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">d. Kandungan oksigen mencukupi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="kandungan_oksigen_mencukupi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_kandungan_oksigen_mencukupi" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">e. Ventilasi udara pembantu tersedia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="ventilasi_udara_pembantu_tersedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_ventilasi_udara_pembantu_tersedia" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">f. Terdapat kerja panas di ruangan terbatas</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="terdapat_kerja_panas_di_ruangan_terbatas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_terdapat_kerja_panas_di_ruangan_terbatas" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">g. Terdapat pekerjaan radiografi di ruangan terbatas</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="terdapat_pekerjaan_radiografi_di_ruangan_terbatas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas" placeholder="Masukkan Keterangan ...">
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
                            <label class="form-control-label">i. Peringatan bahaya dan tanda batas tersedia</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="peringatan_bahaya_dan_tanda_batas_tersedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_peringatan_bahaya_dan_tanda_batas_tersedia" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">j. Semua alat kerja penunjang aman untuk digunakan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_alat_kerja_penunjang_aman_untuk_digunakan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">i.Semua pekerja terlatih untuk masuk ke ruangan terbatas</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas" placeholder="Masukkan Keterangan ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">k. Semua pekerja telah lengkap alat pelindung diri</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_pekerja_telah_lengkap_alat_pelindung_diri" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri" placeholder="Masukkan Keterangan ...">
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
                url: "{{ route('ijinKerjaRuangTerbatas.store') }}",
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
                    location.href = "{{ route('ijin-kerja-ruang-terbatas.index', $jsa->id) }}";
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
