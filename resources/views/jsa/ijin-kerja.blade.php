@extends('layouts.app')

@section('title', 'Kelola JSA')

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
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <h2 class="mb-0">JSA</h2>
                                <p class="mb-0 text-sm">Kelola JSA</p>
                            </div>
                            <div class="">
                                <a href="{{ url('ijin-kerja') }}" class="mb-2 btn btn-outline-light {{ Request::segment(1) == 'ijin-kerja' ? 'active' : '' }}" title="Tampilan tabel" data-toggle="tooltip"><i class="fas fa-list"></i></a>
                                <a href="{{ url('/ijin-kerja-grid') }}" class="mb-2 btn btn-outline-light {{ Request::segment(1) == 'ijin-kerja-grid' ? 'active' : '' }}" title="Tampilan grid" data-toggle="tooltip"><i class="fas fa-table"></i></a>
                                @can('admin_kontraktor')
                                    <a href="{{ route('jsa.create') }}" class="mb-2 btn btn-primary" title="Tambah"><i class="fas fa-plus"></i> Tambah JSA</a>
                                @endcan
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

@if (Request::segment(1) == 'ijin-kerja-grid')
    <div class="row d-flex justify-content-center">
        @forelse ($jsa as $item)
            <div class="col-lg-6 mb-3">
                <div class="card shadow">
                    <div class="card-header d-inline-flex justify-content-between">
                        <h3 class="mb-0">{{ $item->pengaju->nama }}</h3>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opsi
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a href="{{ route('jsa.show',$item) }}" class="dropdown-item"><i class="fas fa-fw fa-eye"> Detail</i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="">
                            <tr>
                                <td width="180px" valign="top">No. JSA</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->no_jsa }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Nama Pekerjaan</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->nama_pekerjaan }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Lokasi</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->lokasi }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Nomor Kontrak</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->nomor_kontrak }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Tanggal Kontrak</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ date('d/m/Y', strtotime($item->tanggal_kontrak)) }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Tanggal Review</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->tanggal_review ? date('d/m/Y', strtotime($item->tanggal_review)) : '-' }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Tanggal Persetujuan</td>
                                <td valign="top">:</td>
                                <td valign="top">{{ $item->tanggal_persetujuan ? date('d/m/Y', strtotime($item->tanggal_persetujuan)) : '-' }}</td>
                            </tr>
                            <tr>
                                <td width="180px" valign="top">Status</td>
                                <td valign="top">:</td>
                                <td valign="top">
                                    @if ($item->ijinKerjaPanas)
                                        Telah memiliki ijin kerja
                                    @else
                                        Belum memiliki ijin kerja
                                    @endif
                                </td>
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
            {{ $jsa->links() }}
        </div>
    </div>
@else
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
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
                                <td width="180px">{{ $item->pengaju->nama }}</td>
                                <td>{{ $item->no_jsa }}</td>
                                <td>{{ $item->nama_pekerjaan }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->nomor_kontrak }}</td>
                                <td>{{ $item->tanggal_kontrak ? date('d/m/Y', strtotime($item->tanggal_kontrak)) : '-' }}</td>
                                <td>{{ $item->tanggal_review ? date('d/m/Y', strtotime($item->tanggal_review)) : '-' }}</td>
                                <td>{{ $item->tanggal_persetujuan ? date('d/m/Y', strtotime($item->tanggal_persetujuan)) : '-' }}</td>
                                <td>
                                    @if ($item->ijinKerjaPanas)
                                        Telah memiliki ijin kerja
                                    @else
                                        Belum memiliki ijin kerja
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('jsa.show',$item) }}" class="btn btn-sm btn-primary" title="Detail" data-toggle="tooltip"><i class="fas fa-fw fa-eye"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td width="180px" colspan="9" align="center">Data Tidak Tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $jsa->links() }}
            </div>
        </div>
    </div>
@endif
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $(".pagination").addClass('justify-content-center')
    });
</script>
@endpush
