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
