<?php

namespace App\Http\Controllers;

use App\RencanaTindakanPencegahan;
use Illuminate\Http\Request;

class RencanaTindakanPencegahanController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RencanaTindakanPencegahan  $rencanaTindakanPencegahan
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rencana_tindakan_pencegahan' => ['required']
        ]);

        RencanaTindakanPencegahan::create([
            'langkah_pekerjaan_id'  => $request->langkah_pekerjaan_id,
            'deskripsi' => $request->rencana_tindakan_pencegahan
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Rencana tindakan pencegahan berhasil ditambahkan"
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RencanaTindakanPencegahan  $rencanaTindakanPencegahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RencanaTindakanPencegahan $rencanaTindakanPencegahan)
    {
        $request->validate([
            'rencana_tindakan_pencegahan' => ['required']
        ]);

        $rencanaTindakanPencegahan->update([
            'deskripsi' => $request->rencana_tindakan_pencegahan
        ]);

        return response()->json([
            'success'   => true,
            'message'   => "Rencana tindakan pencegahan berhasil diperbarui"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RencanaTindakanPencegahan  $rencanaTindakanPencegahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RencanaTindakanPencegahan $rencanaTindakanPencegahan)
    {
        $rencanaTindakanPencegahan->delete();
        return response()->json([
            'success'   => true,
            'message'   => "Rencana tindakan pencegahan berhasil dihapus"
        ]);
    }
}
