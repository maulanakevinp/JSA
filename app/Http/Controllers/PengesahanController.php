<?php

namespace App\Http\Controllers;

use App\Pengesahan;
use Illuminate\Http\Request;

class PengesahanController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengesahan = Pengesahan::find($id);

        $data = $this->dataPengesahan($request);

        $pengesahan->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data pengesahan berhasil diperbarui',
        ]);
    }
}
