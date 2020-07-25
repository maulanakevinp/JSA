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

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
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
        @if (!$jsa->ijinKerjaPanas)
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
            <a href="{{ route('jsa.show', $jsa) }}" class="btn btn-sm btn-success"><i class="fas fa-print"> Cetak</i></a>
        @endif
    </div>
    <div class="card-body">
        <form autocomplete="off" action="{{ route('jsa.update', $jsa->id) }}" method="POST">
            @csrf @method('patch')
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
<div id="formPekerjaan">
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
                                            <a href="#modal-hapus" class="btn btn-sm btn-danger hapus" data-nama="{{ $item->urutan_langkah_langkah_pekerjaan }}" data-id="{{ $item->id }}" data-toggle="modal"><i class="fas fa-trash" title="Hapus" data-toggle="tooltip"></i></a>
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
@if ($jsa->status_persetujuan == 1)
    <div class="card shadow h-100 mb-3">
        <div class="card-header bg-secondary border-0 d-flex justify-content-between">
            <h3 class="mb-0">Ijin Kerja</h3>
            @can('hse')
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opsi
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        @if (!$jsa->ijinKerjaPanas)
                            <a href="{{ route('ijinKerjaPanas.create', $jsa) }}" class="dropdown-item">Buat Ijin Kerja Panas</a>
                        @endif
                    </div>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Jenis Ijin Kerja</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($jsa->ijinKerjaPanas)
                            <tr>
                                <td>
                                    Ijin Kerja Panas
                                </td>
                                <td>
                                    <a href="{{ route('ijinKerjaPanas.show', $jsa->ijinKerjaPanas->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('ijinKerjaPanas.cetak', $jsa->ijinKerjaPanas->id) }}" class="btn btn-neutral btn-sm" data-toggle="tooltip" title="Cetak"><i class="fas fa-print"></i></a>
                                    @can('hse')
                                        <a href="{{ route('ijinKerjaPanas.edit', $jsa->ijinKerjaPanas->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="#modal-hapus" class="btn btn-sm btn-danger hapus" data-nama="Ijin Kerja Panas" data-url="{{ route('ijinKerjaPanas.destroy', $jsa->ijinKerjaPanas->id) }}" data-toggle="modal"><i class="fas fa-fw fa-trash" title="Hapus" data-toggle="tooltip"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @else
                            <tr>
                                @can('hse')
                                    <td colspan="3" align="center">Harap Membuatkan Ijin Kerja</td>
                                @endcan
                                @can('kontraktor')
                                    <td colspan="3" align="center">Data Tidak Tersedia</td>
                                @endcan
                            </tr>
                        @endif
                    </tbody>
                </table>
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
