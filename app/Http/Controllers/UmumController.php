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

        if ($request->status_persetujuan >= 0) {
            $validation['status_persetujuan']              = ['required'];
            if ($request->status_persetujuan == 2) {
                $validation['alasan_penolakan_persetujuan']= ['required'];
            }

            $persetujuan = $request->validate($validation);

            if ($request->status_persetujuan == 1) {
                $data['alasan_penolakan_persetujuan']   = null;
            }

            if ($request->status_persetujuan != 0) {
                $persetujuan['status_persetujuan_dilihat'] = 0;
            }

        } else {
            $data['status_persetujuan'] = 1;
        }

        $umum->update($data);
        if ($persetujuan) {
            $umum->update($persetujuan);
        }

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

        $data['status_persetujuan'] = 0;

        $umum->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data umum berhasil diperbarui',
        ]);
    }

    public function dilihat($id)
    {
        $umum = Umum::find($id);
        $umum->update([
            'status_persetujuan_dilihat' => 1
        ]);
    }
}
