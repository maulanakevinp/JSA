<?php

namespace App\Http\Controllers;


use App\AlatPelindungDiri;
use App\DokumenPendukung;
use App\IjinKerjaGalian;
use App\Jsa;
use App\Pengesahan;
use App\Umum;
use App\Validasi;
use Illuminate\Http\Request;

class IjinKerjaGalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $ijinKerja = IjinKerjaGalian::where('jsa_id', $id)->paginate(12);
        $jsa = Jsa::findOrFail($id);
        if (!$ijinKerja) {
            return abort(404);
        }

        return view('ijin-kerja-galian.index', compact('ijinKerja','jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-galian.create', compact('jsa'));
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

        $ijinKerja = IjinKerjaGalian::create([
            'jsa_id'                                                => $request->jsa_id,
            'umum_id'                                               => $umum->id,
            'alat_pelindung_diri_id'                                => $alatPelindungDiri->id,
            'dokumen_pendukung_id'                                  => $dokumenPendukung->id,
            'pengesahan_id'                                         => $pengesahan->id,
            'jalur_bebas_dari_kabel_listrik'                        => $request->jalur_bebas_dari_kabel_listrik,
            'keterangan_jalur_bebas_dari_kabel_listrik'             => $request->keterangan_jalur_bebas_dari_kabel_listrik,
            'jalur_bebas_dari_kabel_telepon'                        => $request->jalur_bebas_dari_kabel_telepon,
            'keterangan_jalur_bebas_dari_kabel_telepon'             => $request->keterangan_jalur_bebas_dari_kabel_telepon,
            'jalur_bebas_dari_kabel_instrument'                     => $request->jalur_bebas_dari_kabel_instrument,
            'keterangan_jalur_bebas_dari_kabel_instrument'          => $request->keterangan_jalur_bebas_dari_kabel_instrument,
            'jalur_bebas_dari_gorong_gorong'                        => $request->jalur_bebas_dari_gorong_gorong,
            'keterangan_jalur_bebas_dari_gorong_gorong'             => $request->keterangan_jalur_bebas_dari_gorong_gorong,
            'jalur_bebas_dari_pipa_air_or_gas_or_minyak'            => $request->jalur_bebas_dari_pipa_air_or_gas_or_minyak,
            'keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak' => $request->keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak,
            'dinding_penggalian_perlu_di_topang'                    => $request->dinding_penggalian_perlu_di_topang,
            'keterangan_dinding_penggalian_perlu_di_topang'         => $request->keterangan_dinding_penggalian_perlu_di_topang,
            'rambu_peringatan_telah_terpasang'                      => $request->rambu_peringatan_telah_terpasang,
            'keterangan_rambu_peringatan_telah_terpasang'           => $request->keterangan_rambu_peringatan_telah_terpasang,
            'lokasi_telah_diberi_batas_or_pengalang'                => $request->lokasi_telah_diberi_batas_or_pengalang,
            'keterangan_lokasi_telah_diberi_batas_or_pengalang'     => $request->keterangan_lokasi_telah_diberi_batas_or_pengalang,
            'lokasi_bebas_dari_area_mudah_terbakar'                 => $request->lokasi_bebas_dari_area_mudah_terbakar,
            'keterangan_lokasi_bebas_dari_area_mudah_terbakar'      => $request->keterangan_lokasi_bebas_dari_area_mudah_terbakar,
            'perlu_dengan_ijin_kerja_yang_lain'                     => $request->perlu_dengan_ijin_kerja_yang_lain,
            'keterangan_perlu_dengan_ijin_kerja_yang_lain'          => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            'catatan'                                               => $request->catatan,
        ]);

        if ($request->validasi_hari[0]) {
            for ($i=0; $i < count($request->validasi_hari); $i++) {
                Validasi::create([
                    'ijin_kerja_galian_id'  =>  $ijinKerja->id,
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
            'message'   => 'Ijin kerja galian berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaGalian  $ijinKerjaGalian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ijinKerja = IjinKerjaGalian::findOrFail($id);
        return view('ijin-kerja-galian.show', compact('ijinKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaGalian  $ijinKerjaGalian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ijinKerja = IjinKerjaGalian::findOrFail($id);
        return view('ijin-kerja-galian.edit', compact('ijinKerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ijinKerja = IjinKerjaGalian::find($id);

        if (!$request->catatan) {
            $ijinKerja->update([
                'jalur_bebas_dari_kabel_listrik'                        => $request->jalur_bebas_dari_kabel_listrik,
                'keterangan_jalur_bebas_dari_kabel_listrik'             => $request->keterangan_jalur_bebas_dari_kabel_listrik,
                'jalur_bebas_dari_kabel_telepon'                        => $request->jalur_bebas_dari_kabel_telepon,
                'keterangan_jalur_bebas_dari_kabel_telepon'             => $request->keterangan_jalur_bebas_dari_kabel_telepon,
                'jalur_bebas_dari_kabel_instrument'                     => $request->jalur_bebas_dari_kabel_instrument,
                'keterangan_jalur_bebas_dari_kabel_instrument'          => $request->keterangan_jalur_bebas_dari_kabel_instrument,
                'jalur_bebas_dari_gorong_gorong'                        => $request->jalur_bebas_dari_gorong_gorong,
                'keterangan_jalur_bebas_dari_gorong_gorong'             => $request->keterangan_jalur_bebas_dari_gorong_gorong,
                'jalur_bebas_dari_pipa_air_or_gas_or_minyak'            => $request->jalur_bebas_dari_pipa_air_or_gas_or_minyak,
                'keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak' => $request->keterangan_jalur_bebas_dari_pipa_air_or_gas_or_minyak,
                'dinding_penggalian_perlu_di_topang'                    => $request->dinding_penggalian_perlu_di_topang,
                'keterangan_dinding_penggalian_perlu_di_topang'         => $request->keterangan_dinding_penggalian_perlu_di_topang,
                'rambu_peringatan_telah_terpasang'                      => $request->rambu_peringatan_telah_terpasang,
                'keterangan_rambu_peringatan_telah_terpasang'           => $request->keterangan_rambu_peringatan_telah_terpasang,
                'lokasi_telah_diberi_batas_or_pengalang'                => $request->lokasi_telah_diberi_batas_or_pengalang,
                'keterangan_lokasi_telah_diberi_batas_or_pengalang'     => $request->keterangan_lokasi_telah_diberi_batas_or_pengalang,
                'lokasi_bebas_dari_area_mudah_terbakar'                 => $request->lokasi_bebas_dari_area_mudah_terbakar,
                'keterangan_lokasi_bebas_dari_area_mudah_terbakar'      => $request->keterangan_lokasi_bebas_dari_area_mudah_terbakar,
                'perlu_dengan_ijin_kerja_yang_lain'                     => $request->perlu_dengan_ijin_kerja_yang_lain,
                'keterangan_perlu_dengan_ijin_kerja_yang_lain'          => $request->keterangan_perlu_dengan_ijin_kerja_yang_lain,
            ]);
        } else {
            $ijinKerja->update([
                'catatan'  => $request->catatan,
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Ijin kerja galian berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaGalian  $ijinKerjaGalian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ijinKerjaGalian = IjinKerjaGalian::find($id);
        $ijinKerjaGalian->delete();
        return back()->with('success', 'Ijin kerja galian berhasil dihapus');
    }

    public function cetak($id)
    {
        return "Belum dibuat pdf nya";
    }
}
