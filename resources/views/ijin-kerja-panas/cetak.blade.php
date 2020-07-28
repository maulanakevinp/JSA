@extends('layouts.cetak')
@section('title','Ijin Kerja Panas ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bg-oren {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: rgb(255, 0, 0) !important;
    }
}
</style>
@endsection

@section('content')
<div class="container text-center">
    <img class="mt-5 mb-5" src="{{ url('storage/logo.png') }}" alt="">
    <h1 class="font-weight-bolder mb-5" style="font-family: Arial, Helvetica, sans-serif">INSTRUKSI KERJA</h1>
    <h1 class="font-weight-bolder mb-5" style="font-size: 36pt; font-family: Arial, Helvetica, sans-serif"">IZIN KERJA PANAS</h1>
    <h1 class="mb-5" style="font-family: Arial, Helvetica, sans-serif">I-002/0.38</h1>
    <h2 style="margin-top: 700px; font-family: Arial, Helvetica, sans-serif"><span class="font-weight-bolder" >PT PERUSAHAAN GAS NEGARA</span> (Persero) <span class="font-weight-bolder" >Tbk</span></h2>
    <h2 class="" style="font-family: Arial, Helvetica, sans-serif">Jakarta, {{ date('Y') }}</h2>
</div>
<div class="page-break"></div>
<div class="container-fluid">
    <div class="row mb-5 border border-dark">
        <div class="col-1 text-center border border-dark">
            <img height="50px" src="{{ url('storage/logo.png') }}" alt="">
        </div>
        <div class="col-10 border border-dark bg-oren text-center">
            <h5 class="font-weight-bolder text-white">IZIN KERJA PANAS (<span class="font-italic">WORIKING AT HEIGHT PERMIT</span>)</h5>
            <h6 class="font-weight-bolder text-white">PT PERUSAHAAN GAS NEGARA (Persero) Tbk</h6>
            <h6 class="font-weight-bolder text-white">PMO INFRASTRUCTURE</h6>
            <h6 class="font-weight-bolder text-white">INTEGRATED TEAM JABATI</h6>
        </div>
        <div class="col-1 border border-dark"></div>
        <div class="col-12 border border-dark text-center py-2" style="font-size: 9pt">NO. {{ $ijinKerja->umum->nomor }}/I-002/Wilayah {{ $ijinKerja->umum->lokasi_pekerjaan }}/{{ date('Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</div>
        <div class="col-12 bg-oren">
            <div class="row" style="font-size: 7pt">
                <div class="col-6 p-2">
                    <div class="px-1 border border-dark bg-white mb-2">
                        @include('bagian-isi-kerja.umum.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">B. JENIS PEKERJAAN</span>
                        @include('bagian-isi-kerja.jenis-pekerjaan.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">C. SUMBER BAHAYA ALAT/KEGIATAN</span>
                        @include('bagian-isi-kerja.sumber-bahaya-alat.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">D. ALAT PELINDUNG DIRI</span>
                        @include('bagian-isi-kerja.alat-pelindung-diri.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">E. DOKUMEN PENDUKUNG</span>
                        @include('bagian-isi-kerja.dokumen-pendukung.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">CATATAN</span>
                        <p>{{ $ijinKerja->catatan ? $ijinKerja->catatan : "Tidak Ada Catatan" }}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-8 px-2 pt-2">
                            <div class="px-1 border border-dark bg-white mb-2">
                                <span class="font-weight-bolder">F. SAFETY CHECKLIST</span>
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
                                            <td class="p-0 text-center" width="20px" rowspan="10">a.</td>
                                            <td class="p-0">Jalur tersebut sesungguhnya telah :</td>
                                            <td class="p-0 text-center"> </td>
                                            <td class="p-0"> </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">1. Dibebaskan dari tekanan</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_dibebaskan_dari_tekanan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_dibebaskan_dari_tekanan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">2. Dikosongkan atau drain</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_dikosongkan_atau_drain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_dikosongkan_atau_drain }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">3. Diisolasi dengan : Blanking</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_diisolasi_dengan_blanking == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_blanking }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">&nbsp; &nbsp; &nbsp; &nbsp; Dilepas</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_diisolasi_dengan_dilepas == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_dilepas }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">&nbsp; &nbsp; &nbsp; &nbsp; Keterangan dikunci</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_diisolasi_dengan_keterangan_dikunci == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_keterangan_dikunci }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">&nbsp; &nbsp; &nbsp; &nbsp; Diberi label</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_diisolasi_dengan_keterangan_diberi_label == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_diisolasi_dengan_keterangan_diberi_label }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">4. Didorong atau flush dengan air</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_didorong_atau_flush_dengan_air == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_didorong_atau_flush_dengan_air }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">5. Steaming out or Purging</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_steaming_out_or_purging == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_steaming_out_or_purging }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">6. Dinginkan secara alamiah atau mekanis</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->jalur_dinginkan_secara_alamiah_atau_mekanis == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">b.</td>
                                            <td class="p-0">Semua saluran, drain dan kerangan pada jarak 15 m, dan tempat pekerjaan telah ditutup</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->semua_saluran_drain_dan_kerangan_pada_jarak_15m == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">c.</td>
                                            <td class="p-0">Bahan mudah terbakar diamankan</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->bahan_mudah_terbakar_diamankan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_bahan_mudah_terbakar_diamankan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">d.</td>
                                            <td class="p-0">Alat pemadam kebakaran siap sedia</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->alat_pemadam_kebakaran_siap_sedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_alat_pemadam_kebakaran_siap_sedia }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">e.</td>
                                            <td class="p-0">Petugas pemadam kebakaran siap sedia</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->petugas_pemadam_kebakaran_siap_sedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_petugas_pemadam_kebakaran_siap_sedia }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">f.</td>
                                            <td class="p-0">Semua peralatan las telah diamankan</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->semua_peralatan_las_telah_diamankan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_semua_peralatan_las_telah_diamankan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">g.</td>
                                            <td class="p-0">Pekerjaan harus terus dibasahi dengan air</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->pekerjaan_harus_terus_dibasahi_dengan_air == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_pekerjaan_harus_terus_dibasahi_dengan_air }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">h.</td>
                                            <td class="p-0">Perlu dengan ijin kerja yang lain</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">i.</td>
                                            <td class="p-0">Semua mesin : diesel, kompresor dll, telah diamankan</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->semua_mesin_telah_diamankan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_semua_mesin_telah_diamankan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle">j.</td>
                                            <td class="p-0">Semua pekerjaan telah disetujui untuk penggalian</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->semua_pekerjaan_telah_disetujui_untuk_penggalian == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0 text-center" width="20px" style="vertical-align: middle" rowspan="3">k.</td>
                                            <td class="p-0">Semua penggerak utama peralatan listrik telah :</td>
                                            <td class="p-0 text-center"> </td>
                                            <td class="p-0"> </td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">1. Diisolasi dan diberi label</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->semua_peralatan_listrik_telah_diisolasi == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_diisolasi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="p-0">2. Perlu pemeriksaan ulang</td>
                                            <td class="p-0 text-center">{!! $ijinKerja->semua_peralatan_listrik_telah_diisolasi == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                            <td class="p-0">{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_diisolasi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-1 border border-dark bg-white mb-2">
                                <span class="font-weight-bolder">G. UJI KANDUNGAN GAS</span>
                                @include('bagian-isi-kerja.uji-kandungan-gas.cetak')
                            </div>
                        </div>
                        <div class="col-4 px-2 pt-2">
                            <div class="px-1 border border-dark bg-white mb-2">
                                <span class="font-weight-bolder">H. PETUGAS PENGAWAS</span>
                                @include('bagian-isi-kerja.petugas-pengawas.cetak')
                            </div>
                            <div class="px-1 border border-dark bg-white mb-2">
                                <span class="font-weight-bolder">I. PENGESAHAN</span>
                                @include('bagian-isi-kerja.pengesahan.cetak')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 px-2">
                            <div class="px-1 border border-dark bg-white mb-2">
                                <span class="font-weight-bolder">VALIDASI</span>
                                @include('bagian-isi-kerja.validasi.cetak')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
