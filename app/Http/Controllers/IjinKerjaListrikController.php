<?php

namespace App\Http\Controllers;

use App\AlatPelindungDiri;
use App\DokumenPendukung;
use App\IjinKerjaListrik;
use App\Jsa;
use App\Pengesahan;
use App\PetugasPengawas;
use App\UjiKandunganGas;
use App\Umum;
use App\Validasi;
use Illuminate\Http\Request;

class IjinKerjaListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $ijinKerja = IjinKerjaListrik::where('jsa_id', $id)->paginate(12);
        $jsa = Jsa::findOrFail($id);
        if (!$ijinKerja) {
            return abort(404);
        }

        return view('ijin-kerja-listrik.index', compact('ijinKerja','jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-listrik.create', compact('jsa'));
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
        $dataPetugasPengawas = $this->dataPetugasPengawas($request);
        $dataPengesahan = $this->dataPengesahan($request);
        $dataUjiKandunganGas = $this->dataUjiKandunganGas($request);
        $dataValidasi = $this->dataValidasi($request);

        $umum               = Umum::create($dataUmum);
        $alatPelindungDiri  = AlatPelindungDiri::create($dataAlatPelindungDiri);
        $dokumenPendukung   = DokumenPendukung::create($dataDokumenPendukung);
        $petugasPengawas    = PetugasPengawas::create($dataPetugasPengawas);
        $pengesahan         = Pengesahan::create($dataPengesahan);
        $ujiKandunganGas    = UjiKandunganGas::create($dataUjiKandunganGas);

        $ijinKerja = IjinKerjaListrik::create([
            'jsa_id'                                                    => $request->jsa_id,
            'umum_id'                                                   => $umum->id,
            'alat_pelindung_diri_id'                                    => $alatPelindungDiri->id,
            'dokumen_pendukung_id'                                      => $dokumenPendukung->id,
            'petugas_pengawas_id'                                       => $petugasPengawas->id,
            'pengesahan_id'                                             => $pengesahan->id,
            'uji_kandungan_gas_id'                                      => $ujiKandunganGas->id,
            'jalur_telah_dibebaskan_dari_aliran_listrik'                => $request->jalur_telah_dibebaskan_dari_aliran_listrik,
            'keterangan_jalur_telah_dibebaskan_dari_aliran_listrik'     => $request->keterangan_jalur_telah_dibebaskan_dari_aliran_listrik,
            'jalur_peralatan_yang_terkait_telah_aman'                   => $request->jalur_peralatan_yang_terkait_telah_aman,
            'keterangan_jalur_peralatan_yang_terkait_telah_aman'        => $request->keterangan_jalur_peralatan_yang_terkait_telah_aman,
            'jalur_telah_pemasangan_kabel'                              => $request->jalur_telah_pemasangan_kabel,
            'keterangan_jalur_telah_pemasangan_kabel'                   => $request->keterangan_jalur_telah_pemasangan_kabel,
            'jalur_telah_peralatan_dalam_keadaan_bergerak'              => $request->jalur_telah_peralatan_dalam_keadaan_bergerak,
            'keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak'   => $request->keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak,
            'jalur_telah_diisolasi_dari_sumber_listrik'                 => $request->jalur_telah_diisolasi_dari_sumber_listrik,
            'keterangan_jalur_telah_diisolasi_dari_sumber_listrik'      => $request->keterangan_jalur_telah_diisolasi_dari_sumber_listrik,
            'jalur_telah_peralatan_dalam_keadaan_panas'                 => $request->jalur_telah_peralatan_dalam_keadaan_panas,
            'keterangan_jalur_telah_peralatan_dalam_keadaan_panas'      => $request->keterangan_jalur_telah_peralatan_dalam_keadaan_panas,
            'tersedia_jalan_masuk_dan_keluar_yang_layak'                => $request->tersedia_jalan_masuk_dan_keluar_yang_layak,
            'keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak'     => $request->keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak,
            'bahan_mudah_terbakar_diamankan'                            => $request->bahan_mudah_terbakar_diamankan,
            'keterangan_bahan_mudah_terbakar_diamankan'                 => $request->keterangan_bahan_mudah_terbakar_diamankan,
            'alat_pemadam_kebaaran_siap_sedia'                          => $request->alat_pemadam_kebaaran_siap_sedia,
            'keterangan_alat_pemadam_kebaaran_siap_sedia'               => $request->keterangan_alat_pemadam_kebaaran_siap_sedia,
            'petugas_pemadam_kebakaran_siap_sedia'                      => $request->petugas_pemadam_kebakaran_siap_sedia,
            'keterangan_petugas_pemadam_kebakaran_siap_sedia'           => $request->keterangan_petugas_pemadam_kebakaran_siap_sedia,
            'pekerjaan_pada_ketinggian_yang_membahayakan'               => $request->pekerjaan_pada_ketinggian_yang_membahayakan,
            'keterangan_pekerjaan_pada_ketinggian_yang_membahayakan'    => $request->keterangan_pekerjaan_pada_ketinggian_yang_membahayakan,
            'perlu_dengan_ijin_kerja_yang_lain'                         => $request->perlu_dengan_ijin_kerja_yang_lain,
            'keterangan_perlu_dengan_ijin_kerja_yang_lain'              => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            'catatan'                                                   => $request->catatan,
        ]);

        if ($request->validasi_hari[0]) {
            for ($i=0; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_listrik_id'   =>  $ijinKerja->id,
                    'validasi_hari'         =>  $request->validasi_hari[$i],
                    'validasi_mulai_hari'   =>  $request->validasi_mulai_hari[$i],
                    'validasi_selesai_hari' =>  $request->validasi_selesai_hari[$i],
                    'nama_pelaksana'        =>  $request->nama_pelaksana[$i],
                    'inisial_pelaksana'     =>  $request->inisial_pelaksana[$i],
                    'nama_pengawas'         =>  $request->nama_pengawas[$i],
                    'inisial_pengawas'      =>  $request->inisial_pengawas[$i],
                ]);
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja listrik berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaListrik  $ijinKerjaListrik
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ijinKerja = IjinKerjaListrik::findOrFail($id);
        return view('ijin-kerja-listrik.show', compact('ijinKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaListrik  $ijinKerjaListrik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ijinKerja = IjinKerjaListrik::findOrFail($id);
        return view('ijin-kerja-listrik.edit', compact('ijinKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ijinKerja = IjinKerjaListrik::find($id);

        if (!$request->catatan) {
            $ijinKerja->update([
                'jalur_telah_dibebaskan_dari_aliran_listrik'                => $request->jalur_telah_dibebaskan_dari_aliran_listrik,
                'keterangan_jalur_telah_dibebaskan_dari_aliran_listrik'     => $request->keterangan_jalur_telah_dibebaskan_dari_aliran_listrik,
                'jalur_peralatan_yang_terkait_telah_aman'                   => $request->jalur_peralatan_yang_terkait_telah_aman,
                'keterangan_jalur_peralatan_yang_terkait_telah_aman'        => $request->keterangan_jalur_peralatan_yang_terkait_telah_aman,
                'jalur_telah_pemasangan_kabel'                              => $request->jalur_telah_pemasangan_kabel,
                'keterangan_jalur_telah_pemasangan_kabel'                   => $request->keterangan_jalur_telah_pemasangan_kabel,
                'jalur_telah_peralatan_dalam_keadaan_bergerak'              => $request->jalur_telah_peralatan_dalam_keadaan_bergerak,
                'keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak'   => $request->keterangan_jalur_telah_peralatan_dalam_keadaan_bergerak,
                'jalur_telah_diisolasi_dari_sumber_listrik'                 => $request->jalur_telah_diisolasi_dari_sumber_listrik,
                'keterangan_jalur_telah_diisolasi_dari_sumber_listrik'      => $request->keterangan_jalur_telah_diisolasi_dari_sumber_listrik,
                'jalur_telah_peralatan_dalam_keadaan_panas'                 => $request->jalur_telah_peralatan_dalam_keadaan_panas,
                'keterangan_jalur_telah_peralatan_dalam_keadaan_panas'      => $request->keterangan_jalur_telah_peralatan_dalam_keadaan_panas,
                'tersedia_jalan_masuk_dan_keluar_yang_layak'                => $request->tersedia_jalan_masuk_dan_keluar_yang_layak,
                'keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak'     => $request->keterangan_tersedia_jalan_masuk_dan_keluar_yang_layak,
                'bahan_mudah_terbakar_diamankan'                            => $request->bahan_mudah_terbakar_diamankan,
                'keterangan_bahan_mudah_terbakar_diamankan'                 => $request->keterangan_bahan_mudah_terbakar_diamankan,
                'alat_pemadam_kebaaran_siap_sedia'                          => $request->alat_pemadam_kebaaran_siap_sedia,
                'keterangan_alat_pemadam_kebaaran_siap_sedia'               => $request->keterangan_alat_pemadam_kebaaran_siap_sedia,
                'petugas_pemadam_kebakaran_siap_sedia'                      => $request->petugas_pemadam_kebakaran_siap_sedia,
                'keterangan_petugas_pemadam_kebakaran_siap_sedia'           => $request->keterangan_petugas_pemadam_kebakaran_siap_sedia,
                'pekerjaan_pada_ketinggian_yang_membahayakan'               => $request->pekerjaan_pada_ketinggian_yang_membahayakan,
                'keterangan_pekerjaan_pada_ketinggian_yang_membahayakan'    => $request->keterangan_pekerjaan_pada_ketinggian_yang_membahayakan,
                'perlu_dengan_ijin_kerja_yang_lain'                         => $request->perlu_dengan_ijin_kerja_yang_lain,
                'keterangan_perlu_dengan_ijin_kerja_yang_lain'              => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            ]);
        } else {
            $ijinKerja->update([
                'catatan'  => $request->catatan,
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja listrik berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaListrik  $ijinKerjaListrik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijinKerjaListrik = IjinKerjaListrik::find($id);
        $ijinKerjaListrik->delete();
        return back()->with('success', 'Ijin kerja listrik berhasil dihapus');
    }

    public function cetak($id)
    {
        return "Belum dibuat pdf nya";
    }
}
