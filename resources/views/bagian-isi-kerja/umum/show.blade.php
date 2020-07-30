<h6 class="heading-small text-muted font-weight-bold">UMUM</h6>
<div class="pl-lg-4">
    <div class="form-group">
        <label class="form-control-label" for="nomor">Nomor</label>
        <input disabled class="form-control" type="text" name="nomor" id="nomor" placeholder="Masukkan Nomor ..." value="{{ old('nomor', $ijinKerja->umum->nomor) }}">
    </div>
    <div class="form-group">
        <label class="form-control-label" for="tanggal_pengesahan">Tanggal Pengesahan</label>
        <input disabled class="form-control" type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" placeholder="Masukkan Tanggal Pengesahan ..." value="{{ old('tanggal_pengesahan', $ijinKerja->umum->tanggal_pengesahan) }}">
    </div>
    <p class="mb-0 heading-small text-muted">Masa Berlaku</p>
    <div class="pl-lg-4">
        <div class="form-group">
            <label class="form-control-label" for="tanggal_mulai">Tanggal Mulai</label>
            <input disabled class="form-control" type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Mulai ..." value="{{ date('Y-m-d\TH:i' ,strtotime(old('tanggal_mulai', $ijinKerja->umum->tanggal_mulai))) }}">
        </div>
        @can('hse-manager_kontraktor')
            <div class="form-group">
                <label class="form-control-label" for="tanggal_selesai">Tanggal Selesai</label>
                <input disabled class="form-control" type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" placeholder="Masukkan Tanggal Selesai ..." value="{{ date('Y-m-d\TH:i' ,strtotime(old('tanggal_selesai', $ijinKerja->umum->tanggal_selesai))) }}">
            </div>
        @endcan
        @can('admin_kontraktor')
            <div class="form-group">
                <label class="form-control-label">Tanggal Selesai</label>
                <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" placeholder="Masukkan Tanggal Selesai ..." value="{{ date('Y-m-d\TH:i' ,strtotime(old('tanggal_selesai', $ijinKerja->umum->tanggal_selesai))) }}">
                    <input type="hidden" name="id" value="{{ $ijinKerja->umum->id }}">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-primary updateTanggalSelesai" data-toggle="tooltip" title="Simpan" data-id="{{ $ijinKerja->umum->id }}"><i class="fas fa-save"></i></button>
                    </div>
                </div>
            </div>
        @endcan
    </div>
    <div class="form-group">
        <label class="form-control-label" for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
        <input disabled class="form-control" type="text" name="lokasi_pekerjaan" id="lokasi_pekerjaan" placeholder="Masukkan Lokasi Pekerjaan ..." value="{{ old('lokasi_pekerjaan', $ijinKerja->umum->lokasi_pekerjaan) }}">
    </div>
    <div class="form-group">
        <label class="form-control-label" for="pelaksana_pekerjaan">Pelaksana Pekerjaan</label>
        <input disabled class="form-control" type="text" name="pelaksana_pekerjaan" id="pelaksana_pekerjaan" placeholder="Masukkan Lokasi Pekerjaan ..." value="{{ old('pelaksana_pekerjaan', $ijinKerja->umum->pelaksana_pekerjaan) }}">
    </div>
    <div class="form-group">
        <label class="form-control-label" for="uraian_pekerjaan">Uraian pekerjaan</label>
        <input disabled class="form-control" type="text" name="uraian_pekerjaan" id="uraian_pekerjaan" placeholder="Masukkan Uraian pekerjaan ..." value="{{ old('uraian_pekerjaan', $ijinKerja->umum->uraian_pekerjaan) }}">
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function(){
        $(document).on("click", ".updateTanggalSelesai", function () {
            let simpan = this;
            let id              = $(this).data('id');
            let tanggal_selesai = $(this).parent().siblings('[name="tanggal_selesai"]').val();

            $.ajax({
                url: "{{ url('/umum') }}/" + id,
                method: "post",
                data: {
                    _token          : $("meta[name='csrf-token']").attr('content'),
                    _method         : 'put',
                    tanggal_selesai : tanggal_selesai,
                },
                beforeSend: function () {
                    $(simpan).attr('disabled','disabled');
                    $(simpan).html(`<img height="20px" src="{{ url('/storage/loading.gif') }}" alt="">`);
                },
                success : function (result) {
                    $(simpan).html('<i class="fas fa-save"></i>');
                    $(simpan).removeAttr('disabled');
                    if (result.success) {
                        $('.notifikasi').html(`
                            <div class="alert alert-success alert-dismissible fade show">
                                <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
                                <span class="alert-text">
                                    Tanggal selesai berhasil diperbarui
                                </span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        `);
                        location.reload(true);
                    }
                },
                error: function (data) {
                    console.clear();
                    $(simpan).html('<i class="fas fa-save"></i>');
                    $(simpan).removeAttr('disabled');
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
