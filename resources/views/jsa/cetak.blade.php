<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'JSA ' . $jsa->nama_perusahaan . ' - ' . $jsa->no_jsa }} - {{ config('app.name') }}</title>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{ asset('storage/logo.png') }}">
    <style type="text/css" media="print">
        body{
            background-color: white;
            font-family: 'Times New Roman', Times, serif;
        }

        @media all {
            .page-break {
                display: none;
            }

            input.cawang {
                width : 8px;
                height : 8px;
                position: relative;
                top: 1px;
            }
        }

        @media print{
            @page {
                margin: 1cm;
                size: 330mm 215mm;
            }
            .page-break {
                display: block;
                page-break-before: always;
            }
        }
    </style>
</head>

<body onload="window.print()" oncontextmenu="return false;">

    <div class="row mb-5">
        <div class="col-1">
            <img class="mw-100" src="{{ url('storage/logo.png') }}" alt="">
        </div>
        <div class="col-10">
            <h2 class="text-center font-weight-bolder">FORMULIR ANALISA KESELAMATAN KERJA / JOB SAFETY ANALYSIS FORM</h2>
        </div>
        <div class="col-1"></div>
    </div>
    <table class="table mb-5">
        <tr class="border border-info">
            <td class="p-1 border border-info" width="400px">No. JSA</td>
            <td class="p-1 border border-info" width="10px">:</td>
            <td class="p-1 border border-info">{{ $jsa->no_jsa }}</td>
        </tr>
        <tr class="border border-info">
            <td class="p-1 border border-info" width="400px">Nama Pekerjaan / <span class="font-italic">Job Title</span></td>
            <td class="p-1 border border-info" width="10px">:</td>
            <td class="p-1 border border-info">{{ $jsa->nama_pekerjaan }}</td>
        </tr>
        <tr class="border border-info">
            <td class="p-1 border border-info" width="400px">Lokasi / <span class="font-italic">Location</span></td>
            <td class="p-1 border border-info" width="10px">:</td>
            <td class="p-1 border border-info">{{ $jsa->lokasi }}</td>
        </tr>
        <tr class="border border-info">
            <td class="p-1 border border-info" width="400px">Nomor Kontrak / <span class="font-italic">Contract Number</span></td>
            <td class="p-1 border border-info" width="10px">:</td>
            <td class="p-1 border border-info">{{ $jsa->nomor_kontrak }}</td>
        </tr>
        <tr class="border border-info">
            <td class="p-1 border border-info" width="400px">Tanggal Kontrak / <span class="font-italic">Contract Date</span></td>
            <td class="p-1 border border-info" width="10px">:</td>
            <td class="p-1 border border-info">{{ date('d-m-Y', strtotime($jsa->tanggal_kontrak)) }}</td>
        </tr>
    </table>

    <table class="table mb-5" style="font-size: 9pt">
        <thead class="border border-info" style="background-color: skyblue">
            <tr class="border border-info highlighted">
                <td class="border border-info p-1 text-center" colspan="3">Disiapkan oleh / <span class="font-italic">Prepared By</span></td>
                <td class="border border-info p-1 text-center" colspan="3">Direview oleh / <span class="font-italic">Reviewed By</span></td>
                <td class="border border-info p-1 text-center" colspan="3">Disetujui oleh / <span class="font-italic">Approved By</span></td>
            </tr>
        </thead>
        <tbody class="border border-info">
            <tr class="border border-info">
                <td class="p-1 border border-info" width="200px">Perusahaan / <span class="font-italic">Company</span></td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->nama_perusahaan }}</td>
                <td class="p-1 border border-info" width="200px">Nama / <span class="font-italic">Name</span></td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->pereview->nama }}</td>
                <td class="p-1 border border-info" width="200px">Penanggung Jawab / <span class="font-italic">Person In Charge</span></td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->penyetuju->nama }}</td>
            </tr>
            <tr class="border border-info">
                <td class="p-1 border border-info" width="200px">Nomor JSA / <span class="font-italic">JSA Number</span></td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->no_jsa }}</td>
                <td class="p-1 border border-info" width="200px">Satuan Kerja Pemberi Kerja</td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->satuan_kerja_pemberi_kerja }}</td>
                <td class="p-1 border border-info" width="200px">Satuan Kerja Penanggung Jawab</td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->satuan_kerja_penanggung_jawab }}</td>
            </tr>
            <tr class="border border-info">
                <td class="p-1 border border-info" width="200px">Tanggal / <span class="font-italic">Date</span></td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->tanggal_kontrak }}</td>
                <td class="p-1 border border-info" width="200px">Tanggal Review / <span class="font-italic">Review Date</span></td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->tanggal_review }}</td>
                <td class="p-1 border border-info" width="200px">Tanggal Persetujuan / <span class="font-italic">Approval Date</span></td>
                <td class="p-1 border border-info" width="10px">:</td>
                <td class="p-1 border border-info">{{ $jsa->tanggal_persetujuan }}</td>
            </tr>
            <tr class="border border-info">
                <td class="border border-info p-1 text-center" colspan="3"></td>
                <td class="border border-info p-1 text-center" colspan="3"><img height="30px" src="{{ url('storage/reviewed.png') }}" alt=""></td>
                <td class="border border-info p-1 text-center" colspan="3"><img height="30px" src="{{ url('storage/approved.png') }}" alt=""></td>
            </tr>
        </tbody>
    </table>
    <table class="table" style="font-size: 8pt">
        <thead class="" style="background-color: skyblue">
            <tr class="border border-info">
                <td style="vertical-align: middle" class="border border-info p-1 text-center" width="10px">No.</td>
                <td style="vertical-align: middle" class="border border-info p-1 text-center" width="200px">Urutan Langkah-langkah Pekerjaan / <span class="font-italic">Sequence of Jobs Steps</span></td>
                <td style="vertical-align: middle" class="border border-info p-1 text-center" width="100px">Potensi Bahaya / <span class="font-italic">Potential Hazard</span></td>
                <td style="vertical-align: middle" class="border border-info p-1 text-center" width="100px">Bahaya Spesifik / <span class="font-italic">Specific Hazard</span></td>
                <td style="vertical-align: middle" class="border border-info p-1 text-center" width="120px">Rencana Tindakan Pencegahan / <span class="font-italic">Preventif Measure Plan</span></td>
                <td style="vertical-align: middle" class="border border-info p-1 text-center" width="80px">PIC Pelaksana / <span class="font-italic">Action By PIC</span></td>
                <td style="vertical-align: middle" class="border border-info p-1 text-center" width="50px">Waktu / <span class="font-italic">When</span></td>
            </tr>
            <tr><td class="border border-info p-1" colspan="7" style="background-color: blue">{{ $jsa->judul_pekerjaan }}</td></tr>
        </thead>
        <tbody>
            @foreach ($jsa->langkahPekerjaan as $item)
            <tr class="border border-info">
                <td class="border border-info p-1">{{ $loop->iteration }}</td>
                <td class="border border-info p-1">{{ $item->urutan_langkah_langkah_pekerjaan }}</td>
                <td class="border border-info p-1">
                    <ul>
                        @foreach ($item->potensiBahaya as $potensiBahaya)
                            <li>{{ $potensiBahaya->deskripsi }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="border border-info p-1">{{ $item->bahaya_spesifik }}</td>
                <td class="border border-info p-1">{{ $item->rencana_tindakan_pencegahan }}</td>
                <td class="border border-info p-1">{{ $item->pic_pelaksana }}</td>
                <td class="border border-info p-1">{{ $item->waktu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.onkeydown = function(e) {
            if(event.keyCode == 123) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)) {
                return false;
            }
        }
    </script>
</body>


</html>
