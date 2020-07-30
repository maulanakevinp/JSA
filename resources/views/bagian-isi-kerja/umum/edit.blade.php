<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">UMUM</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("umum.update", $ijinKerja->umum_id) }}">
            @csrf @method('patch')
            <div class="form-group">
                <label class="form-control-label" for="nomor">Nomor</label>
                <input class="form-control" type="text" name="nomor" id="nomor" placeholder="Masukkan Nomor ..." value="{{ old('nomor', $ijinKerja->umum->nomor) }}">
            </div>
            <div class="form-group">
                <label class="form-control-label" for="tanggal_pengesahan">Tanggal Pengesahan</label>
                <input class="form-control" type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" placeholder="Masukkan Tanggal Pengesahan ..." value="{{ old('tanggal_pengesahan', $ijinKerja->umum->tanggal_pengesahan) }}">
            </div>
            <p class="mb-0 heading-small text-muted">Masa Berlaku</p>
            <div id="masa-berlaku" class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="tanggal_mulai">Tanggal Mulai</label>
                    <input class="form-control" type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Mulai ..." value="{{ date('Y-m-d\TH:i' ,strtotime(old('tanggal_mulai', $ijinKerja->umum->tanggal_mulai))) }}">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="tanggal_selesai">Tanggal Selesai</label>
                    <input class="form-control" type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" placeholder="Masukkan Tanggal Selesai ..." value="{{ date('Y-m-d\TH:i' ,strtotime(old('tanggal_selesai', $ijinKerja->umum->tanggal_selesai))) }}">
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label" for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
                <input class="form-control" type="text" name="lokasi_pekerjaan" id="lokasi_pekerjaan" placeholder="Masukkan Lokasi Pekerjaan ..." value="{{ old('lokasi_pekerjaan', $ijinKerja->umum->lokasi_pekerjaan) }}">
            </div>
            <div class="form-group">
                <label class="form-control-label" for="pelaksana_pekerjaan">Pelaksana Pekerjaan</label>
                <input class="form-control" type="text" name="pelaksana_pekerjaan" id="pelaksana_pekerjaan" placeholder="Masukkan Pelaksana Pekerjaan ..." value="{{ old('pelaksana_pekerjaan', $ijinKerja->umum->pelaksana_pekerjaan) }}">
            </div>
            <div class="form-group">
                <label class="form-control-label" for="uraian_pekerjaan">Uraian pekerjaan</label>
                <input class="form-control" type="text" name="uraian_pekerjaan" id="uraian_pekerjaan" placeholder="Masukkan Uraian pekerjaan ..." value="{{ old('uraian_pekerjaan', $ijinKerja->umum->uraian_pekerjaan) }}">
            </div>
            @if ($ijinKerja->umum->status_persetujuan == 0 || $ijinKerja->umum->status_persetujuan == 2)
                <div class="form-group">
                    <label class="form-control-label" for="status_persetujuan">Status Persetujuan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_persetujuan" id="status_persetujuan1" value="1" {{ old('status_persetujuan',$ijinKerja->umum->status_persetujuan) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_persetujuan1">
                            Setujui
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_persetujuan" id="status_persetujuan2" value="2" {{ old('status_persetujuan',$ijinKerja->umum->status_persetujuan) == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_persetujuan2">
                            Tidak Setujui
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_persetujuan" id="status_persetujuan3" value="0" {{ old('status_persetujuan',$ijinKerja->umum->status_persetujuan) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_persetujuan3">
                            Belum disetujui
                        </label>
                    </div>
                    @error('status_persetujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="alasan_penolakan_persetujuan" class="form-group">
                    <label class="form-control-label">Alasan Penolakan Persetujuan</label>
                    <textarea class="form-control" type="text" name="alasan_penolakan_persetujuan" placeholder="Masukkan Alasan Penolakan Persetujuan ...">{{ old('alasan_penolakan_persetujuan', $ijinKerja->umum->alasan_penolakan_persetujuan) }}</textarea>
                </div>
            @endif
            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        if ($("#status_persetujuan2").is(':checked')) {
            $("#alasan_penolakan_persetujuan").show();
        } else {
            $("#alasan_penolakan_persetujuan").hide();
        }

        $("#status_persetujuan2").click(function (){
            $("#alasan_penolakan_persetujuan").show();
        });

        $("#status_persetujuan1").click(function (){
            $("#alasan_penolakan_persetujuan").hide();
        });

        $("#status_persetujuan3").click(function (){
            $("#alasan_penolakan_persetujuan").hide();
        });
    });
</script>
@endpush
