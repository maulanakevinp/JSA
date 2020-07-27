@extends('layouts.cetak')
@section('title','Cetak Ijin Kerja Di Ketinggian ' . $ijinKerja->jsa->nama_perusahaan . ' - ' . $ijinKerja->umum->nomor)

@section('styles')
<style>
@media all {
    .bg-oren {
        -webkit-print-color-adjust: exact !important; /*Chrome, Safari */
        color-adjust: exact !important;  /*Firefox*/
        background-color: rgba(247, 104, 52, 0.863) !important;
    }
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row mb-5 border border-dark">
        <div class="col-1 text-center border border-dark">
            <img height="50px" src="{{ url('storage/logo.png') }}" alt="">
        </div>
        <div class="col-10 border border-dark bg-oren text-center">
            <h5 class="font-weight-bolder text-white">IZIN KERJA DI KETINGGIAN (<span class="font-italic">WORIKING AT HEIGHT PERMIT</span>)</h5>
            <h6 class="font-weight-bolder text-white">PT PERUSAHAAN GAS NEGARA (Persero) Tbk</h6>
        </div>
        <div class="col-1 border border-dark"></div>
        <div class="col-12 border border-dark text-center py-2" style="font-size: 9pt">NO. {{ $ijinKerja->umum->nomor }}/I-009/Wilayah {{ $ijinKerja->umum->lokasi_pekerjaan }}/{{ date('Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</div>
        <div class="col-12 bg-oren">
            <div class="container-fluid">
                <div class="row" style="font-size: 7pt">
                    <div class="col-6 p-2 bg-oren">
                        <div class="container-fluid border border-dark bg-white">
                            <span class="">A. UMUM</span>
                            <div class="pl-3">
                                <table class="table">
                                    <tr class="border">
                                        <td class="p-0" width="200px">Nomor</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" colspan="5">{{ $ijinKerja->umum->nomor }}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="p-0" width="200px">Tanggal Pengesahan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" colspan="5">{{ date('d/m/Y', strtotime($ijinKerja->umum->tanggal_pengesahan)) }}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="p-0" width="200px">Masa Berlaku</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" width="50px">Tanggal</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" width="50px">{{ date('d/m/Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</td>
                                        <td class="p-0" width="20px">s/d</td>
                                        <td class="p-0" width="50px">{{ date('d/m/Y', strtotime($ijinKerja->umum->tanggal_selesai)) }}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="p-0" width="200px"></td>
                                        <td class="p-0" width="10px"></td>
                                        <td class="p-0" width="50px">Waktu</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" width="50px">{{ date('H:i', strtotime($ijinKerja->umum->tanggal_mulai)) }}</td>
                                        <td class="p-0" width="20px">s/d</td>
                                        <td class="p-0" width="50px">{{ date('H:i', strtotime($ijinKerja->umum->tanggal_selesai)) }}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="p-0" width="200px">Lokasi Pekerjaan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" colspan="5">{{ $ijinKerja->umum->lokasi_pekerjaan }}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="p-0" width="200px">Pelaksana Pekerjaan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" colspan="5">{{ $ijinKerja->umum->pelaksana_pekerjaan }}</td>
                                    </tr>
                                    <tr class="border">
                                        <td class="p-0" width="200px">Uraian Pekerjaan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0" colspan="5">{{ $ijinKerja->umum->uraian_pekerjaan }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 p-2 bg-oren">
                        <div class="container-fluid border border-dark bg-white mb-3">
                            <span class="">E. PENGESAHAN</span>
                            <hr class="m-0">
                            <p class="m-0">Saya memahami tindakan pecegahan dan akan menghubungi operasi yang berwenang</p>
                            <p class="m-0">Pelaksana Pekerjaan</p>
                            <div class="pl-4">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="p-0" width="100px">Nama</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0">{{ $ijinKerja->pengesahan->nama_pelaksana_pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0" width="100px">Tanda Tangan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0"><br><br></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0" width="100px">Jabatan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0">{{ $ijinKerja->pengesahan->jabatan_pelaksana_pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0" width="100px">Tanggal</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0">{{ date('d/m/Y', strtotime($ijinKerja->pengesahan->tanggal_pelaksana_pekerjaan)) }}</td>
                                    </tr>
                                </table>
                            </div>
                            <hr class="m-0">
                            <p class="m-0">Saya sendiri telah memeriksa lokasi dan keadaannya, ijin ini menjamin untuk pekerjaan pada saat beroperasi</p>
                            <p class="m-0">Penanggung Jawab Area</p>
                            <div class="pl-4">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="p-0" width="100px">Nama</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0">{{ $ijinKerja->pengesahan->nama_penanggung_jawab_area }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0" width="100px">Tanda Tangan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0"><br><br></td>
                                    </tr>
                                    <tr>
                                        <td class="p-0" width="100px">Jabatan</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0">{{ $ijinKerja->pengesahan->jabatan_penanggung_jawab_area }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-0" width="100px">Tanggal</td>
                                        <td class="p-0" width="10px">:</td>
                                        <td class="p-0">{{ date('d/m/Y', strtotime($ijinKerja->pengesahan->tanggal_penanggung_jawab_area)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid border border-dark bg-white">
                            <span class="">F. VALIDASI</span>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center p-0" rowspan="2" style="vertical-align:middle">Hari</td>
                                        <td class="text-center p-0" colspan="2">Waktu</td>
                                        <td class="text-center p-0" colspan="2">Pelaksana</td>
                                        <td class="text-center p-0" colspan="2">Pengawas</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center p-0">Mulai</td>
                                        <td class="text-center p-0">Selesai</td>
                                        <td class="text-center p-0">Nama</td>
                                        <td class="text-center p-0">Inisial</td>
                                        <td class="text-center p-0">Nama</td>
                                        <td class="text-center p-0">Inisial</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        for ($i=0; $i < 7; $i++) {
                                            try {
                                                echo '<tr>
                                                        <td class="text-center p-0">' . date('d/m/Y', strtotime($ijinKerja->validasi[$i]->validasi_hari)) . '</td>
                                                        <td class="text-center p-0">' . date('H:i', strtotime($ijinKerja->validasi[$i]->validasi_mulai_hari)) . '</td>
                                                        <td class="text-center p-0">' . date('H:i', strtotime($ijinKerja->validasi[$i]->validasi_selesai_hari)) . '</td>
                                                        <td class="text-center p-0">' . $ijinKerja->validasi[$i]->nama_pelaksana . '</td>
                                                        <td class="text-center p-0">' . $ijinKerja->validasi[$i]->inisial_pelaksana . '</td>
                                                        <td class="text-center p-0">' . $ijinKerja->validasi[$i]->nama_pengawas . '</td>
                                                        <td class="text-center p-0">' . $ijinKerja->validasi[$i]->inisial_pengawas . '</td>
                                                    </tr>';
                                            } catch (\Throwable $th) {
                                                echo '<tr>
                                                        <td class="text-center p-0">&nbsp</td>
                                                        <td class="text-center p-0">&nbsp</td>
                                                        <td class="text-center p-0">&nbsp</td>
                                                        <td class="text-center p-0">&nbsp</td>
                                                        <td class="text-center p-0">&nbsp</td>
                                                        <td class="text-center p-0">&nbsp</td>
                                                        <td class="text-center p-0">&nbsp</td>
                                                    </tr>';
                                            }
                                        }
                                    @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
