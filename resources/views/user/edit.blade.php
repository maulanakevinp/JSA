@extends('layouts.app')

@section('title')
Ubah Pengguna
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
@endsection

@section('content-header')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{ asset('/img/cover-bg-profil.jpg') }}); background-size: cover; background-position: center top;">

    <!-- Mask -->
    <span class="mask bg-gradient-primary opacity-6"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">

        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Hello {{ $pengguna->nama }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="{{ asset(Storage::url($pengguna->foto_profil)) }}" data-fancybox>
                            <img id="foto_profil" src="{{asset(Storage::url($pengguna->foto_profil))}}" alt="{{asset(Storage::url($pengguna->foto_profil))}}" class="rounded-circle" style="max-height: 150px; max-width: 200px">
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-md-4 pb-0 pb-md-4">
                <a id="btn-ganti-foto_profil" href="#input-foto_profil" class="btn btn-sm btn-default mt-5"><span class="fas fa-camera"></span> Ganti</a>
            </div>
            <div class="card-body pt-0 pt-md-4 pt-5">
                <div class="text-center">
                    <h3>
                        {{ $pengguna->nama }}
                    </h3>
                    <div class="h5 font-weight-300">
                        {{ $pengguna->peran->nama }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Ubah Pengguna</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.components.alert')
                <form action="{{ route('pengguna.update', $pengguna) }}" method="POST">
                    @csrf @method('patch')
                    <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="input-nama">Nama</label>
                            <input name="nama" type="text" id="input-nama" class="form-control form-control-alternative @error('nama') is-invalid @enderror" placeholder="Masukkan nama ..." value="{{ old('nama',$pengguna->nama) }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="input-peran">Peran</label>
                            <select name="peran" id="input-peran" class="form-control form-control-alternative @error('peran') is-invalid @enderror">
                                <option value="" disabled>Silahkan Pilih Peran</option>
                                @foreach ($peran as $item)
                                    <option value="{{ $item->id }}" {{ old('peran', $pengguna->peran_id) == $item->id ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('peran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<input type="file" name="foto_profil" id="input-foto_profil" style="display: none">
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>

<script>
    $(document).ready(function(){
        $('#btn-ganti-foto_profil').on('click', function () {
            $('#input-foto_profil').click();
        });

        $('#input-foto_profil').on('change', function () {
            if (this.files && this.files[0]) {
                let formData = new FormData();
                let oFReader = new FileReader();
                formData.append("foto_profil", this.files[0]);
                formData.append("_method", "patch");
                formData.append("_token", "{{ csrf_token() }}");
                oFReader.readAsDataURL(this.files[0]);

                $.ajax({
                    url: "{{ route('update-profil', $pengguna->id) }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#img-foto_profil').attr('src', "{{ url('/storage/loading.gif') }}");
                    },
                    success: function (data) {
                        if (data.error) {
                            $('#img-foto_profil').attr('src', $("#img-foto_profil").attr('alt'));
                            $('.notifikasi').html(`
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <span class="alert-icon"><i class="fas fa-times-circle"></i> <strong>Gagal</strong></span>
                                    <span class="alert-text">
                                        <ul id="pesanError">
                                        </ul>
                                    </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            `);
                            $.each(data.message, function (i, e) {
                                $('#pesanError').append(`<li>`+e+`</li>`);
                            });
                            setTimeout(() => {
                                $(".notifikasi").html('');
                            }, 7000);
                        } else {
                            $('.notifikasi').html(`
                                <div class="alert alert-success alert-dismissible fade show">
                                    <span class="alert-icon"><i class="fas fa-check-circle"></i> <strong>Berhasil</strong></span>
                                    <span class="alert-text">
                                        Foto Profil berhasil diperbarui
                                    </span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            `);

                            setTimeout(() => {
                                $(".notifikasi").html('');
                                location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        });
    });
</script>
@endpush
