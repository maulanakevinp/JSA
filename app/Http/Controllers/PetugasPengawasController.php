<?php

namespace App\Http\Controllers;

use App\PetugasPengawas;
use Illuminate\Http\Request;

class PetugasPengawasController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petugasPengawas = PetugasPengawas::find($id);

        $data = $this->dataPetugasPengawas($request);

        $petugasPengawas->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data petugas pengawas berhasil diperbarui',
        ]);
    }
}
