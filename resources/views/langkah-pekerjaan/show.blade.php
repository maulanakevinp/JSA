@extends('layouts.app')

@section('title', 'Detail Langkah Pekerjaan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Langkah Pekerjaan</h2>
                                <p class="mb-0 text-sm">Kelola Langkah Pekerjaan {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ URL::previous() }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Detail Langkah Pekerjaan</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-control-label" for="urutan_langkah_langkah_pekerjaan">Urutan Langkah-Langkah Pekerjaan</label>
                    <input class="form-control form-control-alternative" disabled type="text" name="urutan_langkah_langkah_pekerjaan" id="urutan_langkah_langkah_pekerjaan" placeholder="Masukkan Urutan Langkah-Langkah Pekerjaan ..." value="{{ $langkahPekerjaan->urutan_langkah_langkah_pekerjaan }}">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="potensi_bahaya">Potensi Bahaya</label>
                    <input class="form-control form-control-alternative" disabled type="text" name="potensi_bahaya" id="potensi_bahaya" placeholder="Masukkan Potensi Bahaya ..." value="{{ $langkahPekerjaan->potensi_bahaya }}">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="bahaya_spesifik">Bahaya Spesifik</label>
                    <input class="form-control form-control-alternative" disabled type="text" name="bahaya_spesifik" id="bahaya_spesifik" placeholder="Masukkan Bahaya Spesifik ..." value="{{ $langkahPekerjaan->bahaya_spesifik }}">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="rencana_tindakan_pencegahan">Rencana Tindakan Pencegahan</label>
                    <textarea class="form-control form-control-alternative" disabled name="rencana_tindakan_pencegahan" id="rencana_tindakan_pencegahan" placeholder="Masukkan Rencana Tindakan Pencegahan ...">{{ $langkahPekerjaan->rencana_tindakan_pencegahan }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="pic_pelaksana">PIC Pelaksana</label>
                    <input class="form-control form-control-alternative" disabled type="text" name="pic_pelaksana" id="pic_pelaksana" placeholder="Masukkan PIC Pelaksana ..." value="{{ $langkahPekerjaan->pic_pelaksana }}">
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="waktu">Waktu</label>
                    <input class="form-control form-control-alternative" disabled type="text" name="waktu" id="waktu" placeholder="Masukkan Waktu ..." value="{{ $langkahPekerjaan->waktu }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
