<hr class="m-0">
<p class="m-0">Pelaksana Isolasi Listrik</p>
<div class="px-3">
    <table class="table table-borderless">
        <tr>
            <td class="p-0" width="100px">Nama</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0">{{ $ijinKerja->petugasPengawas->nama_petugas_isolasi_listrik }}</td>
        </tr>
        <tr>
            <td class="p-0" width="100px">Tanda Tangan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0"><br><br></td>
        </tr>
        <tr>
            <td class="p-0" width="100px">Jabatan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0">{{ $ijinKerja->petugasPengawas->jabatan_petugas_isolasi_listrik }}</td>
        </tr>
        <tr>
            <td class="p-0" width="100px">Tanggal</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0">{{ date('d/m/Y', strtotime($ijinKerja->petugasPengawas->tanggal_petugas_isolasi_listrik)) }}</td>
        </tr>
    </table>
</div>
<hr class="m-0">
<p class="m-0">Petugas Uji Kandungan Gas</p>
<div class="px-3">
    <table class="table table-borderless">
        <tr>
            <td class="p-0" width="100px">Nama</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0">{{ $ijinKerja->petugasPengawas->nama_petugas_uji_kandungan_gas }}</td>
        </tr>
        <tr>
            <td class="p-0" width="100px">Tanda Tangan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0"><br><br></td>
        </tr>
        <tr>
            <td class="p-0" width="100px">Jabatan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0">{{ $ijinKerja->petugasPengawas->jabatan_petugas_uji_kandungan_gas }}</td>
        </tr>
        <tr>
            <td class="p-0" width="100px">Tanggal</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0">{{ date('d/m/Y', strtotime($ijinKerja->petugasPengawas->tanggal_petugas_uji_kandungan_gas)) }}</td>
        </tr>
    </table>
</div>
