<?php

namespace App\Http\Controllers;

use App\Waktu;
use Illuminate\Http\Request;

class WaktuController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu' => ['required']
        ]);

        Waktu::create([
            'langkah_pekerjaan_id'  => $request->langkah_pekerjaan_id,
            'deskripsi' => $request->waktu
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Waktu berhasil ditambahkan"
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waktu $waktu)
    {
        $request->validate([
            'waktu' => ['required']
        ]);

        $waktu->update([
            'deskripsi' => $request->waktu
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Waktu berhasil diperbarui"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waktu $waktu)
    {
        $waktu->delete();
        return response()->json([
            'success'   => true,
            'message'   => "Waktu berhasil dihapus"
        ]);
    }
}
