<?php

namespace App\Http\Controllers;

use App\AlatPelindungDiri;
use Illuminate\Http\Request;

class AlatPelindungDiriController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alatPelindungDiri = AlatPelindungDiri::find($id);

        $data = $this->dataAlatPelindungDiri($request);

        $alatPelindungDiri->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data alat pelindung diri berhasil diperbarui',
        ]);
    }
}
