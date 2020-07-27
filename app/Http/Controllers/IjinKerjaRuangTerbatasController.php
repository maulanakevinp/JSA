<?php

namespace App\Http\Controllers;

use App\AlatPelindungDiri;
use App\DokumenPendukung;
use App\IjinKerjaRuangTerbatas;
use App\Jsa;
use App\Pengesahan;
use App\PetugasPengawas;
use App\UjiKandunganGas;
use App\Umum;
use App\Validasi;
use Illuminate\Http\Request;

class IjinKerjaRuangTerbatasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $ijinKerja = IjinKerjaRuangTerbatas::where('jsa_id', $id)->paginate(12);
        $jsa = Jsa::findOrFail($id);
        if (!$ijinKerja) {
            return abort(404);
        }

        return view('ijin-kerja-ruang-terbatas.index', compact('ijinKerja','jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-ruang-terbatas.create', compact('jsa'));
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
        $dataUjiKandunganGas = $this->dataUjiKandunganGas($request);
        $dataPetugasPengawas = $this->dataPetugasPengawas($request);
        $dataPengesahan = $this->dataPengesahan($request);
        $dataValidasi = $this->dataValidasi($request);

        $umum               = Umum::create($dataUmum);
        $alatPelindungDiri  = AlatPelindungDiri::create($dataAlatPelindungDiri);
        $dokumenPendukung   = DokumenPendukung::create($dataDokumenPendukung);
        $ujiKandunganGas    = UjiKandunganGas::create($dataUjiKandunganGas);
        $petugasPengawas    = PetugasPengawas::create($dataPetugasPengawas);
        $pengesahan         = Pengesahan::create($dataPengesahan);

        $ijinKerja = IjinKerjaRuangTerbatas::create([
            'jsa_id'                                                        => $request->jsa_id,
            'umum_id'                                                       => $umum->id,
            'alat_pelindung_diri_id'                                        => $alatPelindungDiri->id,
            'dokumen_pendukung_id'                                          => $dokumenPendukung->id,
            'uji_kandungan_gas_id'                                          => $ujiKandunganGas->id,
            'petugas_pengawas_id'                                           => $petugasPengawas->id,
            'pengesahan_id'                                                 => $pengesahan->id,
            'ruang_terbatas_dibebaskan_dari_tekanan'                        => $request->ruang_terbatas_dibebaskan_dari_tekanan,
            'keterangan_ruang_terbatas_dibebaskan_dari_tekanan'             => $request->keterangan_ruang_terbatas_dibebaskan_dari_tekanan,
            'ruang_terbatas_dikosongkan_atau_drain'                         => $request->ruang_terbatas_dikosongkan_atau_drain,
            'keterangan_ruang_terbatas_dikosongkan_atau_drain'              => $request->keterangan_ruang_terbatas_dikosongkan_atau_drain,
            'ruang_terbatas_diisolasi'                                      => $request->ruang_terbatas_diisolasi,
            'keterangan_ruang_terbatas_diisolasi'                           => $request->keterangan_ruang_terbatas_diisolasi,
            'listrik_or_hidrolik_diluar_dan_didalam_ruangan'                => $request->listrik_or_hidrolik_diluar_dan_didalam_ruangan,
            'keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan'     => $request->keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan,
            'aman_dari_kandungan_gas_beracun_dan_mudah_terbakar'            => $request->aman_dari_kandungan_gas_beracun_dan_mudah_terbakar,
            'keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar' => $request->keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar,
            'kandungan_oksigen_mencukupi'                                   => $request->kandungan_oksigen_mencukupi,
            'keterangan_kandungan_oksigen_mencukupi'                        => $request->keterangan_kandungan_oksigen_mencukupi,
            'ventilasi_udara_pembantu_tersedia'                             => $request->ventilasi_udara_pembantu_tersedia,
            'keterangan_ventilasi_udara_pembantu_tersedia'                  => $request->keterangan_ventilasi_udara_pembantu_tersedia,
            'terdapat_kerja_panas_di_ruangan_terbatas'                      => $request->terdapat_kerja_panas_di_ruangan_terbatas,
            'keterangan_terdapat_kerja_panas_di_ruangan_terbatas'           => $request->keterangan_terdapat_kerja_panas_di_ruangan_terbatas,
            'terdapat_pekerjaan_radiografi_di_ruangan_terbatas'             => $request->terdapat_pekerjaan_radiografi_di_ruangan_terbatas,
            'keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas'  => $request->keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas,
            'perlu_dengan_ijin_kerja_yang_lain'                             => $request->perlu_dengan_ijin_kerja_yang_lain,
            'keterangan_perlu_dengan_ijin_kerja_yang_lain'                  => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            'peringatan_bahaya_dan_tanda_batas_tersedia'                    => $request->peringatan_bahaya_dan_tanda_batas_tersedia,
            'keterangan_peringatan_bahaya_dan_tanda_batas_tersedia'         => $request->keterangan_peringatan_bahaya_dan_tanda_batas_tersedia,
            'semua_alat_kerja_penunjang_aman_untuk_digunakan'               => $request->semua_alat_kerja_penunjang_aman_untuk_digunakan,
            'keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan'    => $request->keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan,
            'pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas'              => $request->pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas,
            'keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas'   => $request->keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas,
            'semua_pekerja_telah_lengkap_alat_pelindung_diri'               => $request->semua_pekerja_telah_lengkap_alat_pelindung_diri,
            'keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri'    => $request->keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri,
            'catatan'                                                       => $request->catatan,
        ]);

        try {
            for ($i=0; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_ruang_terbatas_id'  =>  $ijinKerja->id,
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
            'message'   => 'Ijin kerja memasuki ruang terbatas berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaRuangTerbatas  $ijinKerjaRuangTerbatas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ijinKerja = IjinKerjaRuangTerbatas::findOrFail($id);
        return view('ijin-kerja-ruang-terbatas.show', compact('ijinKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaRuangTerbatas  $ijinKerjaRuangTerbatas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ijinKerja = IjinKerjaRuangTerbatas::findOrFail($id);
        return view('ijin-kerja-ruang-terbatas.edit', compact('ijinKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ijinKerja = IjinKerjaRuangTerbatas::find($id);

        if (!$request->catatan) {
            $ijinKerja->update([
                'ruang_terbatas_dibebaskan_dari_tekanan'                        => $request->ruang_terbatas_dibebaskan_dari_tekanan,
                'keterangan_ruang_terbatas_dibebaskan_dari_tekanan'             => $request->keterangan_ruang_terbatas_dibebaskan_dari_tekanan,
                'ruang_terbatas_dikosongkan_atau_drain'                         => $request->ruang_terbatas_dikosongkan_atau_drain,
                'keterangan_ruang_terbatas_dikosongkan_atau_drain'              => $request->keterangan_ruang_terbatas_dikosongkan_atau_drain,
                'ruang_terbatas_diisolasi'                                      => $request->ruang_terbatas_diisolasi,
                'keterangan_ruang_terbatas_diisolasi'                           => $request->keterangan_ruang_terbatas_diisolasi,
                'listrik_or_hidrolik_diluar_dan_didalam_ruangan'                => $request->listrik_or_hidrolik_diluar_dan_didalam_ruangan,
                'keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan'     => $request->keterangan_listrik_or_hidrolik_diluar_dan_didalam_ruangan,
                'aman_dari_kandungan_gas_beracun_dan_mudah_terbakar'            => $request->aman_dari_kandungan_gas_beracun_dan_mudah_terbakar,
                'keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar' => $request->keterangan_aman_dari_kandungan_gas_beracun_dan_mudah_terbakar,
                'kandungan_oksigen_mencukupi'                                   => $request->kandungan_oksigen_mencukupi,
                'keterangan_kandungan_oksigen_mencukupi'                        => $request->keterangan_kandungan_oksigen_mencukupi,
                'ventilasi_udara_pembantu_tersedia'                             => $request->ventilasi_udara_pembantu_tersedia,
                'keterangan_ventilasi_udara_pembantu_tersedia'                  => $request->keterangan_ventilasi_udara_pembantu_tersedia,
                'terdapat_kerja_panas_di_ruangan_terbatas'                      => $request->terdapat_kerja_panas_di_ruangan_terbatas,
                'keterangan_terdapat_kerja_panas_di_ruangan_terbatas'           => $request->keterangan_terdapat_kerja_panas_di_ruangan_terbatas,
                'terdapat_pekerjaan_radiografi_di_ruangan_terbatas'             => $request->terdapat_pekerjaan_radiografi_di_ruangan_terbatas,
                'keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas'  => $request->keterangan_terdapat_pekerjaan_radiografi_di_ruangan_terbatas,
                'perlu_dengan_ijin_kerja_yang_lain'                             => $request->perlu_dengan_ijin_kerja_yang_lain,
                'keterangan_perlu_dengan_ijin_kerja_yang_lain'                  => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
                'peringatan_bahaya_dan_tanda_batas_tersedia'                    => $request->peringatan_bahaya_dan_tanda_batas_tersedia,
                'keterangan_peringatan_bahaya_dan_tanda_batas_tersedia'         => $request->keterangan_peringatan_bahaya_dan_tanda_batas_tersedia,
                'semua_alat_kerja_penunjang_aman_untuk_digunakan'               => $request->semua_alat_kerja_penunjang_aman_untuk_digunakan,
                'keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan'    => $request->keterangan_semua_alat_kerja_penunjang_aman_untuk_digunakan,
                'pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas'              => $request->pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas,
                'keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas'   => $request->keterangan_pekerja_terlatih_untuk_masuk_ke_ruangan_terbatas,
                'semua_pekerja_telah_lengkap_alat_pelindung_diri'               => $request->semua_pekerja_telah_lengkap_alat_pelindung_diri,
                'keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri'    => $request->keterangan_semua_pekerja_telah_lengkap_alat_pelindung_diri,
            ]);
        } else {
            $ijinKerja->update([
                'catatan'  => $request->catatan,
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja ruang terbuka berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaRuangTerbatas  $ijinKerjaRuangTerbatas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijinKerjaRuangTerbatas = IjinKerjaRuangTerbatas::find($id);
        $ijinKerjaRuangTerbatas->delete();
        return back()->with('success', 'Ijin kerja memasuki ruang terbatas berhasil dihapus');
    }

    public function cetak($id)
    {
        return "Belum dibuat pdf nya";
    }
}
