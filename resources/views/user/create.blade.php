@extends('layouts.app')

@section('title', 'Tambah Pengguna')

@section('styles')
<style>
    .foto-profil:hover {
        opacity: 0.7;
    }
</style>
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="mb-0">Tambah Pengguna</h2>
                                <p class="mb-0 text-sm">Kelola Pengguna {{ config('app.name') }}</p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ URL::previous() }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Tambah Pengguna</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('pengguna.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <label class="form-control-label" for="foto_profil">Foto Profil</label><br>
                            <a href="#foto_profil" title="Upload Foto Produk">
                                <img id="img-avatar" src="{{ url(Storage::url('plus-img.png')) }}" alt="{{ url(Storage::url('plus-img.png')) }}" class="rounded-circle border mw-100 foto-profil" style="max-height: 150px; max-width: 200px;">
                            </a>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama</label>
                                <input class="form-control form-control-alternative @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" placeholder="Masukkan nama ..." value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="peran">Peran</label>
                                <select name="peran" id="peran" class="form-control form-control-alternative @error('peran') is-invalid @enderror">
                                    <option value="" disabled>Silahkan Pilih Peran</option>
                                    @foreach ($peran as $item)
                                        <option value="{{ $item->id }}" {{ old('peran') == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('peran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="file" name="foto_profil" id="foto_profil" style="display: none">
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const imgAvatar = document.getElementById("img-avatar");
    const inputAvatar = document.getElementById("foto_profil");

    imgAvatar.onclick = function () {
        inputAvatar.click();
    };

    inputAvatar.onchange = function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgAvatar.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    };
</script>
@endpush
