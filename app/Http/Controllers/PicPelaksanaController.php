<?php

namespace App\Http\Controllers;

use App\PicPelaksana;
use Illuminate\Http\Request;

class PicPelaksanaController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PicPelaksana  $picPelaksana
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pic_pelaksana' => ['required']
        ]);

        PicPelaksana::create([
            'langkah_pekerjaan_id'  => $request->langkah_pekerjaan_id,
            'deskripsi' => $request->pic_pelaksana
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "PIC pelaksana berhasil ditambahkan"
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PicPelaksana  $picPelaksana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PicPelaksana $picPelaksana)
    {
        $request->validate([
            'pic_pelaksana' => ['required']
        ]);

        $picPelaksana->update([
            'deskripsi' => $request->pic_pelaksana
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "PIC pelaksana berhasil diperbarui"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PicPelaksana  $picPelaksana
     * @return \Illuminate\Http\Response
     */
    public function destroy(PicPelaksana $picPelaksana)
    {
        $picPelaksana->delete();
        return response()->json([
            'success'   => true,
            'message'   => "PIC pelaksana berhasil dihapus"
        ]);
    }
}
