<?php

namespace App\Http\Controllers;

use App\DokumenPendukung;
use Illuminate\Http\Request;

class DokumenPendukungController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dokumenPendukung = DokumenPendukung::find($id);

        $data = $this->dataDokumenPendukung($request);

        $dokumenPendukung->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data dokumen pendukung berhasil diperbarui',
        ]);
    }
}
