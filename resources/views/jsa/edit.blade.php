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
                                <a href="{{ route('jsa.index') }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
@if (count($jsa->langkahPekerjaan) < 1)
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
        <span class="alert-text">
            <strong>Perhatian</strong>
            Harap menambahkan urutan langkah-langkah pekerjaan
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card bg-secondary shadow h-100 mb-3">
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
<div id="formPekerjaan">
    <div class="card shadow h-100 mb-3">
        <div class="card-header bg-secondary border-0 d-flex justify-content-between">
            <h3 class="mb-0">Urutan Langkah Langkah Pekerjaan</h3>
            <a href="{{ route('langkahPekerjaan.create', $jsa) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Tambah</i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Urutan Langkah Langkah Pekerjaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jsa->langkahPekerjaan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->urutan_langkah_langkah_pekerjaan }}</td>
                                <td>
                                    <a href="{{ route('langkahPekerjaan.edit', $item) }}" class="btn btn-sm btn-success" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                    <a href="#modal-hapus" class="btn btn-sm btn-danger hapus" data-nama="{{ $item->urutan_langkah_langkah_pekerjaan }}" data-id="{{ $item->id }}" data-toggle="modal"><i class="fas fa-trash" title="Hapus" data-toggle="tooltip"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center">Harap menambahkan urutan langkah-langkah pekerjaan</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus JSA?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus jsa akan menghapus semua data yang dimilikinya</p>
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
    function clearError(element) {
        $(element).removeClass('is-invalid');
        $(element).siblings('.invalid-feedback').remove();
    }
    $(document).ready(function() {
        $('.hapus').on('click', function(){
            $('#nama-hapus').html('Apakah Anda yakin ingin menghapus ' + $(this).data('nama') + '???');
            $('#form-hapus').attr('action', $("meta[name='base-url']").attr('content') + '/langkahPekerjaan/' + $(this).data('id'));
        });
    });
</script>
@endpush
