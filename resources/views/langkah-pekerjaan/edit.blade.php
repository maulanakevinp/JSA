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
                        <input class="form-control form-control-alternative" type="text" name="urutan_langkah_langkah_pekerjaan" id="urutan_langkah_langkah_pekerjaan" placeholder="Masukkan Urutan Langkah-Langkah Pekerjaan ..." value="{{ old('urutan_langkah_langkah_pekerjaan', $langkahPekerjaan->urutan_langkah_langkah_pekerjaan) }}">
                        @error('urutan_langkah_langkah_pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="potensi_bahaya">Potensi Bahaya</label>
                        <input class="form-control form-control-alternative" type="text" name="potensi_bahaya" id="potensi_bahaya" placeholder="Masukkan Potensi Bahaya ..." value="{{ old('potensi_bahaya', $langkahPekerjaan->potensi_bahaya) }}">
                        @error('potensi_bahaya')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="bahaya_spesifik">Bahaya Spesifik</label>
                        <input class="form-control form-control-alternative" type="text" name="bahaya_spesifik" id="bahaya_spesifik" placeholder="Masukkan Bahaya Spesifik ..." value="{{ old('bahaya_spesifik', $langkahPekerjaan->bahaya_spesifik) }}">
                        @error('bahaya_spesifik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="pengendalian_yang_sudah_ada">Pengendalian Yang Sudah Ada</label>
                        <textarea class="form-control form-control-alternative" name="pengendalian_yang_sudah_ada" id="pengendalian_yang_sudah_ada" placeholder="Masukkan Pengendalian Yang Sudah Ada ...">{{ old('pengendalian_yang_sudah_ada', $langkahPekerjaan->pengendalian_yang_sudah_ada) }}</textarea>
                        @error('pengendalian_yang_sudah_ada')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="tingkat_risiko">Tingkat Risiko</label>
                        <input class="form-control form-control-alternative" type="text" name="tingkat_risiko" id="tingkat_risiko" placeholder="Masukkan Tingkat Risiko ..." value="{{ old('tingkat_risiko', $langkahPekerjaan->tingkat_risiko) }}">
                        @error('tingkat_risiko')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="rencana_tindakan_pencegahan">Rencana Tindakan Pencegahan</label>
                        <textarea class="form-control form-control-alternative" name="rencana_tindakan_pencegahan" id="rencana_tindakan_pencegahan" placeholder="Masukkan Rencana Tindakan Pencegahan ...">{{ old('rencana_tindakan_pencegahan', $langkahPekerjaan->rencana_tindakan_pencegahan) }}</textarea>
                        @error('rencana_tindakan_pencegahan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="pic_pelaksana">PIC Pelaksana</label>
                        <input class="form-control form-control-alternative" type="text" name="pic_pelaksana" id="pic_pelaksana" placeholder="Masukkan PIC Pelaksana ..." value="{{ old('pic_pelaksana', $langkahPekerjaan->pic_pelaksana) }}">
                        @error('pic_pelaksana')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="waktu">Waktu</label>
                        <input class="form-control form-control-alternative" type="text" name="waktu" id="waktu" placeholder="Masukkan Waktu ..." value="{{ old('waktu', $langkahPekerjaan->waktu) }}">
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
</script>
@endpush
