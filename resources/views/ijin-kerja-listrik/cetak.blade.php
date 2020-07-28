@extends('layouts.cetak')
@section('title','Ijin Kerja Listrik ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bekgron {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: cornflowerblue !important;
    }
}
</style>
@endsection

@section('content')
<div class="container text-center">
    <img class="mt-5 mb-5" src="{{ url('storage/logo.png') }}" alt="">
    <h1 class="font-weight-bolder mb-5" style="font-family: Arial, Helvetica, sans-serif">INSTRUKSI KERJA</h1>
    <h1 class="font-weight-bolder mb-5" style="font-size: 36pt; font-family: Arial, Helvetica, sans-serif">IZIN KERJA LISTRIK</h1>
    <h1 class="mb-5" style="font-family: Arial, Helvetica, sans-serif">I-006/0.38</h1>
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
            <h5 class="font-weight-bolder text-white">IZIN KERJA LISTRIK (<span class="font-italic">ELECTRICAL WORK PERMIT</span>)</h5>
            <h6 class="font-weight-bolder text-white">PT PERUSAHAAN GAS NEGARA (Persero) Tbk</h6>
            <h6 class="font-weight-bolder text-white">PMO INFRASTRUCTURE</h6>
            <h6 class="font-weight-bolder text-white">INTEGRATED TEAM JABATI</h6>
        </div>
        <div class="col-1 border border-dark"></div>
        <div class="col-12 border border-dark text-center py-2" style="font-size: 9pt">NO. {{ $ijinKerja->umum->nomor }}/I-006/Wilayah {{ $ijinKerja->umum->lokasi_pekerjaan }}/{{ date('Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</div>
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
                        <span class="font-weight-bolder">C. SAFETY CHECKLIST</span>
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
                                    <td class="p-0 text-center" width="20px" rowspan="7">a.</td>
                                    <td class="p-0">Jalur tersebut sesungguhnya telah :</td>
                                    <td class="p-0 text-center"> </td>
                                    <td class="p-0"> </td>
                                </tr>
                                <tr>
                                    <td class="p-0">1. Dibebaskan dari aliran listrik</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_telah_dibebaskan_dari_aliran_listrik == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_telah_dibebaskan_dari_aliran_listrik }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">2. Peralatan yang terkait telah aman</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_peralatan_yang_terkait_telah_aman == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_peralatan_yang_terkait_telah_aman }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">3. Pemasangan kabel</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_telah_pemasangan_kabel == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_telah_pemasangan_kabel }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">4. Peralatan dalam keadaan bergerak</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_telah_peralatan_dalam_keadaan_bergerak == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">5. Diisolasi dari sumber listrik</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_telah_diisolasi_dari_sumber_listrik == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_telah_diisolasi_dari_sumber_listrik }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">6. Peralatan dalam keadaan panas</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_telah_peralatan_dalam_keadaan_panas == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_telah_peralatan_dalam_keadaan_panas }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">b.</td>
                                    <td class="p-0">Tersedia jalan masuk dan keluar yang layak</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->tersedia_jalan_masuk_dan_keluar_yang_layak == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">c.</td>
                                    <td class="p-0">Bahan mudah terbakar diamankan</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->bahan_mudah_terbakar_diamankan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_bahan_mudah_terbakar_diamankan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">d.</td>
                                    <td class="p-0">Alat pemadam kebaaran siap sedia</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->alat_pemadam_kebaaran_siap_sedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_alat_pemadam_kebaaran_siap_sedia }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">e.</td>
                                    <td class="p-0">Petugas pemadam kebakaran siap sedia</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->petugas_pemadam_kebakaran_siap_sedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_petugas_pemadam_kebakaran_siap_sedia }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">f.</td>
                                    <td class="p-0">Pekerjaan pada ketinggian yang membahayakan</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->pekerjaan_pada_ketinggian_yang_membahayakan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_pekerjaan_pada_ketinggian_yang_membahayakan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">g.</td>
                                    <td class="p-0">Perlu dengan ijin kerja yang lain</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}</td>
                                </tr>
                            </tbody>
                        </table>
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
                        <span class="font-weight-bolder">E. UJI KANDUNGAN GAS</span>
                        @include('bagian-isi-kerja.uji-kandungan-gas.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">F. PETUGAS PENGAWAS</span>
                        @include('bagian-isi-kerja.petugas-pengawas.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">G. PENGESAHAN</span>
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
