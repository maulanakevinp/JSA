<?php

namespace App\Http\Controllers;

use App\Jsa;
use Illuminate\Http\Request;

class JsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jsa = Jsa::paginate(12);

        if ($request->cari) {
            $jsa = Jsa::where('no_jsa', 'like', "%{$request->cari}%")
                        ->orWhere('nama_pekerjaan', 'like', "%{$request->cari}%")
                        ->orWhere('lokasi', 'like', "%{$request->cari}%")
                        ->orWhere('nomor_kontrak', 'like', "%{$request->cari}%")
                        ->orWhere('tanggal_kontrak', 'like', "%{$request->cari}%")
                        ->orWhere('tanggal_review', 'like', "%{$request->cari}%")
                        ->orWhere('tanggal_persetujuan', 'like', "%{$request->cari}%")
                        ->paginate(12);
        }

        $jsa->appends($request->only('cari'));

        return view('jsa.index', compact('jsa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jsa.create');
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
            'no_jsa'            => ['required', 'string', 'max:128'],
            'nama_pekerjaan'    => ['required', 'string', 'max:128'],
            'lokasi'            => ['required', 'string', 'max:128'],
            'nomor_kontrak'     => ['required', 'string', 'max:128'],
            'tanggal_kontrak'   => ['required', 'date', 'after:now'],
        ],[
            'tanggal_kontrak.after' => 'Tanggal kontrak harus sesudah tanggal sekarang'
        ]);

        $data['pengaju_id'] = auth()->user()->id;

        $jsa = Jsa::create($data);

        return redirect()->route('jsa.edit', $jsa)->with('success', 'JSA Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jsa  $jsa
     * @return \Illuminate\Http\Response
     */
    public function show(Jsa $jsa)
    {
        return view('jsa.show', compact('jsa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jsa  $jsa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jsa $jsa)
    {
        return view('jsa.edit', compact('jsa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jsa  $jsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jsa $jsa)
    {
        $data = $request->validate([
            'no_jsa'            => ['required', 'string', 'max:128'],
            'nama_pekerjaan'    => ['required', 'string', 'max:128'],
            'lokasi'            => ['required', 'string', 'max:128'],
            'nomor_kontrak'     => ['required', 'string', 'max:128'],
            'tanggal_kontrak'   => ['required', 'date', 'after:now'],
        ]);

        $jsa->update($data);

        return redirect()->back()->with('success', 'JSA Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jsa  $jsa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jsa $jsa)
    {
        $jsa->delete();
        return redirect()->back()->with('success', 'JSA Berhasil Dihapus');
    }
}
