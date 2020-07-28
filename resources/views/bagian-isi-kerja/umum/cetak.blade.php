<span class="font-weight-bolder">A. UMUM</span>
<div class="px-3">
    <table class="table">
        <tr class="border">
            <td class="p-0" width="50px">Nomor</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" colspan="5">{{ $ijinKerja->umum->nomor }}</td>
        </tr>
        <tr class="border">
            <td class="p-0" width="50px">Tanggal Pengesahan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" colspan="5">{{ date('d/m/Y', strtotime($ijinKerja->umum->tanggal_pengesahan)) }}</td>
        </tr>
        <tr class="border">
            <td class="p-0" width="50px">Masa Berlaku</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" width="30px">Tanggal</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" width="50px">{{ date('d/m/Y', strtotime($ijinKerja->umum->tanggal_mulai)) }}</td>
            <td class="p-0" width="20px">s/d</td>
            <td class="p-0" width="50px">{{ date('d/m/Y', strtotime($ijinKerja->umum->tanggal_selesai)) }}</td>
        </tr>
        <tr class="border">
            <td class="p-0" width="50px"></td>
            <td class="p-0" width="10px"></td>
            <td class="p-0" width="30px">Waktu</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" width="50px">{{ date('H:i', strtotime($ijinKerja->umum->tanggal_mulai)) }}</td>
            <td class="p-0" width="20px">s/d</td>
            <td class="p-0" width="50px">{{ date('H:i', strtotime($ijinKerja->umum->tanggal_selesai)) }}</td>
        </tr>
        <tr class="border">
            <td class="p-0" width="50px">Lokasi Pekerjaan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" colspan="5">{{ $ijinKerja->umum->lokasi_pekerjaan }}</td>
        </tr>
        <tr class="border">
            <td class="p-0" width="50px">Pelaksana Pekerjaan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" colspan="5">{{ $ijinKerja->umum->pelaksana_pekerjaan }}</td>
        </tr>
        <tr class="border">
            <td class="p-0" width="50px">Uraian Pekerjaan</td>
            <td class="p-0" width="10px">:</td>
            <td class="p-0" colspan="5">{{ $ijinKerja->umum->uraian_pekerjaan }}</td>
        </tr>
    </table>
</div>
