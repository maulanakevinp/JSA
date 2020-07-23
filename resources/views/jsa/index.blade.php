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
                                <a href="{{ url('jsa') }}" class="mb-2 btn btn-outline-light {{ Request::segment(1) == 'jsa' ? 'active' : '' }}" title="Tampilan tabel" data-toggle="tooltip"><i class="fas fa-list"></i></a>
                                <a href="{{ url('/jsa-grid') }}" class="mb-2 btn btn-outline-light {{ Request::segment(1) == 'jsa-grid' ? 'active' : '' }}" title="Tampilan grid" data-toggle="tooltip"><i class="fas fa-table"></i></a>
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

@if (Request::segment(1) == 'jsa-grid')
    <div class="row d-flex justify-content-center">
        @forelse ($jsa as $item)
            <div class="col-lg-6 mb-3">
                <div class="card shadow">
                    <div class="card-header d-inline-flex justify-content-between">
                        <h3>{{ $item->pengaju->nama }}</h3>
                        @if ($item->status_review == 1 && $item->status_persetujuan == 1 )
                            <a href="{{ route('jsa.show',$item) }}" class="btn btn-sm btn-success" title="Cetak" data-toggle="tooltip"><i class="fas fa-print"></i></a>
                        @else
                            <a href="{{ route('jsa.verifikasi',$item) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"> Verifikasi</i></a>
                        @endif
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
                                        belum disetujui
                                    @endif
                                    @if ($item->status_persetujuan == 1)
                                        telah disetujui
                                    @endif
                                    @if ($item->status_persetujuan == 2)
                                        persetujuan ditolak
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
                        <h3>Data belum tersedia</h3>
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
                                        belum disetujui
                                    @endif
                                    @if ($item->status_persetujuan == 1)
                                        telah disetujui
                                    @endif
                                    @if ($item->status_persetujuan == 2)
                                        persetujuan ditolak
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status_review == 1 && $item->status_persetujuan == 1 )
                                        <a href="{{ route('jsa.show',$item) }}" class="btn btn-sm btn-success" title="Cetak" data-toggle="tooltip"><i class="fas fa-print"></i></a>
                                    @else
                                        <a href="{{ route('jsa.verifikasi',$item) }}" class="btn btn-sm btn-success" title="Verifikasi" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                    @endif
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
    $(document).ready(function(){
        $(".pagination").addClass('justify-content-center')
        $('.hapus').on('click', function(){
            $('#nama-hapus').html('Apakah Anda yakin ingin menghapus ' + $(this).data('nama') + '???');
            $('#form-hapus').attr('action', $("meta[name='base-url']").attr('content') + '/jsa/' + $(this).data('id'));
        });
    });
</script>
@endpush
