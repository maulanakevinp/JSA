<?php

namespace App\Http\Controllers;

use App\SumberBahayaAlat;
use Illuminate\Http\Request;

class SumberBahayaAlatController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sumberBahayaAlat = SumberBahayaAlat::find($id);

        $data = $this->dataSumberBahayaAlat($request);

        $sumberBahayaAlat->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data sumber bahaya alat berhasil diperbarui',
        ]);
    }
}
