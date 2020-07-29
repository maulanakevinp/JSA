@extends('layouts.app')

@section('title', 'Buat Ijin Kerja Di Ketinggian')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Buat Ijin Kerja Di Ketinggian</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Di Ketinggian {{ $jsa->nama_perusahaan }}/{{ $jsa->no_sa }} - {{ config('app.name') }}</p>
                                <p class="mb-0 text-sm">{{ $jsa->nama_perusahaan }} - {{ $jsa->no_jsa }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('ijin-kerja-di-ketinggian.index', $jsa->id) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Buat Ijin Kerja Di Ketinggian</h3>
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
                        <p class="mb-0 text-sm font-weight-bold">General</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Apakah sebagian pekerjaan dapat dikerjakan dipermukaan tanah?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Apakah jarak ketinggian sudah diketahui?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jarak_ketinggian_sudah_diketahui" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jarak_ketinggian_sudah_diketahui" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">3. Apakah terdapat bahaya angin?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="terdapat_bahaya_angin" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_terdapat_bahaya_angin" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">4. Apakah area kerja sudah terbebas dari bahaya benda jatuh?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">5. Apakah area kerja sudah terbebas dari semua aliran listrik? (diberikan pengaman atau isolasi)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="area_kerja_sudah_terbebas_dari_semua_aliran_listrik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">6. Apakah area kerja berada di permukaan yang landai?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="area_kerja_berada_dipermukaan_yang_landai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_area_kerja_berada_dipermukaan_yang_landai" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">7. Apakah area kerja berada di permukaan yang basah/becek/berlumpur?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="area_kerja_berada_di_permukaan_yang_basah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_area_kerja_berada_di_permukaan_yang_basah" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">8. Apakah area kerja berada di ruang yang sempit?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="area_kerja_berada_di_ruang_yang_sempit" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_area_kerja_berada_di_ruang_yang_sempit" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">9. Apakah pekerja bekerja sendiri?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="pekerja_bekerja_sendiri" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_pekerja_bekerja_sendiri" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">10. Apakah area kerja perlu dipasang barikade?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="area_kerja_perlu_dipasang_barikade" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_area_kerja_perlu_dipasang_barikade" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">11. Apakah tersedia rambu keselamatan?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="tersedia_rambu_keselamatan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_tersedia_rambu_keselamatan" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 font-weight-bold text-sm">Alat perancah (Scaffolding)</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Apakah alat perancah merupakan alat yang bantu yang paling sesuai untuk digunakan pada pekerjaan di ketinggian?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="alat_perancah_digunakan_pada_pekerjaan_di_ketinggian" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Apakah alat perancah disusun oleh petugas alat perancah? (Sesuai Prosedur Operasi No. O-005/0.24)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="alat_perancah_disusun_oleh_petugas_alat_perancah" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">3. Apakah komponen-komponen alat perancah dalam kondisi yang baik? (Sesuai Prosedur Operasi No. O-005/0.24)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="komponen_alat_perancah_dalam_kondisi_yang_baik" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">4. Apakah komponen-komponen alat perancah sudah terpasang dengan baik?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="komponen_alat_perancah_sudah_terpasang" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_komponen_alat_perancah_sudah_terpasang" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                        <h6 class="mb-0 font-weight-bold text-sm">Tangga (Ladder / Step Ladder)</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Apakah tangga merupakan alat yang bantu yang paling sesuai untuk digunakan pada pekerjaan di ketinggian?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="tangga_merupakan_alat_yang_bantu_yang_paling_sesuai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Apakah tangga dalam kondisi layak dan sesuai untuk digunakan?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="tangga_dalam_kondisi_layak_dan_sesuai" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_tangga_dalam_kondisi_layak_dan_sesuai" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">3. Apakah tangga mampu menahan gerakan saat naik/turun dan bekerja?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="tangga_mampu_menahan_gerakan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_tangga_mampu_menahan_gerakan" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">4. Apakah tangga memiliki panjang yang cukup untuk digunakan?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="tangga_memiliki_panjang_yang_cukup" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_tangga_memiliki_panjang_yang_cukup" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">5. Apakah tangga memiliki stopper/pin/pengunci yang dapat digunakan?</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="tangga_memiliki_stopper" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_tangga_memiliki_stopper" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">6. Apakah pekerja menggunakan peralatan lain saat bekerja? (jika "YA", pekerja harus menggunakan belt)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="pekerja_menggunakan_peralatan_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_pekerja_menggunakan_peralatan_lain" placeholder="Masukkan Keterangan ...">
                                </div>
                            </div>
                        </div>
                    </div>
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
                url: "{{ route('ijinKerjaDiKetinggian.store') }}",
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
                    location.href = "{{ route('ijin-kerja-di-ketinggian.index', $jsa->id) }}";
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
