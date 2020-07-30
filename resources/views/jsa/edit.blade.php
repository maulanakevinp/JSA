@extends('layouts.app')

@section('title')
@if ($jsa->status_persetujuan == 1)
    Detail JSA
@else
    @can('admin_kontraktor')
        Edit JSA
    @endcan

    @can('hse-manager_kontraktor')
        Verifikasi JSA
    @endcan
@endif
@endsection

@section('styles')
<style>
    .hover-up:hover {
        top: -5px;
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
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">
                                    @if ($jsa->status_persetujuan == 1)
                                        Detail JSA
                                    @else
                                        @can('admin_kontraktor')
                                            Edit JSA
                                        @endcan

                                        @can('hse-manager_kontraktor')
                                            Verifikasi JSA
                                        @endcan
                                    @endif
                                </h2>
                                <p class="mb-0 text-sm">Kelola JSA</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('jsa.edit', $jsa) }}#langkah-langkah-kerja" class="btn btn-outline-primary mb-3" title="Ijin Kerja"><i class="fas fa-file"></i> Langkah-langkah Kerja</a>
                                @if ($jsa->status_persetujuan == 1 && $jsa->perlu_ijin_kerja == 1)
                                    <a href="{{ route('jsa.edit', $jsa) }}#ijin-kerja" class="btn btn-outline-primary mb-3" title="Ijin Kerja"><i class="fas fa-file-alt"></i> Ijin Kerja</a>
                                @endif
                                <a href="{{ route('jsa.index') }}" class="btn btn-primary mb-3" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
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

@if ($jsa->status_review == 0)
    <div class="alert alert-info fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-bell"></i></span>
        <span class="alert-text">
            <strong>Status</strong>
            Belum direview dan belum disetujui
        </span>
    </div>
@endif

@if ($jsa->status_review == 2)
    <div class="alert alert-warning fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-bell"></i></span>
        <span class="alert-text">
            <strong>Status</strong>
            Review ditolak ({{ $jsa->alasan_penolakan_review }})
        </span>
    </div>
@endif

@if ($jsa->status_review == 1 && $jsa->status_persetujuan == 0)
    <div class="alert alert-info fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-bell"></i></span>
        <span class="alert-text">
            <strong>Status</strong>
            Telah direview oleh {{ $jsa->pereview->nama }} dan belum disetujui
        </span>
    </div>
@endif

@if ($jsa->status_review == 1 && $jsa->status_persetujuan == 1)

    @can('hse')
        @if ($jsa->perlu_ijin_kerja == 1 && count($jsa->ijinKerjaPanas) == 0 && count($jsa->ijinKerjaListrik) == 0 && count($jsa->ijinKerjaGalian) == 0 && count($jsa->ijinKerjaRadiografi) == 0 && count($jsa->ijinKerjaDiKetinggian) == 0 && count($jsa->ijinKerjaRuangTerbatas) == 0)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="fas fa-exclamation-triangle"></i></span>
                <span class="alert-text">
                    <strong>Perhatian</strong>
                    Harap menambahkan ijin kerja
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endcan
    <div class="alert alert-info fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-bell"></i></span>
        <span class="alert-text">
            <strong>Status</strong>
            Telah direview oleh {{ $jsa->pereview->nama }} dan telah disetujui oleh {{ $jsa->penyetuju->nama }}
        </span>
    </div>
@endif

@if ($jsa->status_review == 1 && $jsa->status_persetujuan == 2)
    <div class="alert alert-warning fade show" role="alert">
        <span class="alert-icon"><i class="fas fa-bell"></i></span>
        <span class="alert-text">
            <strong>Status</strong>
            Telah direview oleh {{ $jsa->pereview->nama }} dan tidak disetujui ({{ $jsa->alasan_penolakan_persetujuan }})
        </span>
    </div>
@endif

<div class="card bg-secondary shadow h-100 mb-3">
    <div class="card-header bg-white border-0 d-flex justify-content-between">
        <h3 class="mb-0">
            @if ($jsa->status_persetujuan == 1)
                Detail JSA
            @else
                @can('admin_kontraktor')
                    Edit JSA
                @endcan

                @can('hse-manager_kontraktor')
                    Verifikasi JSA
                @endcan
            @endif
        </h3>
        @if ($jsa->status_persetujuan == 1)
            <a target="_blank" href="{{ route('jsa.cetak', $jsa) }}" class="btn btn-sm btn-success"><i class="fas fa-print"> Cetak</i></a>
        @endif
    </div>
    <div class="card-body">
        <form autocomplete="off" action="{{ route('jsa.update', $jsa->id) }}" method="POST">
            @csrf @method('patch')
            <div class="form-group">
                <label class="form-control-label" for="nama_perusahaan">Nama Perusahaan</label>
                <input @can('hse-manager_kontraktor') readonly @endcan  @can('admin_kontraktor') @if($jsa->status_review == 1) readonly @endif @endcan class="form-control form-control-alternative @error('nama_perusahaan') is-invalid @enderror" type="text" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukkan Nama Perusahaan ..." value="{{ old('nama_perusahaan', $jsa->nama_perusahaan) }}">
                @error('nama_perusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="no_jsa">Nomor JSA</label>
                <input @can('hse-manager_kontraktor') readonly @endcan  @can('admin_kontraktor') @if($jsa->status_review == 1) readonly @endif @endcan class="form-control form-control-alternative @error('no_jsa') is-invalid @enderror" type="text" name="no_jsa" id="no_jsa" placeholder="Masukkan Nomor JSA ..." value="{{ old('no_jsa', $jsa->no_jsa) }}">
                @error('no_jsa')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="nama_pekerjaan">Nama Pekerjaan</label>
                <input @can('hse-manager_kontraktor') readonly @endcan  @can('admin_kontraktor') @if($jsa->status_review == 1) readonly @endif @endcan class="form-control form-control-alternative @error('nama_pekerjaan') is-invalid @enderror" type="text" name="nama_pekerjaan" id="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan ..." value="{{ old('nama_pekerjaan', $jsa->nama_pekerjaan) }}">
                @error('nama_pekerjaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="judul_pekerjaan">Judul Pekerjaan</label>
                <input @can('hse-manager_kontraktor') readonly @endcan  @can('admin_kontraktor') @if($jsa->status_review == 1) readonly @endif @endcan class="form-control form-control-alternative @error('judul_pekerjaan') is-invalid @enderror" type="text" name="judul_pekerjaan" id="judul_pekerjaan" placeholder="Masukkan Nama Pekerjaan ..." value="{{ old('judul_pekerjaan', $jsa->judul_pekerjaan) }}">
                @error('judul_pekerjaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="lokasi">Lokasi</label>
                <input @can('hse-manager_kontraktor') readonly @endcan  @can('admin_kontraktor') @if($jsa->status_review == 1) readonly @endif @endcan class="form-control form-control-alternative @error('lokasi') is-invalid @enderror" type="text" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi ..." value="{{ old('lokasi', $jsa->lokasi) }}">
                @error('lokasi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="nomor_kontrak">Nomor Kontrak</label>
                <input @can('hse-manager_kontraktor') readonly @endcan  @can('admin_kontraktor') @if($jsa->status_review == 1) readonly @endif @endcan class="form-control form-control-alternative @error('nomor_kontrak') is-invalid @enderror" type="text" name="nomor_kontrak" id="nomor_kontrak" placeholder="Masukkan Nomor Kontrak ..." value="{{ old('nomor_kontrak', $jsa->nomor_kontrak) }}">
                @error('nomor_kontrak')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-control-label" for="tanggal_kontrak">Tanggal Kontrak</label>
                <input @can('hse-manager_kontraktor') readonly @endcan  @can('admin_kontraktor') @if($jsa->status_review == 1) readonly @endif @endcan class="form-control form-control-alternative @error('tanggal_kontrak') is-invalid @enderror" type="date" name="tanggal_kontrak" id="tanggal_kontrak" placeholder="Masukkan Tanggal Kontrak ..." value="{{ old('tanggal_kontrak', $jsa->tanggal_kontrak) }}">
                @error('tanggal_kontrak')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @can('hse-manager_kontraktor')
                <div class="form-group">
                    <label class="form-control-label" for="satuan_kerja_pemberi_kerja">Satuan Kerja Pemberi Kerja</label>
                    <input @can('hse') readonly @endcan class="form-control form-control-alternative @error('satuan_kerja_pemberi_kerja') is-invalid @enderror" type="text" name="satuan_kerja_pemberi_kerja" id="satuan_kerja_pemberi_kerja" placeholder="Masukkan Satuan Kerja Pemberi Kerja ..." value="{{ old('satuan_kerja_pemberi_kerja', $jsa->satuan_kerja_pemberi_kerja) }}">
                    @error('satuan_kerja_pemberi_kerja')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="status_review">Status Review</label>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') disabled @endcan type="radio" name="status_review" id="status_review1" value="1" {{ old('status_review',$jsa->status_review) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_review1">
                            Setujui
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') disabled @endcan type="radio" name="status_review" id="status_review2" value="2" {{ old('status_review',$jsa->status_review) == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_review2">
                            Tidak Setujui
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') disabled @endcan type="radio" name="status_review" id="status_review3" value="0" {{ old('status_review',$jsa->status_review) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_review3">
                            Belum direview
                        </label>
                    </div>
                    @error('status_review')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="alasan_penolakan_review" class="form-group">
                    <label class="form-control-label">Alasan Penolakan Review</label>
                    <textarea class="form-control form-control-alternative @error('alasan_penolakan_review') is-invalid @enderror" type="text" name="alasan_penolakan_review" placeholder="Masukkan Alasan Penolakan Review ...">{{ old('alasan_penolakan_review', $jsa->alasan_penolakan_review) }}</textarea>
                    @error('alasan_penolakan_review')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endcan
            @can('hse')
                <div class="form-group">
                    <label class="form-control-label" for="satuan_kerja_penanggung_jawab">Satuan Kerja Penganggung Jawab</label>
                    <input class="form-control form-control-alternative @error('satuan_kerja_penanggung_jawab') is-invalid @enderror" type="text" name="satuan_kerja_penanggung_jawab" id="satuan_kerja_penanggung_jawab" placeholder="Masukkan Satuan Kerja Penganggung Jawab ..." value="{{ old('satuan_kerja_penanggung_jawab', $jsa->satuan_kerja_penanggung_jawab) }}">
                    @error('satuan_kerja_penanggung_jawab')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="status_persetujuan">Status Persetujuan</label>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') readonly @endcan type="radio" name="status_persetujuan" id="status_persetujuan1" value="1" {{ old('status_persetujuan',$jsa->status_persetujuan) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_persetujuan1">
                            Setujui
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') readonly @endcan type="radio" name="status_persetujuan" id="status_persetujuan2" value="2" {{ old('status_persetujuan',$jsa->status_persetujuan) == 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_persetujuan2">
                            Tidak Setujui
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') readonly @endcan type="radio" name="status_persetujuan" id="status_persetujuan3" value="0" {{ old('status_persetujuan',$jsa->status_persetujuan) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_persetujuan3">
                            Belum disetujui
                        </label>
                    </div>
                    @error('status_persetujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="perlu_ijin_kerja">Perlu Ijin Kerja</label>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') readonly @endcan type="radio" name="perlu_ijin_kerja" id="perlu_ijin_kerja1" value="1" {{ old('perlu_ijin_kerja',$jsa->perlu_ijin_kerja) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="perlu_ijin_kerja1">
                            Iya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" @can('hse') readonly @endcan type="radio" name="perlu_ijin_kerja" id="perlu_ijin_kerja2" value="0" {{ old('perlu_ijin_kerja',$jsa->perlu_ijin_kerja) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="perlu_ijin_kerja2">
                            Tidak
                        </label>
                    </div>
                    @error('perlu_ijin_kerja')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div id="alasan_penolakan_persetujuan" class="form-group">
                    <label class="form-control-label">Alasan Penolakan Persetujuan</label>
                    <textarea class="form-control form-control-alternative @error('alasan_penolakan_persetujuan') is-invalid @enderror" type="text" name="alasan_penolakan_persetujuan" placeholder="Masukkan Alasan Penolakan Persetujuan ...">{{ old('alasan_penolakan_persetujuan', $jsa->alasan_penolakan_persetujuan) }}</textarea>
                    @error('alasan_penolakan_persetujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endcan
            @can('admin_kontraktor')
                @if ($jsa->status_review != 1)
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                @endif
            @endcan
            @can('hse-manager_kontraktor')
                <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
            @endcan
        </form>
    </div>
</div>
<div id="langkah-langkah-kerja">
    <div class="card shadow h-100 mb-3">
        <div class="card-header bg-secondary border-0 d-flex justify-content-between">
            <h3 class="mb-0">Urutan Langkah Langkah Pekerjaan</h3>
            @can('admin_kontraktor')
                @if ($jsa->status_review != 1)
                    <a href="{{ route('langkahPekerjaan.create', $jsa) }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Tambah</i></a>
                @endif
            @endcan
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
                                    @can('admin_kontraktor')
                                        @if ($jsa->status_review != 1)
                                            <a href="{{ route('langkahPekerjaan.edit', $item->id) }}" class="btn btn-sm btn-success" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                            <a href="#modal-hapus" class="btn btn-sm btn-danger hapus" data-nama="{{ $item->urutan_langkah_langkah_pekerjaan }}" data-url="{{ route('langkahPekerjaan.destroy',$item->id) }}" data-toggle="modal"><i class="fas fa-trash" title="Hapus" data-toggle="tooltip"></i></a>
                                        @else
                                            <a href="{{ route('langkahPekerjaan.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                                        @endif
                                    @endcan
                                    @can('hse-manager_kontraktor')
                                        <a href="{{ route('langkahPekerjaan.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                                    @endcan
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
@if ($jsa->status_persetujuan == 1 && $jsa->perlu_ijin_kerja == 1)
<h3 id="ijin-kerja" class="mt-5 text-center">IJIN KERJA</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-6 mb-3 text-center">
            <div class="card shadow hover-up">
                <div class="card-body">
                    <a href="{{ route('ijin-kerja-panas.index', $jsa->id) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>Ijin Kerja Panas</h4>
                        <h5>({{ count($jsa->ijinKerjaPanas) }})</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3 text-center">
            <div class="card shadow hover-up">
                <div class="card-body">
                    <a href="{{ route('ijin-kerja-dingin.index', $jsa->id) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>Ijin Kerja Dingin</h4>
                        <h5>({{ count($jsa->ijinKerjaDingin) }})</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3 text-center">
            <div class="card shadow hover-up">
                <div class="card-body">
                    <a href="{{ route('ijin-kerja-di-ketinggian.index', $jsa->id) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>Ijin Kerja di Ketinggian</h4>
                        <h5>({{ count($jsa->ijinKerjaDiKetinggian) }})</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3 text-center">
            <div class="card shadow hover-up">
                <div class="card-body">
                    <a href="{{ route('ijin-kerja-ruang-terbatas.index', $jsa->id) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>Ijin Kerja Memasuki Ruangan Terbatas</h4>
                        <h5>({{ count($jsa->ijinKerjaRuangTerbatas) }})</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3 text-center">
            <div class="card shadow hover-up">
                <div class="card-body">
                    <a href="{{ route('ijin-kerja-listrik.index', $jsa->id) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>Ijin Kerja Listrik</h4>
                        <h5>({{ count($jsa->ijinKerjaListrik) }})</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3 text-center">
            <div class="card shadow hover-up">
                <div class="card-body">
                    <a href="{{ route('ijin-kerja-galian.index', $jsa->id) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>Ijin Kerja Galian</h4>
                        <h5>({{ count($jsa->ijinKerjaGalian) }})</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3 text-center">
            <div class="card shadow hover-up">
                <div class="card-body">
                    <a href="{{ route('ijin-kerja-radiografi.index', $jsa->id) }}">
                        <i class="fas fa-file-alt fa-5x mb-3"></i>
                        <h4>Ijin Kerja Radiografi</h4>
                        <h5>({{ count($jsa->ijinKerjaRadiografi) }})</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Hapus Ijin Kerja?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Perhatian!!</h4>
                    <p>Menghapus ijin kerja akan menghapus semua data yang dimilikinya</p>
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
            $('#form-hapus').attr('action', $(this).data('url'));
        });

        if ($("#status_review2").is(':checked')) {
            $("#alasan_penolakan_review").show();
        } else {
            $("#alasan_penolakan_review").hide();
        }

        if ($("#status_persetujuan2").is(':checked')) {
            $("#alasan_penolakan_persetujuan").show();
        } else {
            $("#alasan_penolakan_persetujuan").hide();
        }

        $("#status_review2").click(function (){
            $("#alasan_penolakan_review").show();
        });

        $("#status_review1").click(function (){
            $("#alasan_penolakan_review").hide();
        });

        $("#status_review3").click(function (){
            $("#alasan_penolakan_review").hide();
        });

        $("#status_persetujuan2").click(function (){
            $("#alasan_penolakan_persetujuan").show();
        });

        $("#status_persetujuan1").click(function (){
            $("#alasan_penolakan_persetujuan").hide();
        });

        $("#status_persetujuan3").click(function (){
            $("#alasan_penolakan_persetujuan").hide();
        });
    });
</script>
@endpush
