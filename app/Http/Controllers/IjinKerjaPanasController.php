<?php

namespace App\Http\Controllers;

use App\AlatPelindungDiri;
use App\DokumenPendukung;
use App\IjinKerjaPanas;
use App\JenisPekerjaan;
use App\Jsa;
use App\Pengesahan;
use App\PetugasPengawas;
use App\SumberBahayaAlat;
use App\UjiKandunganGas;
use App\Umum;
use App\Validasi;
use Illuminate\Http\Request;

class IjinKerjaPanasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $ijinKerja = IjinKerjaPanas::where('jsa_id', $id)->paginate(12);
        $jsa = Jsa::findOrFail($id);
        if (!$ijinKerja) {
            return abort(404);
        }

        return view('ijin-kerja-panas.index', compact('ijinKerja','jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-panas.create', compact('jsa'));
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
        $dataJenisPekerjaan = $this->dataJenisPekerjaan($request);
        $dataSumberBahayaAlat = $this->dataSumberBahayaAlat($request);
        $dataAlatPelindungDiri = $this->dataAlatPelindungDiri($request);
        $dataDokumenPendukung = $this->dataDokumenPendukung($request);
        $dataUjiKandunganGas = $this->dataUjiKandunganGas($request);
        $dataPetugasPengawas = $this->dataPetugasPengawas($request);
        $dataPengesahan = $this->dataPengesahan($request);
        $dataValidasi = $this->dataValidasi($request);

        $umum               = Umum::create($dataUmum);
        $jenisPekerjaan     = JenisPekerjaan::create($dataJenisPekerjaan);
        $sumberBahayaAlat   = SumberBahayaAlat::create($dataSumberBahayaAlat);
        $alatPelindungDiri  = AlatPelindungDiri::create($dataAlatPelindungDiri);
        $dokumenPendukung   = DokumenPendukung::create($dataDokumenPendukung);
        $ujiKandunganGas    = UjiKandunganGas::create($dataUjiKandunganGas);
        $petugasPengawas    = PetugasPengawas::create($dataPetugasPengawas);
        $pengesahan         = Pengesahan::create($dataPengesahan);

        $ijinKerja = IjinKerjaPanas::create([
            'jsa_id'                                                            => $request->jsa_id,
            'umum_id'                                                           => $umum->id,
            'jenis_pekerjaan_id'                                                => $jenisPekerjaan->id,
            'sumber_bahaya_alat_id'                                             => $sumberBahayaAlat->id,
            'alat_pelindung_diri_id'                                            => $alatPelindungDiri->id,
            'dokumen_pendukung_id'                                              => $dokumenPendukung->id,
            'uji_kandungan_gas_id'                                              => $ujiKandunganGas->id,
            'petugas_pengawas_id'                                               => $petugasPengawas->id,
            'pengesahan_id'                                                     => $pengesahan->id,
            'jalur_dibebaskan_dari_tekanan'                                     => $request->jalur_dibebaskan_dari_tekanan,
            'jalur_dikosongkan_atau_drain'                                      => $request->jalur_dikosongkan_atau_drain,
            'jalur_diisolasi_dengan_blanking'                                   => $request->jalur_diisolasi_dengan_blanking,
            'jalur_diisolasi_dengan_dilepas'                                    => $request->jalur_diisolasi_dengan_dilepas,
            'jalur_diisolasi_dengan_kerangan_dikunci'                           => $request->jalur_diisolasi_dengan_kerangan_dikunci,
            'jalur_diisolasi_dengan_diberi_label'                               => $request->jalur_diisolasi_dengan_diberi_label,
            'jalur_didorong_atau_flush_dengan_air'                              => $request->jalur_didorong_atau_flush_dengan_air,
            'jalur_dinginkan_secara_alamiah_atau_mekanis'                       => $request->jalur_dinginkan_secara_alamiah_atau_mekanis,
            'semua_saluran_drain_dan_kerangan_pada_jarak_15m'                   => $request->semua_saluran_drain_dan_kerangan_pada_jarak_15m,
            'bahan_mudah_terbakar_diamankan'                                    => $request->bahan_mudah_terbakar_diamankan,
            'alat_pemadam_kebakaran_siap_sedia'                                 => $request->alat_pemadam_kebakaran_siap_sedia,
            'petugas_pemadam_kebakaran_siap_sedia'                              => $request->petugas_pemadam_kebakaran_siap_sedia,
            'semua_peralatan_las_telah_diamankan'                               => $request->semua_peralatan_las_telah_diamankan,
            'pekerjaan_harus_terus_dibasahi_dengan_air'                         => $request->pekerjaan_harus_terus_dibasahi_dengan_air,
            'perlu_dengan_ijin_kerja_yang_lain'                                 => $request->perlu_dengan_ijin_kerja_yang_lain,
            'semua_mesin_telah_diamankan'                                       => $request->semua_mesin_telah_diamankan,
            'semua_pekerjaan_telah_disetujui_untuk_penggalian'                  => $request->semua_pekerjaan_telah_disetujui_untuk_penggalian,
            'semua_peralatan_listrik_telah_diisolasi'                           => $request->semua_peralatan_listrik_telah_diisolasi,
            'semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang'             => $request->semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang,
            'keterangan_jalur_dibebaskan_dari_tekanan'                          => $request->keterangan_jalur_dibebaskan_dari_tekanan,
            'keterangan_jalur_dikosongkan_atau_drain'                           => $request->keterangan_jalur_dikosongkan_atau_drain,
            'keterangan_jalur_diisolasi_dengan_blanking'                        => $request->keterangan_jalur_diisolasi_dengan_blanking,
            'keterangan_jalur_diisolasi_dengan_dilepas'                         => $request->keterangan_jalur_diisolasi_dengan_dilepas,
            'keterangan_jalur_diisolasi_dengan_kerangan_dikunci'                => $request->keterangan_jalur_diisolasi_dengan_kerangan_dikunci,
            'keterangan_jalur_diisolasi_dengan_diberi_label'                    => $request->keterangan_jalur_diisolasi_dengan_diberi_label,
            'keterangan_jalur_didorong_atau_flush_dengan_air'                   => $request->keterangan_jalur_didorong_atau_flush_dengan_air,
            'keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis'            => $request->keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis,
            'keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m'        => $request->keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m,
            'keterangan_bahan_mudah_terbakar_diamankan'                         => $request->keterangan_bahan_mudah_terbakar_diamankan,
            'keterangan_alat_pemadam_kebakaran_siap_sedia'                      => $request->keterangan_alat_pemadam_kebakaran_siap_sedia,
            'keterangan_petugas_pemadam_kebakaran_siap_sedia'                   => $request->keterangan_petugas_pemadam_kebakaran_siap_sedia,
            'keterangan_semua_peralatan_las_telah_diamankan'                    => $request->keterangan_semua_peralatan_las_telah_diamankan,
            'keterangan_pekerjaan_harus_terus_dibasahi_dengan_air'              => $request->keterangan_pekerjaan_harus_terus_dibasahi_dengan_air,
            'keterangan_perlu_dengan_ijin_kerja_yang_lain'                      => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            'keterangan_semua_mesin_telah_diamankan'                            => $request->keterangan_semua_mesin_telah_diamankan,
            'keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian'       => $request->keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian,
            'keterangan_semua_peralatan_listrik_telah_diisolasi'                => $request->keterangan_semua_peralatan_listrik_telah_diisolasi,
            'keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang'  => $request->keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang,
            'catatan'                                                           => $request->catatan,
        ]);

        try {
            for ($i=0; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_panas_id' =>  $ijinKerja->id,
                    'validasi_hari'         =>  $request->validasi_hari[$i],
                    'validasi_mulai_hari'   =>  $request->validasi_mulai_hari[$i],
                    'validasi_selesai_hari' =>  $request->validasi_selesai_hari[$i],
                    'nama_pelaksana'        =>  $request->nama_pelaksana[$i],
                    'inisial_pelaksana'     =>  $request->inisial_pelaksana[$i],
                    'nama_pengawas'         =>  $request->nama_pengawas[$i],
                    'inisial_pengawas'      =>  $request->inisial_pengawas[$i],
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja panas berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ijinKerja = IjinKerjaPanas::findOrFail($id);
        return view('ijin-kerja-panas.show', compact('ijinKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ijinKerja = IjinKerjaPanas::findOrFail($id);
        return view('ijin-kerja-panas.edit', compact('ijinKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ijinKerja = IjinKerjaPanas::find($id);

        if (!$request->catatan) {
            $ijinKerja->update([
                'jalur_dibebaskan_dari_tekanan'                                     => $request->jalur_dibebaskan_dari_tekanan,
                'jalur_dikosongkan_atau_drain'                                      => $request->jalur_dikosongkan_atau_drain,
                'jalur_diisolasi_dengan_blanking'                                   => $request->jalur_diisolasi_dengan_blanking,
                'jalur_diisolasi_dengan_dilepas'                                    => $request->jalur_diisolasi_dengan_dilepas,
                'jalur_diisolasi_dengan_kerangan_dikunci'                           => $request->jalur_diisolasi_dengan_kerangan_dikunci,
                'jalur_diisolasi_dengan_diberi_label'                               => $request->jalur_diisolasi_dengan_diberi_label,
                'jalur_didorong_atau_flush_dengan_air'                              => $request->jalur_didorong_atau_flush_dengan_air,
                'jalur_dinginkan_secara_alamiah_atau_mekanis'                       => $request->jalur_dinginkan_secara_alamiah_atau_mekanis,
                'semua_saluran_drain_dan_kerangan_pada_jarak_15m'                   => $request->semua_saluran_drain_dan_kerangan_pada_jarak_15m,
                'bahan_mudah_terbakar_diamankan'                                    => $request->bahan_mudah_terbakar_diamankan,
                'alat_pemadam_kebakaran_siap_sedia'                                 => $request->alat_pemadam_kebakaran_siap_sedia,
                'petugas_pemadam_kebakaran_siap_sedia'                              => $request->petugas_pemadam_kebakaran_siap_sedia,
                'semua_peralatan_las_telah_diamankan'                               => $request->semua_peralatan_las_telah_diamankan,
                'pekerjaan_harus_terus_dibasahi_dengan_air'                         => $request->pekerjaan_harus_terus_dibasahi_dengan_air,
                'perlu_dengan_ijin_kerja_yang_lain'                                 => $request->perlu_dengan_ijin_kerja_yang_lain,
                'semua_mesin_telah_diamankan'                                       => $request->semua_mesin_telah_diamankan,
                'semua_pekerjaan_telah_disetujui_untuk_penggalian'                  => $request->semua_pekerjaan_telah_disetujui_untuk_penggalian,
                'semua_peralatan_listrik_telah_diisolasi'                           => $request->semua_peralatan_listrik_telah_diisolasi,
                'semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang'             => $request->semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang,
                'keterangan_jalur_dibebaskan_dari_tekanan'                          => $request->keterangan_jalur_dibebaskan_dari_tekanan,
                'keterangan_jalur_dikosongkan_atau_drain'                           => $request->keterangan_jalur_dikosongkan_atau_drain,
                'keterangan_jalur_diisolasi_dengan_blanking'                        => $request->keterangan_jalur_diisolasi_dengan_blanking,
                'keterangan_jalur_diisolasi_dengan_dilepas'                         => $request->keterangan_jalur_diisolasi_dengan_dilepas,
                'keterangan_jalur_diisolasi_dengan_kerangan_dikunci'                => $request->keterangan_jalur_diisolasi_dengan_kerangan_dikunci,
                'keterangan_jalur_diisolasi_dengan_diberi_label'                    => $request->keterangan_jalur_diisolasi_dengan_diberi_label,
                'keterangan_jalur_didorong_atau_flush_dengan_air'                   => $request->keterangan_jalur_didorong_atau_flush_dengan_air,
                'keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis'            => $request->keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis,
                'keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m'        => $request->keterangan_semua_saluran_drain_dan_kerangan_pada_jarak_15m,
                'keterangan_bahan_mudah_terbakar_diamankan'                         => $request->keterangan_bahan_mudah_terbakar_diamankan,
                'keterangan_alat_pemadam_kebakaran_siap_sedia'                      => $request->keterangan_alat_pemadam_kebakaran_siap_sedia,
                'keterangan_petugas_pemadam_kebakaran_siap_sedia'                   => $request->keterangan_petugas_pemadam_kebakaran_siap_sedia,
                'keterangan_semua_peralatan_las_telah_diamankan'                    => $request->keterangan_semua_peralatan_las_telah_diamankan,
                'keterangan_pekerjaan_harus_terus_dibasahi_dengan_air'              => $request->keterangan_pekerjaan_harus_terus_dibasahi_dengan_air,
                'keterangan_perlu_dengan_ijin_kerja_yang_lain'                      => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
                'keterangan_semua_mesin_telah_diamankan'                            => $request->keterangan_semua_mesin_telah_diamankan,
                'keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian'       => $request->keterangan_semua_pekerjaan_telah_disetujui_untuk_penggalian,
                'keterangan_semua_peralatan_listrik_telah_diisolasi'                => $request->keterangan_semua_peralatan_listrik_telah_diisolasi,
                'keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang'  => $request->keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang,
            ]);
        } else {
            $ijinKerja->update([
                'catatan'  => $request->catatan,
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja panas berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijinKerjaPanas = IjinKerjaPanas::find($id);
        $ijinKerjaPanas->delete();
        return back()->with('success', 'Ijin kerja panas berhasil dihapus');
    }

    public function cetak($id)
    {
        return "Belum dibuat pdf nya";
    }
}
