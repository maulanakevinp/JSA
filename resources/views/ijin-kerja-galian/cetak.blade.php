@extends('layouts.cetak')
@section('title','Ijin Kerja Galian ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bekgron {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: slategray !important;
    }
}
</style>
@endsection

@section('content')
<div class="container text-center">
    <img class="mt-5 mb-5" src="{{ url('storage/logo.png') }}" alt="">
    <h1 class="font-weight-bolder mb-5" style="font-family: Arial, Helvetica, sans-serif">INSTRUKSI KERJA</h1>
    <h1 class="font-weight-bolder mb-5" style="font-size: 36pt; font-family: Arial, Helvetica, sans-serif">IZIN KERJA GALIAN</h1>
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
            <h5 class="font-weight-bolder text-white">IZIN KERJA GALIAN (<span class="font-italic">DIGGING PERMIT</span>)</h5>
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
                                    <td class="p-0 text-center" width="20px" rowspan="6">a.</td>
                                    <td class="p-0">Jalur tersebut sesungguhnya telah :</td>
                                    <td class="p-0 text-center"> </td>
                                    <td class="p-0"> </td>
                                </tr>
                                <tr>
                                    <td class="p-0">1. Kabel listrik bawah tanah</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_bebas_dari_kabel_listrik == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_bebas_dari_kabel_listrik }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">2. Kabel telepon bawah tanah</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_bebas_dari_kabel_telepon == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_bebas_dari_kabel_telepon }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">3. Kabel instrument bawah tanah</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_bebas_dari_kabel_instrument == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_bebas_dari_kabel_instrument }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">4. Gorong-gorong bawah tanah</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_bebas_dari_gorong_gorong == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_bebas_dari_gorong_gorong }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0">5. Pipa air/gas/minyak bawah tanah</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->jalur_bebas_dari_pipa_air_or_gas_or_minyak == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">b.</td>
                                    <td class="p-0">Dinding penggalian perlu di topang</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->dinding_penggalian_perlu_di_topang == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_dinding_penggalian_perlu_di_topang }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">c.</td>
                                    <td class="p-0">Rambu peringatan telah terpasang</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->rambu_peringatan_telah_terpasang == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_rambu_peringatan_telah_terpasang }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">d.</td>
                                    <td class="p-0">Lokasi telah diberi batas or pengalang</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->lokasi_telah_diberi_batas_or_pengalang == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_lokasi_telah_diberi_batas_or_pengalang }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">e.</td>
                                    <td class="p-0">Lokasi bebas dari area mudah terbakar</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->lokasi_bebas_dari_area_mudah_terbakar == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_lokasi_bebas_dari_area_mudah_terbakar }}</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center" width="20px" style="vertical-align: middle">f.</td>
                                    <td class="p-0">Perlu dengan ijin kerja yang lain</td>
                                    <td class="p-0 text-center">{!! $ijinKerja->perlu_dengan_ijin_kerja_yang_lain == 1 ? 'Ya / <span style="text-decoration: line-through">Tidak</span>' : '<span style="text-decoration: line-through">Ya</span> / Tidak' !!}</td>
                                    <td class="p-0">{{ $ijinKerja->keterangan_perlu_dengan_ijin_kerja_yang_lain }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 px-2 pt-2">
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">E. PENGESAHAN</span>
                        @include('bagian-isi-kerja.pengesahan.cetak')
                    </div>
                    <div class="px-1 border border-dark bg-white mb-2">
                        <span class="font-weight-bolder">VALIDASI</span>
                        @include('bagian-isi-kerja.validasi.cetak')
                    </div>
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
