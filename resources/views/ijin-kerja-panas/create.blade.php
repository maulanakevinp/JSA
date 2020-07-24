@extends('layouts.app')

@section('title', 'Buat Ijin Kerja Panas')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="mb-0">Buat Ijin Kerja Panas</h2>
                                <p class="mb-0 text-sm">Kelola Ijin Kerja {{ config('app.name') }}</p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('jsa.edit', $jsa) }}" class="btn btn-primary" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Buat Ijin Kerja Panas</h3>
            </div>
            <div class="card-body">
                <form class="formPekerjaanUpdate" autocomplete="off" action="{{ route('ijinKerjaPanas.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jsa_id" value="{{ $jsa->id }}">
                    <h6 class="heading-small text-muted">A. UMUM</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nomor">Nomor</label>
                            <input class="form-control form-control-alternative @error('nomor') is-invalid @enderror" type="text" name="nomor" id="nomor" placeholder="Masukkan Nomor ..." value="{{ old('nomor') }}">
                            @error('nomor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="tanggal_pengesahan">Tanggal Pengesahan</label>
                            <input class="form-control form-control-alternative @error('tanggal_pengesahan') is-invalid @enderror" type="date" name="tanggal_pengesahan" id="tanggal_pengesahan" placeholder="Masukkan Tanggal Pengesahan ..." value="{{ old('tanggal_pengesahan') }}">
                            @error('tanggal_pengesahan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <p class="mb-0 heading-small text-muted">Masa Berlaku</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="tanggal_mulai">Tanggal Mulai</label>
                                <input class="form-control form-control-alternative @error('tanggal_mulai') is-invalid @enderror" type="datetime-local" name="tanggal_mulai" id="tanggal_mulai" placeholder="Masukkan Tanggal Mulai ..." value="{{ old('tanggal_mulai') }}">
                                @error('tanggal_mulai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="tanggal_selesai">Tanggal Selesai</label>
                                <input class="form-control form-control-alternative @error('tanggal_selesai') is-invalid @enderror" type="datetime-local" name="tanggal_selesai" id="tanggal_selesai" placeholder="Masukkan Tanggal Selesai ..." value="{{ old('tanggal_selesai') }}">
                                @error('tanggal_selesai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
                            <input class="form-control form-control-alternative @error('lokasi_pekerjaan') is-invalid @enderror" type="text" name="lokasi_pekerjaan" id="lokasi_pekerjaan" placeholder="Masukkan Lokasi Pekerjaan ..." value="{{ old('lokasi_pekerjaan') }}">
                            @error('lokasi_pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="uraian_pekerjaan">Uraian pekerjaan</label>
                            <input class="form-control form-control-alternative @error('uraian_pekerjaan') is-invalid @enderror" type="text" name="uraian_pekerjaan" id="uraian_pekerjaan" placeholder="Masukkan Uraian pekerjaan ..." value="{{ old('uraian_pekerjaan') }}">
                            @error('uraian_pekerjaan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h6 class="heading-small text-muted">B. JENIS PEKERJAAN</h6>
                    <div class="pl-lg-4 row">
                        <div class="col-md-6 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="menimbulkan_api" name="menimbulkan_api" value="1" {{ old('menimbulkan_api') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="menimbulkan_api">Menimbulkan Api</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="menimbulkan_bunga_api" name="menimbulkan_bunga_api" value="1" {{ old('menimbulkan_bunga_api') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="menimbulkan_bunga_api">Menimbulkan Bunga Api</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="mesin_gerinda/alat_potong" name="mesin_gerinda/alat_potong" value="1" {{ old('mesin_gerinda/alat_potong') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="mesin_gerinda/alat_potong">Mesin Gerinda/Alat Potong</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="hot_tapping" name="hot_tapping" value="1" {{ old('hot_tapping') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="hot_tapping">Hot Tapping</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="menyalakan_flare" name="menyalakan_flare" value="1" {{ old('menyalakan_flare') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="menyalakan_flare">Menyalakan Flare</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="lainnya_jenis_pekerjaan" name="lainnya_jenis_pekerjaan" value="1" {{ old('lainnya_jenis_pekerjaan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="lainnya_jenis_pekerjaan">Lainnya</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="heading-small text-muted">C. SUMBER BAHAYA ALAT/KEGIATAN</h6>
                    <div class="pl-lg-4 row">
                        <div class="col-md-3 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="alat_listrik" name="alat_listrik" value="1" {{ old('alat_listrik') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="alat_listrik">Alat Listrik</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="moving_part" name="moving_part" value="1" {{ old('moving_part') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="moving_part">Moving Part</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="crane" name="crane" value="1" {{ old('crane') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="crane">Crane</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="generator/compressor" name="generator/compressor" value="1" {{ old('generator/compressor') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="generator/compressor">Generator/Compressor</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="akses_sulit" name="akses_sulit" value="1" {{ old('akses_sulit') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="akses_sulit">Akses Sulit</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gas" name="gas" value="1" {{ old('gas') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="gas">Gas</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bahan_kimia" name="bahan_kimia" value="1" {{ old('bahan_kimia') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bahan_kimia">Bahan Kimia</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bising" name="bising" value="1" {{ old('bising') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bising">Bising</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kejatuhan" name="kejatuhan" value="1" {{ old('kejatuhan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kejatuhan">Kejatuhan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="media_panas/dingin" name="media_panas/dingin" value="1" {{ old('media_panas/dingin') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="media_panas/dingin">Media Panas/Dingin</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ergonomi" name="ergonomi" value="1" {{ old('ergonomi') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="ergonomi">Ergonomi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bertekanan" name="bertekanan" value="1" {{ old('bertekanan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bertekanan">Bertekanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="mudah_terbakar" name="mudah_terbakar" value="1" {{ old('mudah_terbakar') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="mudah_terbakar">Mudah Terbakar</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="biologi" name="biologi" value="1" {{ old('biologi') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="biologi">Biologi</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="blasting" name="blasting" value="1" {{ old('blasting') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="blasting">Blasting</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="penggalan" name="penggalan" value="1" {{ old('penggalan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="penggalan">Penggalan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bising" name="bising" value="1" {{ old('bising') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bising">Bising</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="kejatuhan" name="kejatuhan" value="1" {{ old('kejatuhan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="kejatuhan">Kejatuhan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="grinding" name="grinding" value="1" {{ old('grinding') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="grinding">Grinding</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cuaca_buruk" name="cuaca_buruk" value="1" {{ old('cuaca_buruk') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="cuaca_buruk">Cuaca Buruk</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="materi_berbahaya" name="materi_berbahaya" value="1" {{ old('materi_berbahaya') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="materi_berbahaya">Materi Berbahaya</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Pilling" name="Pilling" value="1" {{ old('Pilling') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="Pilling">Bising</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="paparan_panas_matahari" name="paparan_panas_matahari" value="1" {{ old('paparan_panas_matahari') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="paparan_panas_matahari">Paparan Panas Matahari</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="pigging" name="pigging" value="1" {{ old('pigging') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="pigging">Pigging</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="lifting" name="lifting" value="1" {{ old('lifting') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="lifting">Lifting</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="drilling" name="drilling" value="1" {{ old('drilling') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="drilling">Drilling</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="blowdown" name="blowdown" value="1" {{ old('blowdown') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="blowdown">Blowdown</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="uji_bertekanan" name="uji_bertekanan" value="1" {{ old('uji_bertekanan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="uji_bertekanan">Uji Bertekanan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="junction_box_opening" name="junction_box_opening" value="1" {{ old('junction_box_opening') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="junction_box_opening">Junction Box Opening</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="hot_cutting" name="hot_cutting" value="1" {{ old('hot_cutting') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="hot_cutting">Hot Cutting</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="bongkar_muat" name="bongkar_muat" value="1" {{ old('bongkar_muat') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="bongkar_muat">Bongkar Muat</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="power_brushing" name="power_brushing" value="1" {{ old('power_brushing') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="power_brushing">Power Brushing</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="interlock_bypass" name="interlock_bypass" value="1" {{ old('interlock_bypass') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="interlock_bypass">Interlock Bypass</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="lainnya" name="lainnya" value="1" {{ old('lainnya') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="lainnya">Lainnya</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="heading-small text-muted">D. ALAT PELINDUNG DIRI</h6>
                    <div class="pl-lg-4 row">
                        <div class="col-md-3 mb-3">
                            <p class="mb-0 heading-small font-weight-bold">Kepala/Wajah</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="safety_helmet" name="safety_helmet" value="1" {{ old('safety_helmet') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="safety_helmet">Safety Helmet</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Safety Glass" name="Safety Glass" value="1" {{ old('Safety Glass') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="Safety Glass">Safety Glass</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="goggle" name="goggle" value="1" {{ old('goggle') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="goggle">Goggle</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="face_shield" name="face_shield" value="1" {{ old('face_shield') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="face_shield">Face Shield</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="others_kepala" name="others_kepala" value="1" {{ old('others_kepala') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="others_kepala">Others</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="mb-0 heading-small font-weight-bold">Telinga</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ear_plug" name="ear_plug" value="1" {{ old('ear_plug') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="ear_plug">Ear Plug</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ear_muff" name="ear_muff" value="1" {{ old('ear_muff') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="ear_muff">Ear Muff</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="others_telinga" name="others_telinga" value="1" {{ old('others_telinga') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="others_telinga">Others</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="mb-0 heading-small font-weight-bold">Kaki</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="safety_shoes/boot" name="safety_shoes/boot" value="1" {{ old('safety_shoef/boot') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="safety_shoes/boot">Safety Shoes/Boot</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="safety_rain_boot" name="safety_rain_boot" value="1" {{ old('safety_rain_boot') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="safety_rain_boot">Safety Rain Boot</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="electrical_shoes/boot" name="electrical_shoes/boot" value="1" {{ old('electrical_shoes/boot') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="electrical_shoes/boot">Electrical Shoes/Boot</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="others_kaki" name="others_kaki" value="1" {{ old('others_kaki') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="others_kaki">Others</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="mb-0 heading-small font-weight-bold">Ketinggian</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="full_body_harness" name="full_body_harness" value="1" {{ old('full_body_harness') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="full_body_harness">Full Body Harness</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="safety_line" name="safety_line" value="1" {{ old('safety_line') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="safety_line">Safety Line</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="others_ketinggian" name="others_ketinggian" value="1" {{ old('others_ketinggian') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="others_ketinggian">Others</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="mb-0 heading-small font-weight-bold">Pernapasan</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="half_mask_respirator" name="half_mask_respirator" value="1" {{ old('half_mask_respirator') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="half_mask_respirator">Half Mask Respirator</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="full_face_respirator" name="full_face_respirator" value="1" {{ old('full_face_respirator') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="full_face_respirator">Full Face Respirator</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="dust_mask" name="dust_mask" value="1" {{ old('dust_mask') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="dust_mask">Dust Mask</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="scba/airline_set" name="scba/airline_set" value="1" {{ old('scba/airline_set') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="scba/airline_set">SCBA/Airline Set</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="others_pernapasan" name="others_pernapasan" value="1" {{ old('others_pernapasan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="others_pernapasan">Others</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="mb-0 heading-small font-weight-bold">Tangan</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cotton_glove" name="cotton_glove" value="1" {{ old('cotton_glove') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="cotton_glove">Cotton Glove</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="leather_glove" name="leather_glove" value="1" {{ old('leather_glove') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="leather_glove">Leather Glove</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rubber_glove" name="rubber_glove" value="1" {{ old('rubber_glove') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="rubber_glove">cRubber Glove</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chemical_glove" name="chemical_glove" value="1" {{ old('chemical_glove') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="chemical_glove">Chemical Glove</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="others_tangan" name="others_tangan" value="1" {{ old('others_tangan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="others_tangan">Others</label>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <p class="mb-0 heading-small font-weight-bold">Badan</p>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="coverall" name="coverall" value="1" {{ old('coverall') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="coverall">Coverall</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chemical_suit" name="chemical_suit" value="1" {{ old('chemical_suit') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="chemical_suit">Chemical Suit</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="apron" name="apron" value="1" {{ old('apron') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="apron">Apron</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="life_vest" name="life_vest" value="1" {{ old('life_vest') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="life_vest">Life Vest</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="others_badan" name="others_badan" value="1" {{ old('others_badan') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="others_badan">Others</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6 class="heading-small text-muted">E. DOKUMEN PENDUKUNG</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <input class="form-control form-control-alternative @error('a') is-invalid @enderror" type="text" name="a" id="a" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('a') }}">
                            @error('a')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-alternative @error('b') is-invalid @enderror" type="text" name="b" id="b" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('b') }}">
                            @error('b')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-alternative @error('c') is-invalid @enderror" type="text" name="c" id="c" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('c') }}">
                            @error('c')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-alternative @error('d') is-invalid @enderror" type="text" name="d" id="d" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('d') }}">
                            @error('d')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-alternative @error('e') is-invalid @enderror" type="text" name="e" id="e" placeholder="Masukkan Dokumen Pendukung ..." value="{{ old('e') }}">
                            @error('e')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h6 class="heading-small text-muted">F. SAFETY CHECKLIST</h6>
                    <div class="pl-lg-4">
                        <p class="mb-0 text-sm font-weight-bold">a. Jalur tersebut sesungguhnya telah :</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Dibebaskan dari tekanan</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_dibebaskan_dari_tekanan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_dibebaskan_dari_tekanan') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_dibebaskan_dari_tekanan" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_dibebaskan_dari_tekanan') }}">
                                    @error('keterangan_jalur_dibebaskan_dari_tekanan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Dikosongkan atau drain</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_dikosongkan_atau_drain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_dikosongkan_atau_drain') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_dikosongkan_atau_drain" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_dikosongkan_atau_drain') }}">
                                    @error('keterangan_jalur_dikosongkan_atau_drain')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <p class="mb-0 font-weight-bold text-sm">3. Diisolasi dengan :</p>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Blanking</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_blanking" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_diisolasi_dengan_blanking') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_blanking" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_diisolasi_dengan_blanking') }}">
                                        @error('keterangan_jalur_diisolasi_dengan_blanking')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Dilepas</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_dilepas" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_diisolasi_dengan_dilepas') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_dilepas" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_diisolasi_dengan_dilepas') }}">
                                        @error('keterangan_jalur_diisolasi_dengan_dilepas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Keterangan dikunci</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_keterangan_dikunci" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_diisolasi_dengan_keterangan_dikunci') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_keterangan_dikunci" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_diisolasi_dengan_keterangan_dikunci') }}">
                                        @error('keterangan_jalur_diisolasi_dengan_keterangan_dikunci')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Diberi label</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="jalur_diisolasi_dengan_keterangan_diberi_label" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_diisolasi_dengan_keterangan_diberi_label') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" name="keterangan_jalur_diisolasi_dengan_keterangan_diberi_label" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_diisolasi_dengan_keterangan_diberi_label') }}">
                                        @error('keterangan_jalur_diisolasi_dengan_keterangan_diberi_label')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">4. Didorong atau flush dengan air</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_didorong_atau_flush_dengan_air" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_didorong_atau_flush_dengan_air') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_didorong_atau_flush_dengan_air" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_didorong_atau_flush_dengan_air') }}">
                                    @error('keterangan_jalur_didorong_atau_flush_dengan_air')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">5. Steaming out or Purging</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_steaming_out_or_purging" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_steaming_out_or_purging') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_steaming_out_or_purging" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_steaming_out_or_purging') }}">
                                    @error('keterangan_jalur_steaming_out_or_purging')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">6. Dinginkan secara alamiah atau mekanis</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="jalur_dinginkan_secara_alamiah_atau_mekanis" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('jalur_dinginkan_secara_alamiah_atau_mekanis') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis') }}">
                                    @error('keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">b. Semua saluran, drain dan kerangan pada jarak 15 m, dan tempat pekerjaan telah ditutup</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_saluran_drain_dan_kerangan_pada_jarak_15m" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('semua_saluran_drain_dan_kerangan_pada_jarak_15m') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m') }}">
                                @error('keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">c. Bahan mudah terbakar diamankan</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="bahan_mudah_terbakar_diamankan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('bahan_mudah_terbakar_diamankan') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_bahan_mudah_terbakar_diamankan" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_bahan_mudah_terbakar_diamankan') }}">
                                @error('keterangan_bahan_mudah_terbakar_diamankan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">d. Alat pemadam kebakaran siap sedia</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="alat_pemadam_kebakaran_siap_sedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('alat_pemadam_kebakaran_siap_sedia') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_alat_pemadam_kebakaran_siap_sedia" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_alat_pemadam_kebakaran_siap_sedia') }}">
                                @error('keterangan_alat_pemadam_kebakaran_siap_sedia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">e. Petugas pemadam kebakaran siap sedia</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="petugas_pemadam_kebakaran_siap_sedia" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('petugas_pemadam_kebakaran_siap_sedia') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_petugas_pemadam_kebakaran_siap_sedia" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_petugas_pemadam_kebakaran_siap_sedia') }}">
                                @error('keterangan_petugas_pemadam_kebakaran_siap_sedia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">f. Semua peralatan las telah diamankan</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_peralatan_las_telah_diamankan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('semua_peralatan_las_telah_diamankan') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_peralatan_las_telah_diamankan" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_semua_peralatan_las_telah_diamankan') }}">
                                @error('keterangan_semua_peralatan_las_telah_diamankan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">g. Pekerjaan harus terus dibasahi dengan air</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="pekerjaan_harus_terus_dibasahi_dengan_air" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('pekerjaan_harus_terus_dibasahi_dengan_air') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_pekerjaan_harus_terus_dibasahi_dengan_air" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_pekerjaan_harus_terus_dibasahi_dengan_air') }}">
                                @error('keterangan_pekerjaan_harus_terus_dibasahi_dengan_air')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">h. Perlu dengan ijin kerja yang lain</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="perlu_dengan_ijin_kerja_yang_lain" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('perlu_dengan_ijin_kerja_yang_lain') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_perlu_dengan_ijin_kerja_yang_lain" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_perlu_dengan_ijin_kerja_yang_lain') }}">
                                @error('keterangan_perlu_dengan_ijin_kerja_yang_lain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">i. Semua mesin : diesel, kompresor dll, telah diamankan</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_mesin_telah_diamankan" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('semua_mesin_telah_diamankan') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_mesin_telah_diamankan" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_semua_mesin_telah_diamankan') }}">
                                @error('keterangan_semua_mesin_telah_diamankan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">j. Semua pekerjaan telah disetujui untuk penggalian</label>
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="semua_pekerjaan_telah_disetujui_untuk_penggalian" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('semua_pekerjaan_telah_disetujui_untuk_penggalian') ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian') }}">
                                @error('keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <p class="mb-0 text-sm font-weight-bold">k. Semua penggerak utama peralatan listrik telah :</p>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">1. Diisolasi dan diberi label</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('semua_peralatan_listrik_telah_diisolasi') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_semua_peralatan_listrik_telah_diisolasi" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_semua_peralatan_listrik_telah_diisolasi') }}">
                                    @error('keterangan_semua_peralatan_listrik_telah_diisolasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">2. Perlu pemeriksaan ulang</label>
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" name="semua_peralatan_listrik_telah_diisolasi" value="1" data-toggle="tooltip" title="Centang untuk status (YA)" {{ old('semua_peralatan_listrik_telah_diisolasi') ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="keterangan_semua_peralatan_listrik_telah_diisolasi" placeholder="Masukkan Keterangan ..." value="{{ old('keterangan_semua_peralatan_listrik_telah_diisolasi') }}">
                                    @error('keterangan_semua_peralatan_listrik_telah_diisolasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="mb-0 heading-small font-weight-bold">G. Uji Kandungan GAS</p>
                    <div class="pl-lg-4 row">
                        <div class="col-md-4 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="o2" name="o2" value="1" {{ old('o2') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="o2">O2</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="toxic" name="toxic" value="1" {{ old('toxic') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="toxic">Toxic</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="combustible" name="combustible" value="1" {{ old('combustible') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="combustible">Goggle</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sebelum_pelaksanaan_pekerjaan1" name="sebelum_pelaksanaan_pekerjaan1" value="1" {{ old('sebelum_pelaksanaan_pekerjaan1') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sebelum_pelaksanaan_pekerjaan1">Sebelum pelaksanaan pekerjaan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sebelum_pelaksanaan_pekerjaan2" name="sebelum_pelaksanaan_pekerjaan2" value="1" {{ old('sebelum_pelaksanaan_pekerjaan2') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sebelum_pelaksanaan_pekerjaan2">Sebelum pelaksanaan pekerjaan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="sebelum_pelaksanaan_pekerjaan3" name="sebelum_pelaksanaan_pekerjaan3" value="1" {{ old('sebelum_pelaksanaan_pekerjaan3') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="sebelum_pelaksanaan_pekerjaan3">Sebelum pelaksanaan pekerjaan</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block">SIMPAN</button>
                </form>
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
</script>
@endpush
