<?php

namespace App\Http\Controllers;

use App\JenisPekerjaan;
use Illuminate\Http\Request;

class JenisPekerjaanController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jenisPekerjaan = JenisPekerjaan::find($id);

        $data = $this->dataJenisPekerjaan($request);

        $jenisPekerjaan->update($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data jenis pekerjaan berhasil diperbarui',
        ]);
    }
}
