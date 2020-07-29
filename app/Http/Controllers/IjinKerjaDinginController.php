<?php

namespace App\Http\Controllers;

use App\Umum;
use App\SumberBahayaAlat;
use App\AlatPelindungDiri;
use App\DokumenPendukung;
use App\IjinKerjaDingin;
use App\Jsa;
use App\Pengesahan;
use App\Validasi;
use Illuminate\Http\Request;

class IjinKerjaDinginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $ijinKerja = IjinKerjaDingin::where('jsa_id', $id)->paginate(12);
        $jsa = Jsa::findOrFail($id);
        if (!$ijinKerja) {
            return abort(404);
        }

        return view('ijin-kerja-dingin.index', compact('ijinKerja','jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-dingin.create', compact('jsa'));
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
        $dataSumberBahayaAlat = $this->dataSumberBahayaAlat($request);
        $dataAlatPelindungDiri = $this->dataAlatPelindungDiri($request);
        $dataDokumenPendukung = $this->dataDokumenPendukung($request);
        $dataPengesahan = $this->dataPengesahan($request);
        $dataValidasi = $this->dataValidasi($request);

        $umum               = Umum::create($dataUmum);
        $sumberBahayaAlat   = SumberBahayaAlat::create($dataSumberBahayaAlat);
        $alatPelindungDiri  = AlatPelindungDiri::create($dataAlatPelindungDiri);
        $dokumenPendukung   = DokumenPendukung::create($dataDokumenPendukung);
        $pengesahan         = Pengesahan::create($dataPengesahan);

        $ijinKerja = IjinKerjaDingin::create([
            'jsa_id'                                                            => $request->jsa_id,
            'umum_id'                                                           => $umum->id,
            'sumber_bahaya_alat_id'                                             => $sumberBahayaAlat->id,
            'alat_pelindung_diri_id'                                            => $alatPelindungDiri->id,
            'dokumen_pendukung_id'                                              => $dokumenPendukung->id,
            'pengesahan_id'                                                     => $pengesahan->id,
            'jalur_dibebaskan_dari_tekanan'                                     => $request->jalur_dibebaskan_dari_tekanan,
            'jalur_dikosongkan_atau_drain'                                      => $request->jalur_dikosongkan_atau_drain,
            'jalur_diisolasi_dengan_blanking'                                   => $request->jalur_diisolasi_dengan_blanking,
            'jalur_diisolasi_dengan_dilepas'                                    => $request->jalur_diisolasi_dengan_dilepas,
            'jalur_diisolasi_dengan_kerangan_dikunci'                           => $request->jalur_diisolasi_dengan_kerangan_dikunci,
            'jalur_diisolasi_dengan_diberi_label'                               => $request->jalur_diisolasi_dengan_diberi_label,
            'jalur_didorong_atau_flush_dengan_air'                              => $request->jalur_didorong_atau_flush_dengan_air,
            'jalur_steaming_out_or_purging'                                     => $request->jalur_steaming_out_or_purging,
            'jalur_dinginkan_secara_alamiah_atau_mekanis'                       => $request->jalur_dinginkan_secara_alamiah_atau_mekanis,
            'semua_pekerjaan_disetujui_untuk_penggalian'                        => $request->semua_pekerjaan_disetujui_untuk_penggalian,
            'perlu_dengan_ijin_kerja_yang_lain'                                 => $request->perlu_dengan_ijin_kerja_yang_lain,
            'perlu_dilakukan_uji_kandungan_gas'                                 => $request->perlu_dilakukan_uji_kandungan_gas,
            'semua_peralatan_listrik_telah_diisolasi'                           => $request->semua_peralatan_listrik_telah_diisolasi,
            'semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang'             => $request->semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang,
            'keterangan_jalur_dibebaskan_dari_tekanan'                          => $request->keterangan_jalur_dibebaskan_dari_tekanan,
            'keterangan_jalur_dikosongkan_atau_drain'                           => $request->keterangan_jalur_dikosongkan_atau_drain,
            'keterangan_jalur_diisolasi_dengan_blanking'                        => $request->keterangan_jalur_diisolasi_dengan_blanking,
            'keterangan_jalur_diisolasi_dengan_dilepas'                         => $request->keterangan_jalur_diisolasi_dengan_dilepas,
            'keterangan_jalur_diisolasi_dengan_kerangan_dikunci'                => $request->keterangan_jalur_diisolasi_dengan_kerangan_dikunci,
            'keterangan_jalur_diisolasi_dengan_diberi_label'                    => $request->keterangan_jalur_diisolasi_dengan_diberi_label,
            'keterangan_jalur_didorong_atau_flush_dengan_air'                   => $request->keterangan_jalur_didorong_atau_flush_dengan_air,
            'keterangan_jalur_steaming_out_or_purging'                          => $request->keterangan_jalur_steaming_out_or_purging,
            'keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis'            => $request->keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis,
            'keterangan_semua_pekerjaan_disetujui_untuk_penggalian'             => $request->keterangan_semua_pekerjaan_disetujui_untuk_penggalian,
            'keterangan_perlu_dengan_ijin_kerja_yang_lain'                      => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            'keterangan_perlu_dilakukan_uji_kandungan_gas'                      => $request->keterangan_perlu_dilakukan_uji_kandungan_gas,
            'keterangan_semua_peralatan_listrik_telah_diisolasi'                => $request->keterangan_semua_peralatan_listrik_telah_diisolasi,
            'keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang'  => $request->keterangan_semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang,
            'catatan'                                                           => $request->catatan,
        ]);

        try {
            for ($i=1; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_dingin_id'  =>  $ijinKerja->id,
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
            'message'   => 'Ijin kerja dingin berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaDingin  $ijinKerjaDingin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ijinKerja = IjinKerjaDingin::findOrFail($id);
        return view('ijin-kerja-dingin.show', compact('ijinKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaDingin  $ijinKerjaDingin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ijinKerja = IjinKerjaDingin::findOrFail($id);
        return view('ijin-kerja-dingin.edit', compact('ijinKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ijinKerja = IjinKerjaDingin::find($id);

        if (!$request->catatan) {
            $ijinKerja->update([
                'jalur_dibebaskan_dari_tekanan'                                     => $request->jalur_dibebaskan_dari_tekanan,
                'jalur_dikosongkan_atau_drain'                                      => $request->jalur_dikosongkan_atau_drain,
                'jalur_diisolasi_dengan_blanking'                                   => $request->jalur_diisolasi_dengan_blanking,
                'jalur_diisolasi_dengan_dilepas'                                    => $request->jalur_diisolasi_dengan_dilepas,
                'jalur_diisolasi_dengan_kerangan_dikunci'                           => $request->jalur_diisolasi_dengan_kerangan_dikunci,
                'jalur_diisolasi_dengan_diberi_label'                               => $request->jalur_diisolasi_dengan_diberi_label,
                'jalur_didorong_atau_flush_dengan_air'                              => $request->jalur_didorong_atau_flush_dengan_air,
                'jalur_steaming_out_or_purging'                                     => $request->jalur_steaming_out_or_purging,
                'jalur_dinginkan_secara_alamiah_atau_mekanis'                       => $request->jalur_dinginkan_secara_alamiah_atau_mekanis,
                'semua_pekerjaan_disetujui_untuk_penggalian'                        => $request->semua_pekerjaan_disetujui_untuk_penggalian,
                'perlu_dengan_ijin_kerja_yang_lain'                                 => $request->perlu_dengan_ijin_kerja_yang_lain,
                'perlu_dilakukan_uji_kandungan_gas'                                 => $request->perlu_dilakukan_uji_kandungan_gas,
                'semua_peralatan_listrik_telah_diisolasi'                           => $request->semua_peralatan_listrik_telah_diisolasi,
                'semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang'             => $request->semua_peralatan_listrik_telah_perlu_pemeriksaan_ulang,
                'keterangan_jalur_dibebaskan_dari_tekanan'                          => $request->keterangan_jalur_dibebaskan_dari_tekanan,
                'keterangan_jalur_dikosongkan_atau_drain'                           => $request->keterangan_jalur_dikosongkan_atau_drain,
                'keterangan_jalur_diisolasi_dengan_blanking'                        => $request->keterangan_jalur_diisolasi_dengan_blanking,
                'keterangan_jalur_diisolasi_dengan_dilepas'                         => $request->keterangan_jalur_diisolasi_dengan_dilepas,
                'keterangan_jalur_diisolasi_dengan_kerangan_dikunci'                => $request->keterangan_jalur_diisolasi_dengan_kerangan_dikunci,
                'keterangan_jalur_diisolasi_dengan_diberi_label'                    => $request->keterangan_jalur_diisolasi_dengan_diberi_label,
                'keterangan_jalur_didorong_atau_flush_dengan_air'                   => $request->keterangan_jalur_didorong_atau_flush_dengan_air,
                'keterangan_jalur_steaming_out_or_purging'                          => $request->keterangan_jalur_steaming_out_or_purging,
                'keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis'            => $request->keterangan_jalur_dinginkan_secara_alamiah_atau_mekanis,
                'keterangan_semua_pekerjaan_disetujui_untuk_penggalian'             => $request->keterangan_semua_pekerjaan_disetujui_untuk_penggalian,
                'keterangan_perlu_dengan_ijin_kerja_yang_lain'                      => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
                'keterangan_perlu_dilakukan_uji_kandungan_gas'                      => $request->keterangan_perlu_dilakukan_uji_kandungan_gas,
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
            'message'   => 'Ijin kerja dingin berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaDingin  $ijinKerjaDingin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijinKerjaDingin = IjinKerjaDingin::find($id);
        $ijinKerjaDingin->delete();
        return back()->with('success', 'Ijin kerja dingin berhasil dihapus');
    }

    public function cetak($id)
    {
        $ijinKerja = IjinKerjaDingin::findOrFail($id);
        return view('ijin-kerja-dingin.cetak', compact('ijinKerja'));
    }
}
