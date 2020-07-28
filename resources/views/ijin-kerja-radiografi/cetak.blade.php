@extends('layouts.cetak')
@section('title','Ijin Kerja Radiografi ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bekgron {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: slateblue !important;
    }
}
</style>
@endsection

@section('content')
<div class="container text-center">
    <img class="mt-5 mb-5" src="{{ url('storage/logo.png') }}" alt="">
    <h1 class="font-weight-bolder mb-5" style="font-family: Arial, Helvetica, sans-serif">INSTRUKSI KERJA</h1>
    <h1 class="font-weight-bolder mb-5" style="font-size: 36pt; font-family: Arial, Helvetica, sans-serif">IZIN KERJA RADIOGRAFI</h1>
    <h1 class="mb-5" style="font-family: Arial, Helvetica, sans-serif">I-005/0.38</h1>
    <h2 style="margin-top: 700px; font-family: Arial, Helvetica, sans-serif"><span class="font-weight-bolder" >PT PERUSAHAAN GAS NEGARA</span> (Persero) <span class="font-weight-bolder" >Tbk</span></h2>
    <h2 class="" style="font-family: Arial, Helvetica, sans-serif">Jakarta, {{ date('Y') }}</h2>
</div>
<div class="page-break"></div>
<div class="container-fluid">
    <div class="row mb-5 border border-dark">
        <div class="col-1 text-center border border-dark">
            <img class="mw-100" src="{{ url('storage/logo.png') }}" alt="">
        </div>
        <div class="col-10 border border-dark bekgron text-center">
            <h5 class="font-weight-bolder text-white">IZIN KERJA RADIOGRAFI (<span class="font-italic">RADIOGRAPHIC WORK PERMIT</span>)</h5>
            <h6 class="font-weight-bolder text-white">PT PERUSAHAAN GAS NEGARA (Persero) Tbk</h6>
            <h6 class="font-weight-bolder text-white">PMO INFRASTRUCTURE</h6>
            <h6 class="font-weight-bolder text-white">INTEGRATED TEAM JABATI</h6>
        </div>
        <div class="col-1 border border-dark"></div>
        <div class="col-12 border border-dark text-center py-2" style="font-size: 9pt">NO. {{ $ijinKerja->umum->nomor }}/I-005/Wilayah {{ $ijinKerja->umum->lokasi_pekerjaan }}/{{ date('Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</div>
        <div class="col-12 bekgron">
            <div class="row" style="font-size: 7pt">
                <div class="col-6 px-2 pt-2">
                    <div class="px-1 border border-dark bg-white mb-2">
                        @include('bagian-isi-kerja.umum.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">B. ALAT PELINDUNG DIRI</span>
                        @include('bagian-isi-kerja.alat-pelindung-diri.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">C. DESKRIPSI PEKERJA RADIOGRAFI</span>
                        <div class="px-3">
                            <table class="table">
                                <tr class="border">
                                    <td class="p-0" width="100px">Nama Perusahaan</td>
                                    <td class="p-0" width="10px">:</td>
                                    <td class="p-0" colspan="5">{{ $ijinKerja->nama_perusahaan }}</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-0" width="100px">Nomor Lisensi</td>
                                    <td class="p-0" width="10px">:</td>
                                    <td class="p-0" colspan="5">{{ $ijinKerja->no_lisensi }}</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-0" width="100px">Sumber Radioaktif</td>
                                    <td class="p-0" width="10px">:</td>
                                    <td class="p-0" colspan="5">{{ $ijinKerja->sumber_radioaktif }}</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-0" width="100px">Proyektor</td>
                                    <td class="p-0" width="10px">:</td>
                                    <td class="p-0" colspan="5">{{ $ijinKerja->proyektor }}</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-0" width="100px">Survey Meter</td>
                                    <td class="p-0" width="10px">:</td>
                                    <td class="p-0" colspan="5">{{ $ijinKerja->survey_meter }}</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-0" width="100px">Tanggal Service</td>
                                    <td class="p-0" width="10px">:</td>
                                    <td class="p-0" colspan="5">{{ date('d/m/Y', strtotime($ijinKerja->tanggal_service)) }}</td>
                                </tr>
                                <tr class="border">
                                    <td class="p-0" width="100px">Tanggal Kalibrasi</td>
                                    <td class="p-0" width="10px">:</td>
                                    <td class="p-0" colspan="5">{{ date('d/m/Y', strtotime($ijinKerja->tanggal_kalibrasi)) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">D. DOKUMEN PENDUKUNG</span>
                        @include('bagian-isi-kerja.dokumen-pendukung.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">CATATAN</span>
                        <p>{{ $ijinKerja->catatan ? $ijinKerja->catatan : "Tidak Ada Catatan" }}</p>
                    </div>
                </div>
                <div class="col-6 px-2 pt-2">
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">E. SAFETY CHECKLIST</span>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center p-0">Item</th>
                                    <th class="text-center p-0" width="60px">Status</th>
                                    <th class="text-center p-0" width="80px">Ket.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">a.</td>
                                    <td class="p-0">Peralatan dapat dioperasikan jarak jauh</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->peralatan_dapat_dioperasikan_jarak_jauh == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_peralatan_dapat_dioperasikan_jarak_jauh }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">b.</td>
                                    <td class="p-0">Petugas pemadam kebakaran siap sedia</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->petugas_pemadam_kebakaran_siap_sedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_petugas_pemadam_kebakaran_siap_sedia }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">c.</td>
                                    <td class="p-0">Penghalang dan tanda bahaya radiasi siap tersedia</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->penghalang_dan_tanda_bahaya_radiasi_siap_tersedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">d.</td>
                                    <td class="p-0">Daerah bebas dari orang tidak berkepentingan</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->daerah_bebas_dari_orang_tidak_berkepentingan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_daerah_bebas_dari_orang_tidak_berkepentingan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">e.</td>
                                    <td class="p-0">Hubungan radio hanya dengan ccr</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->hubungan_radio_hanya_dengan_ccr == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_hubungan_radio_hanya_dengan_ccr }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">f.</td>
                                    <td class="p-0">f. Semua peralatan las telah diamankan</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->semua_peralatan_las_telah_diamankan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_semua_peralatan_las_telah_diamankan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">g.</td>
                                    <td class="p-0">Pembacaan hasil pengukuran pada pagar penghalang tidak boleh dari 0.75 mR/jam diudara</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->pembacaan_hasil_pengukuran_pada_pagar_penghalang == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">h.</td>
                                    <td class="p-0">Alat pemadam api siap sedia</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->alat_pemadam_api_siap_sedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_alat_pemadam_api_siap_sedia }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">i.</td>
                                    <td class="p-0">Perlu dengan ijin kerja yang lain</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">j.</td>
                                    <td class="p-0">Semua pekerjaan telah lengkap alat pelindung diri</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->semua_pekerjaan_telah_lengkap_alat_pelindung_diri == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">F. PENGESAHAN</span>
                        @include('bagian-isi-kerja.pengesahan.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">VALIDASI</span>
                        @include('bagian-isi-kerja.validasi.cetak')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
