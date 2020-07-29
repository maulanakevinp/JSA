@extends('layouts.cetak')
@section('title','Ijin Kerja Dingin ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bekgron {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: mediumseagreen !important;
    }
}
</style>
@endsection

@section('content')
<div class="container text-center">
    <img class="mt-5 mb-5" src="{{ url('storage/logo.png') }}" alt="">
    <h1 class="font-weight-bolder mb-5" style="font-family: Arial, Helvetica, sans-serif">INSTRUKSI KERJA</h1>
    <h1 class="font-weight-bolder mb-5" style="font-size: 36pt; font-family: Arial, Helvetica, sans-serif">IZIN KERJA DINGIN</h1>
    <h1 class="mb-5" style="font-family: Arial, Helvetica, sans-serif">I-003/0.38</h1>
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
            <h5 class="font-weight-bolder text-white">IZIN KERJA DINGIN (<span class="font-italic">COLD WORK PERMIT</span>)</h5>
            <h6 class="font-weight-bolder text-white">PT PERUSAHAAN GAS NEGARA (Persero) Tbk</h6>
            <h6 class="font-weight-bolder text-white">PMO INFRASTRUCTURE</h6>
            <h6 class="font-weight-bolder text-white">INTEGRATED TEAM JABATI</h6>
        </div>
        <div class="col-1 border border-dark"></div>
        <div class="col-12 border border-dark text-center py-2" style="font-size: 9pt">NO. {{ $ijinKerja->umum->nomor }}/I-003/Wilayah {{ $ijinKerja->umum->lokasi_pekerjaan }}/{{ date('Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</div>
        <div class="col-12 bekgron">
            <div class="row" style="font-size: 7pt">
                <div class="col-6 p-2">
                    <div class="px-1 border border-dark bg-white mb-2">
                        @include('bagian-isi-kerja.umum.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">B. SUMBER BAHAYA ALAT/KEGIATAN</span>
                        @include('bagian-isi-kerja.sumber-bahaya-alat.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">C. ALAT PELINDUNG DIRI</span>
                        @include('bagian-isi-kerja.alat-pelindung-diri.cetak')
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
                <div class="col-6 p-2">
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
                                    <td class="p-0">Semua pekerjaan disetujui untuk penggalian</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->semua_pekerjaan_disetujui_untuk_penggalian == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_semua_pekerjaan_disetujui_untuk_penggalian }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">h.</td>
                                    <td class="p-0">Perlu dengan ijin kerja yang lain</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">h.</td>
                                    <td class="p-0">Perlu dilakukan uji kandungan gas</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->perlu_dilakukan_uji_kandungan_gas == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_perlu_dilakukan_uji_kandungan_gas }}</td>
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
                                    <td class="p-0 text-center">{!! $ijinKerja->semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang }}</td>
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
