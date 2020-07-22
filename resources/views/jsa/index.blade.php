@extends('layouts.app')

@section('title', 'JSA')

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
                        <div class="row">
                            <div class="col-6">
                                <h2 class="mb-0">JSA</h2>
                                <p class="mb-0 text-sm">Kelola JSA {{ config('app.name') }}</p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('jsa.create') }}" class="btn btn-success" title="Tambah"><i class="fas fa-plus"></i> Tambah JSA</a>
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
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ route('jsa.index') }}" method="GET">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No. JSA</th>
                        <th>Nama Pekerjaan</th>
                        <th>Lokasi</th>
                        <th>Nomor Kontrak</th>
                        <th>Tanggal Kontrak</th>
                        <th>Tanggal Review</th>
                        <th>Tanggal Persetujuan</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jsa as $item)
                        <tr>
                            <td>{{ $item->no_jsa }}</td>
                            <td>{{ $item->nama_pekerjaan }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->nomor_kontrak }}</td>
                            <td>{{ date('d/m/Y', strtotime($item->tanggal_kontrak)) }}</td>
                            <td>{{ $item->tanggal_review ? date('d/m/Y', strtotime($item->tanggal_review)) : '-' }}</td>
                            <td>{{ $item->tanggal_persetujuan ? date('d/m/Y', strtotime($item->tanggal_persetujuan)) : '-' }}</td>
                            <td>
                                @if ($item->status_review == 0)
                                    Belum direview
                                @endif
                                @if ($item->status_review == 1)
                                    Telah direview
                                @endif
                                @if ($item->status_review == 2)
                                    Review ditolak
                                @endif
                                dan
                                @if ($item->status_persetujuan == 0)
                                    Belum disetujui
                                @endif
                                @if ($item->status_review == 1)
                                    Telah disetujui
                                @endif
                                @if ($item->status_review == 2)
                                    Persetujuan ditolak
                                @endif
                            </td>
                            <td>
                                @if ($item->status_review == 1 && $item->status_persetujuan == 1 )
                                    <a href="{{ route('jsa.show',$item) }}" class="btn btn-sm btn-success" title="Cetak" data-toggle="tooltip"><i class="fas fa-print"></i></a>
                                @endif
                                <a href="{{ route('jsa.edit',$item) }}" class="btn btn-sm btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="#modal-hapus" class="btn btn-sm btn-danger hapus" data-nama="{{ $item->nama_pekerjaan }}" data-id="{{ $item->id }}" data-toggle="modal"><i class="fas fa-trash" title="Hapus" data-toggle="tooltip"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" align="center">Data Tidak Tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
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
    $(document).ready(function(){
        $('.hapus').on('click', function(){
            $('#nama-hapus').html('Apakah Anda yakin ingin menghapus ' + $(this).data('nama') + '???');
            $('#form-hapus').attr('action', $("meta[name='base-url']").attr('content') + '/jsa/' + $(this).data('id'));
        });
    });
</script>
@endpush
