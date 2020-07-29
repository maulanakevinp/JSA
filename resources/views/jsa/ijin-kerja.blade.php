@extends('layouts.app')

@section('title', 'Kelola Ijin Kerja')

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
                                <h2 class="mb-0">Ijin Kerja</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja</p>
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

<div class="row d-flex justify-content-center">
    @forelse ($jsa as $item)
        <div class="col-lg-6 mb-3">
            <div class="card shadow">
                <div class="card-header d-inline-flex justify-content-between">
                    <span class="font-weight-bold">{{ $item->nama_perusahaan }}</span>
                    <div class="dropdown">
                        <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opsi
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="width: 350px">
                            <a href="{{ route('jsa.show',$item) }}" class="dropdown-item"><i class="fas fa-fw fa-eye"> Detail</i></a>
                            <a href="{{ route('ijin-kerja-panas.index', $item->id) }}" class="dropdown-item"><i class="fas fa-fw fa-file-alt"> Ijin Kerja Panas</i></a>
                            <a href="{{ route('ijin-kerja-dingin.index', $item->id) }}" class="dropdown-item"><i class="fas fa-fw fa-file-alt"> Ijin Kerja Dingin</i></a>
                            <a href="{{ route('ijin-kerja-di-ketinggian.index', $item->id) }}" class="dropdown-item"><i class="fas fa-fw fa-file-alt"> Ijin Kerja Di Ketinggian</i></a>
                            <a href="{{ route('ijin-kerja-ruang-terbatas.index', $item->id) }}" class="dropdown-item"><i class="fas fa-fw fa-file-alt"> Ijin Kerja Memasuki Ruangan Terbatas</i></a>
                            <a href="{{ route('ijin-kerja-listrik.index', $item->id) }}" class="dropdown-item"><i class="fas fa-fw fa-file-alt"> Ijin Kerja Listrik</i></a>
                            <a href="{{ route('ijin-kerja-galian.index', $item->id) }}" class="dropdown-item"><i class="fas fa-fw fa-file-alt"> Ijin Kerja Galian</i></a>
                            <a href="{{ route('ijin-kerja-radiografi.index', $item->id) }}" class="dropdown-item"><i class="fas fa-fw fa-file-alt"> Ijin Kerja Radiografi</i></a>
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
                                @if (count($item->ijinKerjaPanas) == 0 && count($item->ijinKerjaListrik) == 0 && count($item->ijinKerjaGalian) == 0 && count($item->ijinKerjaRadiografi) == 0 && count($item->ijinKerjaDiKetinggian) == 0 && count($item->ijinKerjaRuangTerbatas) == 0)
                                    Belum memiliki ijin kerja
                                @else
                                    Telah memiliki ijin kerja
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
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $(".pagination").addClass('justify-content-center')
    });
</script>
@endpush
