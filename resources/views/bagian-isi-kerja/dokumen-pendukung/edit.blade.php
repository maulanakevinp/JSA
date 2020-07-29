<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header font-weight-bold">DOKUMEN PENDUKUNG</div>
    <div class="card-body">
        <form class="form" action="javascript:;" method="post" data-url="{{ route("dokumenPendukung.update", $ijinKerja->dokumen_pendukung_id) }}">
            @csrf @method('patch')
            <div class="form-group">
                <input class="form-control form-control-alternative" type="text" name="a" id="a" value="{{ old('a', $ijinKerja->dokumenPendukung->a) }}" placeholder="Masukkan dokumen pendukung ...">
            </div>
            <div class="form-group">
                <input class="form-control form-control-alternative" type="text" name="b" id="b" value="{{ old('b', $ijinKerja->dokumenPendukung->b) }}" placeholder="Masukkan dokumen pendukung ...">
            </div>
            <div class="form-group">
                <input class="form-control form-control-alternative" type="text" name="c" id="c" value="{{ old('c', $ijinKerja->dokumenPendukung->c) }}" placeholder="Masukkan dokumen pendukung ...">
            </div>
            <div class="form-group">
                <input class="form-control form-control-alternative" type="text" name="d" id="d" value="{{ old('d', $ijinKerja->dokumenPendukung->d) }}" placeholder="Masukkan dokumen pendukung ...">
            </div>
            <div class="form-group">
                <input class="form-control form-control-alternative" type="text" name="e" id="e" value="{{ old('e', $ijinKerja->dokumenPendukung->e) }}" placeholder="Masukkan dokumen pendukung ...">
            </div>
            <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
        </form>
    </div>
</div>
