<?php

namespace App\Http\Controllers;

use App\PotensiBahaya;
use Illuminate\Http\Request;

class PotensiBahayaController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PotensiBahaya  $potensiBahaya
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'potensi_bahaya' => ['required']
        ]);

        PotensiBahaya::create([
            'langkah_pekerjaan_id'  => $request->langkah_pekerjaan_id,
            'deskripsi' => $request->potensi_bahaya
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Potensi bahaya berhasil diperbarui"
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PotensiBahaya  $potensiBahaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PotensiBahaya $potensiBahaya)
    {
        $request->validate([
            'potensi_bahaya' => ['required']
        ]);

        $potensiBahaya->update([
            'deskripsi' => $request->potensi_bahaya
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Potensi bahaya berhasil diperbarui"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PotensiBahaya  $potensiBahaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(PotensiBahaya $potensiBahaya)
    {
        $potensiBahaya->delete();
        return response()->json([
            'success'   => true,
            'message'   => "Potensi bahaya berhasil dihapus"
        ]);
    }
}
