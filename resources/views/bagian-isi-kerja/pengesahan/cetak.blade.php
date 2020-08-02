<hr class="m-0">
<p class="m-0">Saya memahami tindakan pecegahan dan akan menghubungi operasi yang berwenang</p>
<p class="m-0">Pelaksana Pekerjaan</p>
<div class="px-3">
    <table class="table table-borderless">
        <tr>
            <td class="p-0" width="100px">Nama</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0">{{ $ijinKerja->pengesahan->nama_pelaksana_pekerjaan }}</td>
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
<div class="row px-3">
    <div class="col-6">
        <table class="table table-borderless">
            <tr>
                <td class="p-0" width="100px">Nama</td>
                <td class="p-0" width="10px">:</td>
                <td class="p-0">{{ $ijinKerja->pengesahan->nama_penanggung_jawab_area }}</td>
            </tr>
            <tr>
                <td class="p-0" colspan="3"></td>
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
    <div class="col-6">
        <img class="ml-2" style="max-width: 30%;" src="{{ asset('/storage/approved.png') }}" alt="">
    </div>
</div>
