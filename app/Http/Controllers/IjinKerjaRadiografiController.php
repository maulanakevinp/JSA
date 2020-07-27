<?php

namespace App\Http\Controllers;


use App\AlatPelindungDiri;
use App\DokumenPendukung;
use App\IjinKerjaRadiografi;
use App\Jsa;
use App\Pengesahan;
use App\Umum;
use App\Validasi;
use Illuminate\Http\Request;

class IjinKerjaRadiografiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $ijinKerja = IjinKerjaRadiografi::where('jsa_id', $id)->paginate(12);
        $jsa = Jsa::findOrFail($id);
        if (!$ijinKerja) {
            return abort(404);
        }

        return view('ijin-kerja-radiografi.index', compact('ijinKerja','jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-radiografi.create', compact('jsa'));
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

        $request->validate([
            'nama_perusahaan'   => ['required', 'string', 'max:128'],
            'no_lisensi'        => ['required', 'string', 'max:128'],
            'sumber_radioaktif' => ['required', 'string', 'max:128'],
            'proyektor'         => ['required', 'string', 'max:128'],
            'survey_meter'      => ['required', 'string', 'max:128'],
            'tanggal_service'   => ['required', 'date'],
            'tanggal_kalibrasi' => ['required', 'date'],
        ]);

        $dataDokumenPendukung = $this->dataDokumenPendukung($request);
        $dataPengesahan = $this->dataPengesahan($request);
        $dataValidasi = $this->dataValidasi($request);

        $umum               = Umum::create($dataUmum);
        $alatPelindungDiri  = AlatPelindungDiri::create($dataAlatPelindungDiri);
        $dokumenPendukung   = DokumenPendukung::create($dataDokumenPendukung);
        $pengesahan         = Pengesahan::create($dataPengesahan);

        $ijinKerja = IjinKerjaRadiografi::create([
            'jsa_id'                                                        => $request->jsa_id,
            'umum_id'                                                       => $umum->id,
            'alat_pelindung_diri_id'                                        => $alatPelindungDiri->id,
            'dokumen_pendukung_id'                                          => $dokumenPendukung->id,
            'pengesahan_id'                                                 => $pengesahan->id,
            'nama_perusahaan'                                               => $request->nama_perusahaan,
            'no_lisensi'                                                    => $request->no_lisensi,
            'sumber_radioaktif'                                             => $request->sumber_radioaktif,
            'proyektor'                                                     => $request->proyektor,
            'survey_meter'                                                  => $request->survey_meter,
            'tanggal_service'                                               => $request->tanggal_service,
            'tanggal_kalibrasi'                                             => $request->tanggal_kalibrasi,
            'peralatan_dapat_dioperasikan_jarak_jauh'                       => $request->peralatan_dapat_dioperasikan_jarak_jauh,
            'keterangan_peralatan_dapat_dioperasikan_jarak_jauh'            => $request->keterangan_peralatan_dapat_dioperasikan_jarak_jauh,
            'petugas_pemadam_kebakaran_siap_sedia'                          => $request->petugas_pemadam_kebakaran_siap_sedia,
            'keterangan_petugas_pemadam_kebakaran_siap_sedia'               => $request->keterangan_petugas_pemadam_kebakaran_siap_sedia,
            'penghalang_dan_tanda_bahaya_radiasi_siap_tersedia'             => $request->penghalang_dan_tanda_bahaya_radiasi_siap_tersedia,
            'keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia'  => $request->keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia,
            'daerah_bebas_dari_orang_tidak_berkepentingan'                  => $request->daerah_bebas_dari_orang_tidak_berkepentingan,
            'keterangan_daerah_bebas_dari_orang_tidak_berkepentingan'       => $request->keterangan_daerah_bebas_dari_orang_tidak_berkepentingan,
            'hubungan_radio_hanya_dengan_ccr'                               => $request->hubungan_radio_hanya_dengan_ccr,
            'keterangan_hubungan_radio_hanya_dengan_ccr'                    => $request->keterangan_hubungan_radio_hanya_dengan_ccr,
            'semua_peralatan_las_telah_diamankan'                           => $request->semua_peralatan_las_telah_diamankan,
            'keterangan_semua_peralatan_las_telah_diamankan'                => $request->keterangan_semua_peralatan_las_telah_diamankan,
            'pembacaan_hasil_pengukuran_pada_pagar_penghalang'              => $request->pembacaan_hasil_pengukuran_pada_pagar_penghalang,
            'keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang'   => $request->keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang,
            'alat_pemadam_api_siap_sedia'                                   => $request->alat_pemadam_api_siap_sedia,
            'keterangan_alat_pemadam_api_siap_sedia'                        => $request->keterangan_alat_pemadam_api_siap_sedia,
            'perlu_dengan_ijin_kerja_yang_lain'                             => $request->perlu_dengan_ijin_kerja_yang_lain,
            'keterangan_perlu_dengan_ijin_kerja_yang_lain'                  => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            'semua_pekerjaan_telah_lengkap_alat_pelindung_diri'             => $request->semua_pekerjaan_telah_lengkap_alat_pelindung_diri,
            'keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri'  => $request->keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri,
            'catatan'                                                           => $request->catatan,
        ]);

        try {
            for ($i=0; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_listrik_id' =>  $ijinKerja->id,
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
            'message'   => 'Ijin kerja radiografi berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaRadiografi  $ijinKerjaRadiografi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ijinKerja = IjinKerjaRadiografi::findOrFail($id);
        return view('ijin-kerja-radiografi.show', compact('ijinKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaRadiografi  $ijinKerjaRadiografi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ijinKerja = IjinKerjaRadiografi::findOrFail($id);
        return view('ijin-kerja-radiografi.edit', compact('ijinKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ijinKerja = IjinKerjaRadiografi::find($id);

        if (!$request->catatan) {
            $ijinKerja->update([
                'peralatan_dapat_dioperasikan_jarak_jauh'                       => $request->peralatan_dapat_dioperasikan_jarak_jauh,
                'keterangan_peralatan_dapat_dioperasikan_jarak_jauh'            => $request->keterangan_peralatan_dapat_dioperasikan_jarak_jauh,
                'petugas_pemadam_kebakaran_siap_sedia'                          => $request->petugas_pemadam_kebakaran_siap_sedia,
                'keterangan_petugas_pemadam_kebakaran_siap_sedia'               => $request->keterangan_petugas_pemadam_kebakaran_siap_sedia,
                'penghalang_dan_tanda_bahaya_radiasi_siap_tersedia'             => $request->penghalang_dan_tanda_bahaya_radiasi_siap_tersedia,
                'keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia'  => $request->keterangan_penghalang_dan_tanda_bahaya_radiasi_siap_tersedia,
                'daerah_bebas_dari_orang_tidak_berkepentingan'                  => $request->daerah_bebas_dari_orang_tidak_berkepentingan,
                'keterangan_daerah_bebas_dari_orang_tidak_berkepentingan'       => $request->keterangan_daerah_bebas_dari_orang_tidak_berkepentingan,
                'hubungan_radio_hanya_dengan_ccr'                               => $request->hubungan_radio_hanya_dengan_ccr,
                'keterangan_hubungan_radio_hanya_dengan_ccr'                    => $request->keterangan_hubungan_radio_hanya_dengan_ccr,
                'semua_peralatan_las_telah_diamankan'                           => $request->semua_peralatan_las_telah_diamankan,
                'keterangan_semua_peralatan_las_telah_diamankan'                => $request->keterangan_semua_peralatan_las_telah_diamankan,
                'pembacaan_hasil_pengukuran_pada_pagar_penghalang'              => $request->pembacaan_hasil_pengukuran_pada_pagar_penghalang,
                'keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang'   => $request->keterangan_pembacaan_hasil_pengukuran_pada_pagar_penghalang,
                'alat_pemadam_api_siap_sedia'                                   => $request->alat_pemadam_api_siap_sedia,
                'keterangan_alat_pemadam_api_siap_sedia'                        => $request->keterangan_alat_pemadam_api_siap_sedia,
                'perlu_dengan_ijin_kerja_yang_lain'                             => $request->perlu_dengan_ijin_kerja_yang_lain,
                'keterangan_perlu_dengan_ijin_kerja_yang_lain'                  => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
                'semua_pekerjaan_telah_lengkap_alat_pelindung_diri'             => $request->semua_pekerjaan_telah_lengkap_alat_pelindung_diri,
                'keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri'  => $request->keterangan_semua_pekerjaan_telah_lengkap_alat_pelindung_diri,
            ]);
        } else {
            $ijinKerja->update([
                'catatan'  => $request->catatan,
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja radiografi berhasil diperbarui',
        ]);
    }

    public function updateDeskripsi(Request $request, $id)
    {
        $ijinKerja = IjinKerjaRadiografi::find($id);

        $request->validate([
            'nama_perusahaan'   => ['required', 'string', 'max:128'],
            'no_lisensi'        => ['required', 'string', 'max:128'],
            'sumber_radioaktif' => ['required', 'string', 'max:128'],
            'proyektor'         => ['required', 'string', 'max:128'],
            'survey_meter'      => ['required', 'string', 'max:128'],
            'tanggal_service'   => ['required', 'date'],
            'tanggal_kalibrasi' => ['required', 'date'],
        ]);

        $ijinKerja->update([
            'nama_perusahaan'   => $request->nama_perusahaan,
            'no_lisensi'        => $request->no_lisensi,
            'sumber_radioaktif' => $request->sumber_radioaktif,
            'proyektor'         => $request->proyektor,
            'survey_meter'      => $request->survey_meter,
            'tanggal_service'   => $request->tanggal_service,
            'tanggal_kalibrasi' => $request->tanggal_kalibrasi,
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Deskripsi pekerja radiografi berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaRadiografi  $ijinKerjaRadiografi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijinKerjaRadiografi = IjinKerjaRadiografi::find($id);
        $ijinKerjaRadiografi->delete();
        return back()->with('success', 'Ijin kerja radiografi berhasil dihapus');
    }

    public function cetak($id)
    {
        return "Belum dibuat pdf nya";
    }
}
