<?php

namespace App\Http\Controllers;

use App\UjiKandunganGas;
use Illuminate\Http\Request;

class UjiKandunganGasController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ujiKandunganGas = UjiKandunganGas::find($id);

        $data = $this->dataUjiKandunganGas($request);

        $ujiKandunganGas->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data uji kandungan gas berhasil diperbarui',
        ]);
    }
}
