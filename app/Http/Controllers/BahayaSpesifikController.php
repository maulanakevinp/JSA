<?php

namespace App\Http\Controllers;

use App\BahayaSpesifik;
use Illuminate\Http\Request;

class BahayaSpesifikController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BahayaSpesifik  $bahayaSpesifik
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bahaya_spesifik' => ['required']
        ]);

        BahayaSpesifik::create([
            'langkah_pekerjaan_id'  => $request->langkah_pekerjaan_id,
            'deskripsi' => $request->bahaya_spesifik
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Bahaya Spesifik berhasil ditambahkan"
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BahayaSpesifik  $bahayaSpesifik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BahayaSpesifik $bahayaSpesifik)
    {
        $request->validate([
            'bahaya_spesifik' => ['required']
        ]);

        $bahayaSpesifik->update([
            'deskripsi' => $request->bahaya_spesifik
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Bahaya Spesifik berhasil diperbarui"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BahayaSpesifik  $bahayaSpesifik
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahayaSpesifik $bahayaSpesifik)
    {
        $bahayaSpesifik->delete();
        return response()->json([
            'success'   => true,
            'message'   => "Bahaya Spesifik berhasil dihapus"
        ]);
    }
}
