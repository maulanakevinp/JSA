<?php

namespace App\Http\Controllers;

use App\AlatPelindungDiri;
use App\DokumenPendukung;
use App\IjinKerjaDiKetinggian;
use App\Jsa;
use App\Pengesahan;
use App\Umum;
use App\Validasi;
use Illuminate\Http\Request;

class IjinKerjaDiKetinggianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $ijinKerja = IjinKerjaDiKetinggian::where('jsa_id', $id)->paginate(12);
        $jsa = Jsa::findOrFail($id);
        if (!$ijinKerja) {
            return abort(404);
        }

        return view('ijin-kerja-di-ketinggian.index', compact('ijinKerja','jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-di-ketinggian.create', compact('jsa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataUmum = $this->dataUmum($request);
        $dataAlatPelindungDiri = $this->dataAlatPelindungDiri($request);
        $dataDokumenPendukung = $this->dataDokumenPendukung($request);
        $dataPengesahan = $this->dataPengesahan($request);
        $dataValidasi = $this->dataValidasi($request);

        $umum               = Umum::create($dataUmum);
        $alatPelindungDiri  = AlatPelindungDiri::create($dataAlatPelindungDiri);
        $dokumenPendukung   = DokumenPendukung::create($dataDokumenPendukung);
        $pengesahan         = Pengesahan::create($dataPengesahan);

        $ijinKerja = IjinKerjaDiKetinggian::create([
            'jsa_id'                                                            => $request->jsa_id,
            'umum_id'                                                           => $umum->id,
            'alat_pelindung_diri_id'                                            => $alatPelindungDiri->id,
            'dokumen_pendukung_id'                                              => $dokumenPendukung->id,
            'pengesahan_id'                                                     => $pengesahan->id,
            'sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah'             => $request->sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah,
            'keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah'  => $request->keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah,
            'jarak_ketinggian_sudah_diketahui'                                  => $request->jarak_ketinggian_sudah_diketahui,
            'keterangan_jarak_ketinggian_sudah_diketahui'                       => $request->keterangan_jarak_ketinggian_sudah_diketahui,
            'terdapat_bahaya_angin'                                             => $request->terdapat_bahaya_angin,
            'keterangan_terdapat_bahaya_angin'                                  => $request->keterangan_terdapat_bahaya_angin,
            'area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh'                 => $request->area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh,
            'keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh'      => $request->keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh,
            'area_kerja_sudah_terbebas_dari_semua_aliran_listrik'               => $request->area_kerja_sudah_terbebas_dari_semua_aliran_listrik,
            'keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik'    => $request->keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik,
            'area_kerja_berada_dipermukaan_yang_landai'                         => $request->area_kerja_berada_dipermukaan_yang_landai,
            'keterangan_area_kerja_berada_dipermukaan_yang_landai'              => $request->keterangan_area_kerja_berada_dipermukaan_yang_landai,
            'area_kerja_berada_di_permukaan_yang_basah'                         => $request->area_kerja_berada_di_permukaan_yang_basah,
            'keterangan_area_kerja_berada_di_permukaan_yang_basah'              => $request->keterangan_area_kerja_berada_di_permukaan_yang_basah,
            'area_kerja_berada_di_ruang_yang_sempit'                            => $request->area_kerja_berada_di_ruang_yang_sempit,
            'keterangan_area_kerja_berada_di_ruang_yang_sempit'                 => $request->keterangan_area_kerja_berada_di_ruang_yang_sempit,
            'pekerja_bekerja_sendiri'                                           => $request->pekerja_bekerja_sendiri,
            'keterangan_pekerja_bekerja_sendiri'                                => $request->keterangan_pekerja_bekerja_sendiri,
            'tersedia_rambu_keselamatan'                                        => $request->tersedia_rambu_keselamatan,
            'keterangan_tersedia_rambu_keselamatan'                             => $request->keterangan_tersedia_rambu_keselamatan,
            'alat_perancah_digunakan_pada_pekerjaan_di_ketinggian'              => $request->alat_perancah_digunakan_pada_pekerjaan_di_ketinggian,
            'keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian'   => $request->keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian,
            'alat_perancah_disusun_oleh_petugas_alat_perancah'                  => $request->alat_perancah_disusun_oleh_petugas_alat_perancah,
            'keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah'       => $request->keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah,
            'komponen_alat_perancah_dalam_kondisi_yang_baik'                    => $request->komponen_alat_perancah_dalam_kondisi_yang_baik,
            'keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik'         => $request->keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik,
            'komponen_alat_perancah_sudah_terpasang'                            => $request->komponen_alat_perancah_sudah_terpasang,
            'keterangan_komponen_alat_perancah_sudah_terpasang'                 => $request->keterangan_komponen_alat_perancah_sudah_terpasang,
            'tangga_merupakan_alat_yang_bantu_yang_paling_sesuai'               => $request->tangga_merupakan_alat_yang_bantu_yang_paling_sesuai,
            'keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai'    => $request->keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai,
            'tangga_dalam_kondisi_layak_dan_sesuai'                             => $request->tangga_dalam_kondisi_layak_dan_sesuai,
            'keterangan_tangga_dalam_kondisi_layak_dan_sesuai'                  => $request->keterangan_tangga_dalam_kondisi_layak_dan_sesuai,
            'tangga_mampu_menahan_gerakan'                                      => $request->tangga_mampu_menahan_gerakan,
            'keterangan_tangga_mampu_menahan_gerakan'                           => $request->keterangan_tangga_mampu_menahan_gerakan,
            'tangga_memiliki_panjang_yang_cukup'                                => $request->tangga_memiliki_panjang_yang_cukup,
            'keterangan_tangga_memiliki_panjang_yang_cukup'                     => $request->keterangan_tangga_memiliki_panjang_yang_cukup,
            'tangga_memiliki_stopper'                                           => $request->tangga_memiliki_stopper,
            'keterangan_tangga_memiliki_stopper'                                => $request->keterangan_tangga_memiliki_stopper,
            'pekerja_menggunakan_peralatan_lain'                                => $request->pekerja_menggunakan_peralatan_lain,
            'keterangan_pekerja_menggunakan_peralatan_lain'                     => $request->keterangan_pekerja_menggunakan_peralatan_lain,
            'catatan'                                                           => $request->catatan,
        ]);

        try {
            for ($i=0; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_di_ketinggian_id'   =>  $ijinKerja->id,
                    'validasi_hari'                 =>  $request->validasi_hari[$i],
                    'validasi_mulai_hari'           =>  $request->validasi_mulai_hari[$i],
                    'validasi_selesai_hari'         =>  $request->validasi_selesai_hari[$i],
                    'nama_pelaksana'                =>  $request->nama_pelaksana[$i],
                    'inisial_pelaksana'             =>  $request->inisial_pelaksana[$i],
                    'nama_pengawas'                 =>  $request->nama_pengawas[$i],
                    'inisial_pengawas'              =>  $request->inisial_pengawas[$i],
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja di ketinggian berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaDiKetinggian  $ijinKerjaDiKetinggian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ijinKerja = IjinKerjaDiKetinggian::findOrFail($id);
        return view('ijin-kerja-di-ketinggian.show', compact('ijinKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaDiKetinggian  $ijinKerjaDiKetinggian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ijinKerja = IjinKerjaDiKetinggian::findOrFail($id);
        return view('ijin-kerja-di-ketinggian.edit', compact('ijinKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ijinKerja = IjinKerjaDiKetinggian::find($id);

        if (!$request->catatan) {
            $ijinKerja->update([
                'sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah'             => $request->sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah,
                'keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah'  => $request->keterangan_sebagian_pekerjaan_dapat_dikerjakan_dipermukaan_tanah,
                'jarak_ketinggian_sudah_diketahui'                                  => $request->jarak_ketinggian_sudah_diketahui,
                'keterangan_jarak_ketinggian_sudah_diketahui'                       => $request->keterangan_jarak_ketinggian_sudah_diketahui,
                'terdapat_bahaya_angin'                                             => $request->terdapat_bahaya_angin,
                'keterangan_terdapat_bahaya_angin'                                  => $request->keterangan_terdapat_bahaya_angin,
                'area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh'                 => $request->area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh,
                'keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh'      => $request->keterangan_area_kerja_sudah_terbebas_dari_bahaya_benda_jatuh,
                'area_kerja_sudah_terbebas_dari_semua_aliran_listrik'               => $request->area_kerja_sudah_terbebas_dari_semua_aliran_listrik,
                'keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik'    => $request->keterangan_area_kerja_sudah_terbebas_dari_semua_aliran_listrik,
                'area_kerja_berada_dipermukaan_yang_landai'                         => $request->area_kerja_berada_dipermukaan_yang_landai,
                'keterangan_area_kerja_berada_dipermukaan_yang_landai'              => $request->keterangan_area_kerja_berada_dipermukaan_yang_landai,
                'area_kerja_berada_di_permukaan_yang_basah'                         => $request->area_kerja_berada_di_permukaan_yang_basah,
                'keterangan_area_kerja_berada_di_permukaan_yang_basah'              => $request->keterangan_area_kerja_berada_di_permukaan_yang_basah,
                'area_kerja_berada_di_ruang_yang_sempit'                            => $request->area_kerja_berada_di_ruang_yang_sempit,
                'keterangan_area_kerja_berada_di_ruang_yang_sempit'                 => $request->keterangan_area_kerja_berada_di_ruang_yang_sempit,
                'pekerja_bekerja_sendiri'                                           => $request->pekerja_bekerja_sendiri,
                'keterangan_pekerja_bekerja_sendiri'                                => $request->keterangan_pekerja_bekerja_sendiri,
                'tersedia_rambu_keselamatan'                                        => $request->tersedia_rambu_keselamatan,
                'keterangan_tersedia_rambu_keselamatan'                             => $request->keterangan_tersedia_rambu_keselamatan,
                'alat_perancah_digunakan_pada_pekerjaan_di_ketinggian'              => $request->alat_perancah_digunakan_pada_pekerjaan_di_ketinggian,
                'keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian'   => $request->keterangan_alat_perancah_digunakan_pada_pekerjaan_di_ketinggian,
                'alat_perancah_disusun_oleh_petugas_alat_perancah'                  => $request->alat_perancah_disusun_oleh_petugas_alat_perancah,
                'keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah'       => $request->keterangan_alat_perancah_disusun_oleh_petugas_alat_perancah,
                'komponen_alat_perancah_dalam_kondisi_yang_baik'                    => $request->komponen_alat_perancah_dalam_kondisi_yang_baik,
                'keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik'         => $request->keterangan_komponen_alat_perancah_dalam_kondisi_yang_baik,
                'komponen_alat_perancah_sudah_terpasang'                            => $request->komponen_alat_perancah_sudah_terpasang,
                'keterangan_komponen_alat_perancah_sudah_terpasang'                 => $request->keterangan_komponen_alat_perancah_sudah_terpasang,
                'tangga_merupakan_alat_yang_bantu_yang_paling_sesuai'               => $request->tangga_merupakan_alat_yang_bantu_yang_paling_sesuai,
                'keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai'    => $request->keterangan_tangga_merupakan_alat_yang_bantu_yang_paling_sesuai,
                'tangga_dalam_kondisi_layak_dan_sesuai'                             => $request->tangga_dalam_kondisi_layak_dan_sesuai,
                'keterangan_tangga_dalam_kondisi_layak_dan_sesuai'                  => $request->keterangan_tangga_dalam_kondisi_layak_dan_sesuai,
                'tangga_mampu_menahan_gerakan'                                      => $request->tangga_mampu_menahan_gerakan,
                'keterangan_tangga_mampu_menahan_gerakan'                           => $request->keterangan_tangga_mampu_menahan_gerakan,
                'tangga_memiliki_panjang_yang_cukup'                                => $request->tangga_memiliki_panjang_yang_cukup,
                'keterangan_tangga_memiliki_panjang_yang_cukup'                     => $request->keterangan_tangga_memiliki_panjang_yang_cukup,
                'tangga_memiliki_stopper'                                           => $request->tangga_memiliki_stopper,
                'keterangan_tangga_memiliki_stopper'                                => $request->keterangan_tangga_memiliki_stopper,
                'pekerja_menggunakan_peralatan_lain'                                => $request->pekerja_menggunakan_peralatan_lain,
                'keterangan_pekerja_menggunakan_peralatan_lain'                     => $request->keterangan_pekerja_menggunakan_peralatan_lain,
            ]);
        } else {
            $ijinKerja->update([
                'catatan'  => $request->catatan,
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja di ketinggian berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaDiKetinggian  $ijinKerjaDiKetinggian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijinKerjaDiKetinggian = IjinKerjaDiKetinggian::find($id);
        $ijinKerjaDiKetinggian->delete();
        return back()->with('success', 'Ijin kerja di ketinggian berhasil dihapus');
    }

    public function cetak($id)
    {
        $ijinKerja = IjinKerjaDiKetinggian::findOrFail($id);
        return view('ijin-kerja-di-ketinggian.cetak', compact('ijinKerja'));
    }
}
