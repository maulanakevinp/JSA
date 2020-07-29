<?php

namespace App\Http\Controllers;

use App\Jsa;
use App\LangkahPekerjaan;
use App\PotensiBahaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LangkahPekerjaanController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Jsa  $jsa
     * @return \Illuminate\Http\Response
     */
    public function create(Jsa $jsa)
    {
        return view('langkah-pekerjaan.create', compact('jsa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'urutan_langkah_langkah_pekerjaan'  => ['required'],
            'bahaya_spesifik'                   => ['required'],
            'rencana_tindakan_pencegahan'       => ['required'],
            'pic_pelaksana'                     => ['required'],
            'waktu'                             => ['required'],
        ]);

        $request->validate([
            'potensi_bahaya.*'                  => ['required'],
        ]);

        $data['jsa_id'] = $request->jsa_id;
        $langkahPekerjaan = LangkahPekerjaan::create($data);

        for ($i=1; $i < count($request->potensi_bahaya) ; $i++) {
            PotensiBahaya::create([
                'langkah_pekerjaan_id'   => $langkahPekerjaan->id,
                'deskripsi'             => $request->potensi_bahaya[$i]
            ]);
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Langkah-langkah pekerjaan berhasil ditambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LangkahPekerjaan  $langkahPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(LangkahPekerjaan $langkahPekerjaan)
    {
        return view('langkah-pekerjaan.edit', compact('langkahPekerjaan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LangkahPekerjaan  $langkahPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(LangkahPekerjaan $langkahPekerjaan)
    {
        return view('langkah-pekerjaan.show', compact('langkahPekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LangkahPekerjaan  $langkahPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LangkahPekerjaan $langkahPekerjaan)
    {
        $data = $request->validate([
            'urutan_langkah_langkah_pekerjaan'  => ['required'],
            'potensi_bahaya'                    => ['required'],
            'bahaya_spesifik'                   => ['required'],
            'rencana_tindakan_pencegahan'       => ['required'],
            'pic_pelaksana'                     => ['required'],
            'waktu'                             => ['required'],
        ]);

        $langkahPekerjaan->update($data);
        return redirect()->back()->with('success', 'Langkah-langkah pekerjaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LangkahPekerjaan  $langkahPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LangkahPekerjaan $langkahPekerjaan)
    {
        $langkahPekerjaan->delete();
        return redirect()->back()->with('success', 'Langkah-langkah pekerjaan berhasil dihapus');
    }
}
