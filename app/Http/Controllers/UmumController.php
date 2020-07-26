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
}
