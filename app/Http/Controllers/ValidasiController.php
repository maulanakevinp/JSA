<?php

namespace App\Http\Controllers;

use App\Validasi;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'validasi_hari'           => ['required', 'date', 'after:yesterday'],
            'validasi_mulai_hari'     => ['required'],
            'validasi_selesai_hari'   => ['required'],
            'nama_pelaksana'          => ['required', 'string', 'max:64'],
            'inisial_pelaksana'       => ['required', 'string', 'max:64'],
            'nama_pengawas'           => ['required', 'string', 'max:64'],
            'inisial_pengawas'        => ['required', 'string', 'max:64'],
        ]);

        if ($request->ijin_kerja_panas_id) {
            $data['ijin_kerja_panas_id']    = $request->ijin_kerja_panas_id;
        }

        if ($request->ijin_kerja_galian_id) {
            $data['ijin_kerja_galian_id']    = $request->ijin_kerja_galian_id;
        }

        if ($request->ijin_kerja_listrik_id) {
            $data['ijin_kerja_listrik_id']    = $request->ijin_kerja_listrik_id;
        }

        if ($request->ijin_kerja_radiografi_id) {
            $data['ijin_kerja_radiografi_id']    = $request->ijin_kerja_radiografi_id;
        }

        if ($request->ijin_kerja_di_ketinggian_id) {
            $data['ijin_kerja_di_ketinggian_id']    = $request->ijin_kerja_di_ketinggian_id;
        }

        if ($request->ijin_kerja_ruang_terbatas_id) {
            $data['ijin_kerja_ruang_terbatas_id']    = $request->ijin_kerja_ruang_terbatas_id;
        }

        $validasi = Validasi::create($data);
        return response()->json([
            'success'   => true,
            'message'   => 'Data validasi berhasil ditambahkan',
            'url'       => route('validasi.update', $validasi->id),
            'id'        => $validasi->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Validasi  $validasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = Validasi::find($id);

        $data = $request->validate([
            'validasi_hari'           => ['required', 'date', 'after:yesterday'],
            'validasi_mulai_hari'     => ['required'],
            'validasi_selesai_hari'   => ['required'],
            'nama_pelaksana'          => ['required', 'string', 'max:64'],
            'inisial_pelaksana'       => ['required', 'string', 'max:64'],
            'nama_pengawas'           => ['required', 'string', 'max:64'],
            'inisial_pengawas'        => ['required', 'string', 'max:64'],
        ]);

        $validasi->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data validasi berhasil diperbarui',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Validasi  $validasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validasi = Validasi::find($id);
        $validasi->delete();
        return response()->json([
            'success'   => true,
            'message'   => 'Data validasi berhasil dihapus'
        ]);
    }
}
