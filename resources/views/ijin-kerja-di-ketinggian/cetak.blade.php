@extends('layouts.cetak')
@section('title','Ijin Kerja Di Ketinggian ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bekgron {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: rgba(247, 104, 52, 0.863) !important;
    }
}
</style>
@endsection

@section('content')
<div class="container text-center">
    <img class="mt-5 mb-5" src="{{ url('storage/logo.png') }}" alt="">
    <h1 class="font-weight-bolder mb-5" style="font-family: Arial, Helvetica, sans-serif">INSTRUKSI KERJA</h1>
    <h1 class="font-weight-bolder mb-5" style="font-size: 36pt; font-family: Arial, Helvetica, sans-serif">IZIN KERJA DI KETINGGIAN</h1>
    <h1 class="mb-5" style="font-family: Arial, Helvetica, sans-serif">I-009/0.38</h1>
    <h2 style="margin-top: 700px; font-family: Arial, Helvetica, sans-serif"><span class="font-weight-bolder" >PT PERUSAHAAN GAS NEGARA</span> (Persero) <span class="font-weight-bolder" >Tbk</span></h2>
    <h2 class="" style="font-family: Arial, Helvetica, sans-serif">Jakarta, {{ date('Y') }}</h2>
</div>
<div class="page-break"></div>
<div class="container-fluid">
    <div class="row mb-5 border border-dark">
        <div class="col-1 text-center border border-dark">
            <img height="50px" src="{{ url('storage/logo.png') }}" alt="">
        </div>
        <div class="col-10 border border-dark bekgron text-center">
            <h5 class="font-weight-bolder text-white">IZIN KERJA DI KETINGGIAN (<span class="font-italic">WORIKING AT HEIGHT PERMIT</span>)</h5>
            <h6 class="font-weight-bolder text-white">PT PERUSAHAAN GAS NEGARA (Persero) Tbk</h6>
            <h6 class="font-weight-bolder text-white">PMO INFRASTRUCTURE</h6>
            <h6 class="font-weight-bolder text-white">INTEGRATED TEAM JABATI</h6>
        </div>
        <div class="col-1 border border-dark"></div>
        <div class="col-12 border border-dark text-center py-2" style="font-size: 9pt">NO. {{ $ijinKerja->umum->nomor }}/I-009/Wilayah {{ $ijinKerja->umum->lokasi_pekerjaan }}/{{ date('Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</div>
        <div class="col-12 bekgron">
            <div class="row mb-2" style="font-size: 7pt">
                <div class="col-6 p-2">
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
                                <tr><th colspan="4" class="text-center p-0">General</th></tr>
                                <tr>
                                    <th colspan="2" class="text-center p-0">Item</th>
                                    <th class="text-center p-0" width="80px">Status</th>
                                    <th class="text-center p-0" width="120px">Ket.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">1</td>
                                    <td class="p-0">Apakah sebagian pekerjaan dapat dikerjakan dipermukaan tanah?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">2</td>
                                    <td class="p-0">Apakah jarak ketinggian sudah diketahui?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jarak_ketinggian_sudah_diketahui == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jarak_ketinggian_sudah_diketahui }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">3</td>
                                    <td class="p-0">Apakah terdapat bahaya angin?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->terdapat_bahaya_angin == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_terdapat_bahaya_angin }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">4</td>
                                    <td class="p-0">Apakah area kerja sudah terbebas dari bahaya benda jatuh?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">5</td>
                                    <td class="p-0">Apakah area kerja sudah terbebas dari semua aliran listrik? (diberikan pengaman atau isolasi)</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->area_kerja_sudah_terbebas_dari_semua_aliran_listrik == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">6</td>
                                    <td class="p-0">Apakah area kerja berada di permukaan yang landai?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->area_kerja_berada_dipermukaan_yang_landai == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_area_kerja_berada_dipermukaan_yang_landai }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">7</td>
                                    <td class="p-0">Apakah area kerja berada di permukaan yang basah/becek/berlumpur?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->area_kerja_berada_di_permukaan_yang_basah == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_area_kerja_berada_di_permukaan_yang_basah }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">8</td>
                                    <td class="p-0">Apakah area kerja berada di ruang yang sempit?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->area_kerja_berada_di_ruang_yang_sempit == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_area_kerja_berada_di_ruang_yang_sempit }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">9</td>
                                    <td class="p-0">Apakah pekerja bekerja sendiri?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->pekerja_bekerja_sendiri == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_pekerja_bekerja_sendiri }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">10</td>
                                    <td class="p-0">Apakah area kerja perlu dipasang barikade?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->area_kerja_perlu_dipasang_barikade == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_area_kerja_perlu_dipasang_barikade }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">11</td>
                                    <td class="p-0">Apakah tersedia rambu keselamatan?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->tersedia_rambu_keselamatan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_tersedia_rambu_keselamatan }}</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr><th colspan="4" class="text-center p-0"> </th></tr>
                                <tr><th colspan="4" class="text-center p-0">Alat Perancah</th></tr>
                                <tr>
                                    <th colspan="2" class="text-center p-0">Item</th>
                                    <th class="text-center p-0" width="80px">Status</th>
                                    <th class="text-center p-0" width="120px">Ket.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">1</td>
                                    <td class="p-0">Apakah alat perancah merupakan alat yang bantu yang paling sesuai untuk digunakan pada pekerjaan di ketinggian?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->alat_perancah_digunakan_pada_pekerjaan_di_ketinggian == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">2</td>
                                    <td class="p-0">Apakah alat perancah disusun oleh petugas alat perancah? (Sesuai Prosedur Operasi No. O-005/0.24)</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->alat_perancah_disusun_oleh_petugas_alat_perancah == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">3</td>
                                    <td class="p-0">Apakah komponen-komponen alat perancah dalam kondisi yang baik? (Sesuai Prosedur Operasi No. O-005/0.24)</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->komponen_alat_perancah_dalam_kondisi_yang_baik == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">4</td>
                                    <td class="p-0">Apakah komponen-komponen alat perancah sudah terpasang dengan baik?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->komponen_alat_perancah_sudah_terpasang == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_komponen_alat_perancah_sudah_terpasang }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 p-2">
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">E. PENGESAHAN</span>
                        @include('bagian-isi-kerja.pengesahan.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">F. VALIDASI</span>
                        @include('bagian-isi-kerja.validasi.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">D. SAFETY CHECKLIST</span>
                        <table class="table table-bordered">
                            <thead>
                                <tr><th colspan="4" class="text-center p-0">Tangga (Ladder / Step Ladder)</th></tr>
                                <tr>
                                    <th colspan="2" class="text-center p-0">Item</th>
                                    <th class="text-center p-0" width="80px">Status</th>
                                    <th class="text-center p-0" width="120px">Ket.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">1</td>
                                    <td class="p-0">Apakah tangga merupakan alat yang bantu yang paling sesuai untuk digunakan pada pekerjaan di ketinggian?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->tangga_merupakan_alat_yang_bantu_yang_paling_sesuai == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">2</td>
                                    <td class="p-0">Apakah tangga dalam kondisi layak dan sesuai untuk digunakan?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->tangga_dalam_kondisi_layak_dan_sesuai == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_tangga_dalam_kondisi_layak_dan_sesuai }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">3</td>
                                    <td class="p-0">Apakah tangga mampu menahan gerakan saat naik/turun dan bekerja?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->tangga_mampu_menahan_gerakan == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_tangga_mampu_menahan_gerakan }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">4</td>
                                    <td class="p-0">Apakah tangga memiliki panjang yang cukup untuk digunakan?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->tangga_memiliki_panjang_yang_cukup == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_tangga_memiliki_panjang_yang_cukup }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">5</td>
                                    <td class="p-0">Apakah tangga memiliki stopper/pin/pengunci yang dapat digunakan?</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->tangga_memiliki_stopper == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_tangga_memiliki_stopper }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">6</td>
                                    <td class="p-0">Apakah pekerja menggunakan peralatan lain saat bekerja? (jika "YA", pekerja harus menggunakan belt)</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->pekerja_menggunakan_peralatan_lain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_pekerja_menggunakan_peralatan_lain }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">G. CATATAN</span>
                        <p>{{ $ijinKerja->catatan ? $ijinKerja->catatan : "Tidak Ada Catatan" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
