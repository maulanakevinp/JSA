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
        $dataUmum = $request->validate([
            'nomor'                 => ['required', 'string', 'max:128'],
            'tanggal_pengesahan'    => ['required', 'date', 'after:yesterday'],
            'tanggal_mulai'         => ['required', 'after:yesterday'],
            'tanggal_selesai'       => ['required', 'after:tanggal_mulai'],
            'lokasi_pekerjaan'      => ['required', 'string', 'max:128'],
            'uraian_pekerjaan'      => ['required'],
        ],[
            'tanggal_pengesahan.after'  => 'tanggal pengesahan harus sesudahnya kemarin',
            'tanggal_mulai.after'       => 'tanggal mulai harus sesudahnya kemarin',
        ]);

        $dataJenisPekerjaan = $request->validate([
            'menimbulkan_api'               => ['nullable'],
            'menimbulkan_bunga_api'         => ['nullable'],
            'alat_potong'                   => ['nullable'],
            'hot_tapping_jenis_pekerjaan'   => ['nullable'],
            'menyalakan_flare'              => ['nullable'],
            'lainnya_jenis_pekerjaan'       => ['nullable'],
        ]);

        $dataSumberBahayaAlat = $request->validate([
            'alat_listrik'                      => ['nullable'],
            'moving_part'                       => ['nullable'],
            'crane'                             => ['nullable'],
            'generator_or_compressor'           => ['nullable'],
            'akses_sulit'                       => ['nullable'],
            'gas'                               => ['nullable'],
            'bahan_kimia'                       => ['nullable'],
            'bising'                            => ['nullable'],
            'kejatuhan'                         => ['nullable'],
            'media_panas_or_dingin'             => ['nullable'],
            'ergonomi'                          => ['nullable'],
            'bertekanan'                        => ['nullable'],
            'mudah_terbakar'                    => ['nullable'],
            'biologi'                           => ['nullable'],
            'blasting'                          => ['nullable'],
            'penggalan'                         => ['nullable'],
            'hot_tapping_sumber_bahaya_alat'    => ['nullable'],
            'pengelasan'                        => ['nullable'],
            'grinding'                          => ['nullable'],
            'cuaca_buruk'                       => ['nullable'],
            'materi_berbahaya'                  => ['nullable'],
            'pilling'                           => ['nullable'],
            'paparang_panas_matahari'           => ['nullable'],
            'pigging'                           => ['nullable'],
            'lifting'                           => ['nullable'],
            'drilling'                          => ['nullable'],
            'uji_bertekanan'                    => ['nullable'],
            'hot_cutting'                       => ['nullable'],
            'bongkar_muat'                      => ['nullable'],
            'power_bushing'                     => ['nullable'],
            'interlock_bypass'                  => ['nullable'],
            'lainnya_sumber_bahaya_alat'        => ['nullable'],
        ]);

        $dataAlatPelindungDiri = $request->validate([
            'safety_helmet'                 => ['nullable'],
            'safety_glass'                  => ['nullable'],
            'goggle'                        => ['nullable'],
            'face_shield'                   => ['nullable'],
            'others_kepala'                 => ['nullable'],
            'keterangan_others_kepala'      => ['nullable'],
            'ear_plug'                      => ['nullable'],
            'ear_muff'                      => ['nullable'],
            'others_telinga'                => ['nullable'],
            'keterangan_others_telinga'     => ['nullable'],
            'safety_shoes_or_boot'          => ['nullable'],
            'safety_rain_boot'              => ['nullable'],
            'electrical_shoes_or_boot'      => ['nullable'],
            'others_kaki'                   => ['nullable'],
            'keterangan_others_kaki'        => ['nullable'],
            'half_mask_respirator'          => ['nullable'],
            'full_face'                     => ['nullable'],
            'dust_mask'                     => ['nullable'],
            'scba_or_airline_set'           => ['nullable'],
            'others_pernapasan'             => ['nullable'],
            'keterangan_others_pernapasan'  => ['nullable'],
            'cotton_glove'                  => ['nullable'],
            'leather_glove'                 => ['nullable'],
            'rubber_glove'                  => ['nullable'],
            'chemical_glove'                => ['nullable'],
            'others_tangan'                 => ['nullable'],
            'keterangan_others_tangan'      => ['nullable'],
            'coverall'                      => ['nullable'],
            'chemical_suit'                 => ['nullable'],
            'apron'                         => ['nullable'],
            'life_vest'                     => ['nullable'],
            'others_badan'                  => ['nullable'],
            'keterangan_others_badan'       => ['nullable'],
            'full_body_harness'             => ['nullable'],
            'safety_line'                   => ['nullable'],
            'others_ketinggian'             => ['nullable'],
            'keterangan_others_ketinggian'  => ['nullable'],
        ]);

        $dataDokumenPendukung = $request->validate([
            'a' => ['nullable'],
            'b' => ['nullable'],
            'c' => ['nullable'],
            'd' => ['nullable'],
            'e' => ['nullable'],
        ]);

        $dataUjiKandunganGas = $request->validate([
            'o2'                                    => ['nullable'],
            'sebelum_pelaksanaan_pekerjaan1'        => ['nullable'],
            'waktu_pelaksanaan_pekerjaan_setiap1'   => ['nullable'],
            'waktu_pelaksanaan_pekerjaan1'          => ['nullable'],
            'toxic'                                 => ['nullable'],
            'sebelum_pelaksanaan_pekerjaan2'        => ['nullable'],
            'waktu_pelaksanaan_pekerjaan_setiap2'   => ['nullable'],
            'waktu_pelaksanaan_pekerjaan2'          => ['nullable'],
            'combustible'                           => ['nullable'],
            'sebelum_pelaksanaan_pekerjaan3'        => ['nullable'],
            'waktu_pelaksanaan_pekerjaan_setiap3'   => ['nullable'],
            'waktu_pelaksanaan_pekerjaan3'          => ['nullable'],
        ]);

        $dataPetugasPengawas = $request->validate([
            'nama_petugas_isolasi_listrik'      => ['required', 'string', 'max:64'],
            'jabatan_petugas_isolasi_listrik'   => ['required', 'string', 'max:64'],
            'tanggal_petugas_isolasi_listrik'   => ['required', 'date', 'after:yesterday'],
            'nama_petugas_uji_kandungan_gas'    => ['required', 'string', 'max:64'],
            'jabatan_petugas_uji_kandungan_gas' => ['required', 'string', 'max:64'],
            'tanggal_petugas_uji_kandungan_gas' => ['required', 'date', 'after:yesterday'],
        ],[
            'tanggal_petugas_isolasi_listrik.after' => 'tanggal petugas isolasi listrik harus sesudahnya kemarin',
            'tanggal_petugas_uji_kandungan_gas.after'       => 'tanggal uji kandungan gas harus sesudahnya kemarin',
        ]);

        $dataPengesahan = $request->validate([
            'nama_pelaksana_pekerjaan'          => ['required', 'string', 'max:64'],
            'jabatan_pelaksana_pekerjaan'       => ['required', 'string', 'max:64'],
            'tanggal_pelaksana_pekerjaan'       => ['required', 'date', 'after:yesterday'],
            'nama_penanggung_jawab_area'       => ['required', 'string', 'max:64'],
            'jabatan_penanggung_jawab_area'    => ['required', 'string', 'max:64'],
            'tanggal_penanggung_jawab_area'    => ['required', 'date', 'after:yesterday'],
        ],[
            'tanggal_pelaksana_pekerjaan.after'     => 'tanggal petugas isolasi listrik harus sesudahnya kemarin',
            'tanggal_penanggung_jawab_area.after'  => 'tanggal uji kandungan gas harus sesudahnya kemarin',
        ]);

        $dataValidasi = $request->validate([
            'validasi_hari.*'           => ['required', 'date', 'after:yesterday'],
            'validas_mulai_hari.*'      => ['required'],
            'validasi_selesai_hari.*'   => ['required'],
            'nama_pelaksana.*'          => ['required', 'string', 'max:64'],
            'inisial_pelaksana.*'       => ['required', 'string', 'max:64'],
            'nama_pengawas.*'           => ['required', 'string', 'max:64'],
            'inisial_pengawas.*'        => ['required', 'string', 'max:64'],
        ]);

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

        if ($request->validasi[0]) {
            for ($i=0; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_panas_id'   =>  $ijinKerja->id,
                    'validasi_hari'         =>  $request->validasi_hari[$i],
                    'validasi_mulai_hari'    =>  $request->validasi_mulai_hari[$i],
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
    public function edit(IjinKerjaPanas $ijinKerjaPanas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IjinKerjaPanas $ijinKerjaPanas)
    {
        //
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
