@extends('layouts.cetak')
@section('title','Ijin Kerja Memasuki Ruangan Terbatas ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bekgron {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: rgb(255, 255, 0) !important;
    }
}
</style>
@endsection

@section('content')
<div class="container text-center">
    <img class="mt-5 mb-5" src="{{ url('storage/logo.png') }}" alt="">
    <h1 class="font-weight-bolder mb-5" style="font-family: Arial, Helvetica, sans-serif">INSTRUKSI KERJA</h1>
    <h1 class="font-weight-bolder mb-5" style="font-size: 36pt; font-family: Arial, Helvetica, sans-serif">IZIN KERJA MEMASUKI RUANGAN TERBATAS</h1>
    <h1 class="mb-5" style="font-family: Arial, Helvetica, sans-serif">I-004/0.38</h1>
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
            <h5 class="font-weight-bolder">IZIN KERJA MEMASUKI RUANGAN TERBATAS (<span class="font-italic">CONFINED SPACE ENTRY PERMIT</span>)</h5>
            <h6 class="font-weight-bolder">PT PERUSAHAAN GAS NEGARA (Persero) Tbk</h6>
            <h6 class="font-weight-bolder">PMO INFRASTRUCTURE</h6>
            <h6 class="font-weight-bolder">INTEGRATED TEAM JABATI</h6>
        </div>
        <div class="col-1 border border-dark"></div>
        <div class="col-12 border border-dark text-center py-2" style="font-size: 9pt">NO. {{ $ijinKerja->umum->nomor }}/I-004/Wilayah {{ $ijinKerja->umum->lokasi_pekerjaan }}/{{ date('Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</div>
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
                        <span class="font-weight-bolder">C. DOKUMEN PENDUKUNG</span>
                        @include('bagian-isi-kerja.dokumen-pendukung.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">D. SAFETY CHECKLIST</span>
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
                                    <td class="p-0 text-center" width="20px" rowspan="4">a.</td>
                                    <td class="p-0">Ruang terbatas tersebut sesungguhnya telah :</td>
                                    <td class="p-0 text-center"> </td>
                                    <td class="p-0"> </td>
                                </tr>
                                <tr>
                                    <td class="p-0">1. Dibebaskan dari tekanan</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->ruang_terbatas_dibebaskan_dari_tekanan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_ruang_terbatas_dibebaskan_dari_tekanan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">2. Dikosongkan atau drain</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->ruang_terbatas_dikosongkan_atau_drain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_ruang_terbatas_dikosongkan_atau_drain }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">3. Diisolasi</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->ruang_terbatas_diisolasi == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_ruang_terbatas_diisolasi }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">b.</td>
                                    <td class="p-0">Semua sambungan listrik/hidrolik diluar dan didalam ruangan</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->listrik_or_hidrolik_diluar_dan_didalam_ruangan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">c.</td>
                                    <td class="p-0">Aman dari kandungan gas beracun dan mudah terbakar</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->aman_dari_kandungan_gas_beracun_dan_mudah_terbakar == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">d.</td>
                                    <td class="p-0">Kandungan oksigen mencukupi</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->kandungan_oksigen_mencukupi == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_kandungan_oksigen_mencukupi }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">e.</td>
                                    <td class="p-0">Ventilasi udara pembantu tersedia</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->ventilasi_udara_pembantu_tersedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_ventilasi_udara_pembantu_tersedia }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">f.</td>
                                    <td class="p-0">Terdapat kerja panas di ruangan terbatas</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->terdapat_kerja_panas_di_ruangan_terbatas == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_terdapat_kerja_panas_di_ruangan_terbatas }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">g.</td>
                                    <td class="p-0">Terdapat pekerjaan radiografi di ruangan terbatas</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->terdapat_pekerjaan_radiografi_di_ruangan_terbatas == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">h.</td>
                                    <td class="p-0">Perlu dengan ijin kerja yang lain</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">i.</td>
                                    <td class="p-0">Peringatan bahaya dan tanda batas tersedia</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->peringatan_bahaya_dan_tanda_batas_tersedia == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_peringatan_bahaya_dan_tanda_batas_tersedia }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">j.</td>
                                    <td class="p-0">Semua alat kerja penunjang aman untuk digunakan</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->semua_alat_kerja_penunjang_aman_untuk_digunakan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">k.</td>
                                    <td class="p-0">Semua pekerja terlatih untuk masuk ke ruangan terbatas</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">l.</td>
                                    <td class="p-0">Semua pekerja telah lengkap alat pelindung diri</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->semua_pekerja_telah_lengkap_alat_pelindung_diri == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri }}</td>
                                </tr>
                            </tbody>
                        </table>
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
                <div class="col-12 px-2">
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">CATATAN</span>
                        <p>{{ $ijinKerja->catatan ? $ijinKerja->catatan : "Tidak Ada Catatan" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
