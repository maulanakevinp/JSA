@extends('layouts.app')

@section('title', 'Tambah JSA')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="mb-0">Edit JSA</h2>
                                <p class="mb-0 text-sm">Kelola JSA {{ config('app.name') }}</p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('jsa.index') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Edit JSA</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('jsa.update', $jsa) }}" method="POST">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label class="form-control-label" for="no_jsa">Nomor JSA</label>
                        <input onchange="clearError(this)" class="form-control form-control-alternative @error('no_jsa') is-invalid @enderror" type="text" name="no_jsa" id="no_jsa" placeholder="Masukkan nomor JSA ..." value="{{ old('no_jsa', $jsa->no_jsa) }}">
                        @error('no_jsa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="nama_pekerjaan">Nama Pekerjaan</label>
                        <input onchange="clearError(this)" class="form-control form-control-alternative @error('nama_pekerjaan') is-invalid @enderror" type="text" name="nama_pekerjaan" id="nama_pekerjaan" placeholder="Masukkan nama pekerjaan ..." value="{{ old('nama_pekerjaan', $jsa->nama_pekerjaan) }}">
                        @error('nama_pekerjaan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="lokasi">Lokasi</label>
                        <input onchange="clearError(this)" class="form-control form-control-alternative @error('lokasi') is-invalid @enderror" type="text" name="lokasi" id="lokasi" placeholder="Masukkan lokasi ..." value="{{ old('lokasi', $jsa->lokasi) }}">
                        @error('lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="nomor_kontrak">Nomor Kontrak</label>
                        <input onchange="clearError(this)" class="form-control form-control-alternative @error('nomor_kontrak') is-invalid @enderror" type="text" name="nomor_kontrak" id="nomor_kontrak" placeholder="Masukkan nomor kontrak ..." value="{{ old('nomor_kontrak', $jsa->nomor_kontrak) }}">
                        @error('nomor_kontrak')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="tanggal_kontrak">Tanggal Kontrak</label>
                        <input onchange="clearError(this)" class="form-control form-control-alternative @error('tanggal_kontrak') is-invalid @enderror" type="date" name="tanggal_kontrak" id="tanggal_kontrak" placeholder="Masukkan tanggal kontrak ..." value="{{ old('tanggal_kontrak', $jsa->tanggal_kontrak) }}">
                        @error('tanggal_kontrak')
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
