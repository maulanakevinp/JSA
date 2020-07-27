<?php

namespace App\Http\Controllers;

use App\Umum;
use Illuminate\Http\Request;

class UmumController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $umum = Umum::find($id);

        $data = $this->dataUmum($request);

        $umum->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data umum berhasil diperbarui',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateTanggalSelesai(Request $request, $id)
    {
        $umum = Umum::find($id);
        $data = $request->validate([
            'tanggal_selesai'   => ['required','date','after:yesterday']
        ],[
            'tanggal_selesai.after' => 'Tanggal selesai harus sesudahnya kemarin'
        ]);

        $umum->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data umum berhasil diperbarui',
        ]);
    }
}
