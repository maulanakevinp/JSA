@extends('layouts.app')

@section('title', 'Pengguna')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Pengguna</h2>
                                <p class="mb-0 text-sm">Kelola Pengguna {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('pengguna.create') }}" class="btn btn-primary" title="Tambah"><i class="fas fa-plus"></i> Tambah Pengguna</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('form-search')
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ route('pengguna.index') }}" method="GET">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Cari Pengguna ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="row mt-4 justify-content-center">
    @forelse ($users as $user)
        <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="{{ route('pengguna.show', $user) }}" title="Detail Pengguna">
                                <img id="foto_profil" src="{{url(Storage::url($user->foto_profil))}}" alt="Foto Profil {{ $user->nama }}" class="rounded-circle" style="max-height: 150px; max-width: 200px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-md-4 pb-0 pb-md-4"></div>
                <div class="card-body pt-0 pt-md-4 pt-5">
                    <div class="text-center mt-5">
                        <h3>
                            {{ $user->nama }}
                        </h3>
                        <div class="h5 font-weight-300">
                            {{ $user->peran->nama }}
                        </div>
                        <a href="{{ route('pengguna.edit', $user) }}" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-edit"></i> Edit</a>
                        <a class="btn btn-sm btn-danger hapus" data-nama="{{ $user->nama }}" data-id="{{ $user->id }}" data-toggle="modal" href="#modal-hapus" title="Hapus"><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <div class="single-service bg-white rounded shadow">
                <h4>Data belum tersedia</h4>
            </div>
        </div>
    @endforelse
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Pengguna?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus pengguna akan menghapus semua data yang dimilikinya</p>
                    <p><strong id="nama-hapus"></strong></p>
                </div>

            </div>

            <div class="modal-footer">
                <form id="form-hapus" action="" method="POST" >
                    @csrf @method('delete')
                    <button type="submit" class="btn btn-white">Yakin</button>
                </form>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.hapus').on('click', function(){
            $('#nama-hapus').html('Apakah Anda yakin ingin menghapus ' + $(this).data('nama') + '???');
            $('#form-hapus').attr('action', $("meta[name='base-url']").attr('content') + '/pengguna/' + $(this).data('id'));
        });
    });
</script>
@endpush
