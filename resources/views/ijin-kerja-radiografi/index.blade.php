@extends('layouts.app')

@section('title', 'Kelola Ijin Kerja Radiografi')

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
                                <h2 class="mb-0">Ijin Kerja Radiografi</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja Radiografi</p>
                                <p class="mb-0 text-sm">{{ $jsa->nama_perusahaan }} - {{ $jsa->no_jsa }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ url('/ijin-kerja-radiografi', $jsa->id) }}" class="mb-2 btn btn-outline-light {{ Request::segment(1) == 'ijin-kerja-radiografi' ? 'active' : '' }}" title="Tampilan tabel" data-toggle="tooltip"><i class="fas fa-list"></i></a>
                                <a href="{{ url('/ijin-kerja-radiografi-grid', $jsa->id) }}" class="mb-2 btn btn-outline-light {{ Request::segment(1) == 'ijin-kerja-radiografi-grid' ? 'active' : '' }}" title="Tampilan grid" data-toggle="tooltip"><i class="fas fa-table"></i></a>
                                @can('hse')
                                    <a href="{{ route('ijin-kerja-radiografi.create', $jsa->id) }}" class="mb-2 btn btn-primary" title="Tambah Ijin Kerja Radiografi" data-toggle="tooltip"><i class="fas fa-plus"></i></a>
                                @endcan
                                <a href="{{ route('jsa.show', $jsa->id) }}" class="mb-2 btn btn-success" title="Kembali" data-toggle="tooltip"><i class="fas fa-arrow-left"></i></a>
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
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ URL::current() }}" method="GET">
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

@if (Request::segment(1) == 'ijin-kerja-radiografi-grid')
    <div class="row d-flex justify-content-center">
        @forelse ($ijinKerja as $item)
            <div class="col-lg-6 mb-3">
                <div class="card shadow">
                    <div class="card-header d-inline-flex justify-content-between">
                        <span class="font-weight-bold">{{ $item->umum->nomor }}</span>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opsi
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a target="_blank" href="{{ route('ijin-kerja-radiografi.cetak',$item) }}" class="dropdown-item"><i class="fas fa-fw fa-print"> Cetak</i></a>
                                <a href="{{ route('ijin-kerja-radiografi.show',$item) }}" class="dropdown-item"><i class="fas fa-fw fa-eye"> Detail</i></a>
                                @can('hse')
                                    <a href="{{ route('ijin-kerja-radiografi.edit',$item) }}" class="dropdown-item"><i class="fas fa-fw fa-edit"> Edit</i></a>
                                    <a href="#modal-hapus" class="dropdown-item hapus" data-nama="{{ $item->umum->nomor }}" data-id="{{ $item->id }}" data-toggle="modal"><i class="fas fa-fw fa-trash"> Hapus</i></a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="">
                            <tr>
                                <td width="180px" valign="top">Tanggal Pengesahan</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ date('d/m/Y', strtotime($item->umum->tanggal_pengesahan)) }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Tanggal Mulai</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ date('d/m/Y', strtotime($item->umum->tanggal_mulai)) }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Tanggal Selesai</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ date('d/m/Y', strtotime($item->umum->tanggal_selesai)) }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Lokasi Pekerjaan</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->umum->lokasi_pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Uraian Pekerjaan</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->umum->uraian_pekerjaan }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h3>Data Tidak Tersedia</h3>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="col-12">
            {{ $ijinKerja->links() }}
        </div>
    </div>
@else
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Tanggal Pengesahan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Lokasi Pekerjaan</th>
                            <th>Uraian Pekerjaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ijinKerja as $item)
                            <tr>
                                <td>{{ $item->umum->nomor }}</td>
                                <td>{{ $item->umum->tanggal_pengesahan ? date('d/m/Y', strtotime($item->umum->tanggal_pengesahan)) : '-' }}</td>
                                <td>{{ $item->umum->tanggal_mulai ? date('d/m/Y', strtotime($item->umum->tanggal_mulai)) : '-' }}</td>
                                <td>{{ $item->umum->tanggal_selesai ? date('d/m/Y', strtotime($item->umum->tanggal_selesai)) : '-' }}</td>
                                <td>{{ $item->umum->lokasi_pekerjaan }}</td>
                                <td>{{ $item->umum->uraian_pekerjaan }}</td>
                                <td>
                                    <a target="_blank" href="{{ route('ijin-kerja-radiografi.cetak',$item) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Cetak"><i class="fas fa-print"></i></a>
                                    <a href="{{ route('ijin-kerja-radiografi.show',$item) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                                    @can('hse')
                                        <a href="{{ route('ijin-kerja-radiografi.edit',$item) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="#modal-hapus" class="btn btn-sm btn-danger hapus" data-nama="{{ $item->umum->nomor }}" data-id="{{ $item->id }}" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td width="180px" colspan="7" align="center">Data Tidak Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $ijinKerja->links() }}
            </div>
        </div>
    </div>
@endif

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Ijin Kerja Radiografi?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus ijin kerja Radiografi akan menghapus semua data yang dimilikinya</p>
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
        $(".pagination").addClass('justify-content-center')
        $('.hapus').on('click', function(){
            $('#nama-hapus').html('Apakah Anda yakin ingin menghapus ' + $(this).data('nama') + '???');
            $('#form-hapus').attr('action', $("meta[name='base-url']").attr('content') + '/ijinKerjaRadiografi/' + $(this).data('id'));
        });
    });
</script>
@endpush
