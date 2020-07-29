<?php

namespace App\Http\Controllers;

use App\Jsa;
use Barryvdh\DomPDF\Facade as PDF;
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
        if (auth()->user()->peran->nama == "Manager Kontraktor") {
            $jsa = Jsa::where('no_jsa', '!=', null)
                ->where('nama_pekerjaan', '!=', null)
                ->where('lokasi', '!=', null)
                ->where('nomor_kontrak', '!=', null)
                ->where('tanggal_kontrak', '!=', null)
                ->whereHas('langkahPekerjaan')
                ->paginate(12);

            if ($request->cari) {
                $jsa = Jsa::where(function($jsa) use ($request) {
                    $jsa->where('no_jsa', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_pekerjaan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('lokasi', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nomor_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_review', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_persetujuan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_perusahaan', 'like', "%{$request->cari}%");
                })
                ->paginate(12);
            }
        } elseif (auth()->user()->peran->nama == "HSE") {
            $jsa = Jsa::where('no_jsa', '!=', null)
                ->where('nama_pekerjaan', '!=', null)
                ->where('lokasi', '!=', null)
                ->where('nomor_kontrak', '!=', null)
                ->where('tanggal_kontrak', '!=', null)
                ->where('status_review', 1)
                ->whereHas('langkahPekerjaan')
                ->paginate(12);

            if ($request->cari) {
                $jsa = Jsa::where(function($jsa) use ($request) {
                    $jsa->where('no_jsa', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_pekerjaan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('lokasi', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nomor_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_review', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_persetujuan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_perusahaan', 'like', "%{$request->cari}%");
                })
                ->paginate(12);
            }
        } else {
            $jsa = Jsa::where('no_jsa', '!=', null)
                ->where('nama_pekerjaan', '!=', null)
                ->where('lokasi', '!=', null)
                ->where('nomor_kontrak', '!=', null)
                ->where('tanggal_kontrak', '!=', null)
                ->paginate(12);

            if ($request->cari) {
                $jsa = Jsa::where(function($jsa) use ($request) {
                    $jsa->where('no_jsa', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_pekerjaan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('lokasi', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nomor_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_review', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_persetujuan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_perusahaan', 'like', "%{$request->cari}%");
                })
                ->paginate(12);
            }
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
            'nama_perusahaan'   => ['required', 'string', 'max:128'],
            'no_jsa'            => ['required', 'string', 'max:128'],
            'nama_pekerjaan'    => ['required', 'string', 'max:128'],
            'judul_pekerjaan'   => ['required', 'string', 'max:128'],
            'lokasi'            => ['required', 'string', 'max:128'],
            'nomor_kontrak'     => ['required', 'string', 'max:128'],
            'tanggal_kontrak'   => ['required', 'date', 'after:yesterday'],
        ],[
            'tanggal_kontrak.after' => 'Tanggal kontrak harus sesudahnya kemarin'
        ]);

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
        return view('jsa.edit', compact('jsa'));
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
        if (auth()->user()->peran->nama == 'Admin Kontraktor') {
            $validation = [
                'nama_perusahaan'   => ['required', 'string', 'max:128'],
                'no_jsa'            => ['required', 'string', 'max:128'],
                'nama_pekerjaan'    => ['required', 'string', 'max:128'],
                'judul_pekerjaan'   => ['required', 'string', 'max:128'],
                'lokasi'            => ['required', 'string', 'max:128'],
                'nomor_kontrak'     => ['required', 'string', 'max:128'],
                'tanggal_kontrak'   => ['required', 'date', 'after:yesterday'],
            ];
        }

        if (auth()->user()->peran->nama == 'Manager Kontraktor') {
            $validation['satuan_kerja_pemberi_kerja']   = ['required'];
            $validation['status_review']                = ['required'];
            if ($request->status_review == 2) {
                $validation['alasan_penolakan_review']  = ['required'];
            }
        }

        if (auth()->user()->peran->nama == 'HSE') {
            $validation['satuan_kerja_penanggung_jawab']   = ['required'];
            $validation['status_persetujuan']              = ['required'];
            if ($request->status_persetujuan == 2) {
                $validation['alasan_penolakan_persetujuan']= ['required'];
            }
        }

        $data = $request->validate($validation);

        if (auth()->user()->peran->nama == 'Admin Kontraktor') {
            $data['status_review']                  = 0;
            $data['status_persetujuan']             = 0;
            $data['alasan_penolakan_persetujuan']   = null;
            $data['alasan_penolakan_review']        = null;
        }

        if (auth()->user()->peran->nama == 'Manager Kontraktor') {
            $data['pereview_id'] = auth()->user()->id;
            if ($request->status_review == 0) {
                $data['status_persetujuan']             = 0;
                $data['alasan_penolakan_persetujuan']   = null;
                $data['alasan_penolakan_review']        = null;
            }

            if ($request->status_review == 1) {
                $data['alasan_penolakan_persetujuan']   = null;
                $data['alasan_penolakan_review']        = null;
                $data['tanggal_review']                 = now();
            }
        }

        if (auth()->user()->peran->nama == 'HSE') {
            $data['penyetuju_id'] = auth()->user()->id;
            if ($request->status_persetujuan == 0) {
                $data['alasan_penolakan_persetujuan']   = null;
                $data['alasan_penolakan_review']        = null;
            }

            if ($request->status_persetujuan == 1) {
                $data['alasan_penolakan_persetujuan']   = null;
                $data['alasan_penolakan_review']        = null;
                $data['tanggal_persetujuan']            = now();
            }
        }

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

    public function ijinKerja(Request $request)
    {
        if (auth()->user()->peran->nama == "Manager Kontraktor" || auth()->user()->peran->nama == "HSE") {
            $jsa = Jsa::where('no_jsa', '!=', null)
                ->where('nama_pekerjaan', '!=', null)
                ->where('lokasi', '!=', null)
                ->where('nomor_kontrak', '!=', null)
                ->where('tanggal_kontrak', '!=', null)
                ->where('status_review', 1)
                ->whereHas('langkahPekerjaan')
                ->paginate(12);

            if ($request->cari) {
                $jsa = Jsa::where('status_review', 1)
                    ->whereHas('langkahPekerjaan')
                    ->where(function($jsa) use ($request) {
                    $jsa->where('no_jsa', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_pekerjaan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('lokasi', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nomor_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_review', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_persetujuan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_perusahaan', 'like', "%{$request->cari}%");
                })
                ->paginate(12);
            }
        } else {
            $jsa = Jsa::where('no_jsa', '!=', null)
                ->where('nama_pekerjaan', '!=', null)
                ->where('lokasi', '!=', null)
                ->where('nomor_kontrak', '!=', null)
                ->where('tanggal_kontrak', '!=', null)
                ->where('status_review', 1)
                ->whereHas('langkahPekerjaan')
                ->paginate(12);

            if ($request->cari) {
                $jsa = Jsa::where('status_review', 1)
                ->whereHas('langkahPekerjaan')
                ->where(function($jsa) use ($request) {
                    $jsa->where('no_jsa', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_pekerjaan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('lokasi', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nomor_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_kontrak', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_review', 'like', "%{$request->cari}%");
                    $jsa->orWhere('tanggal_persetujuan', 'like', "%{$request->cari}%");
                    $jsa->orWhere('nama_perusahaan', 'like', "%{$request->cari}%");
                })
                ->paginate(12);
            }
        }

        $jsa->appends($request->only('cari'));

        return view('jsa.ijin-kerja', compact('jsa'));
    }

    public function cetak($id)
    {
        $jsa = Jsa::findOrFail($id);
        return view('jsa.cetak', compact('jsa'));
        // $pdf = PDF::loadView('jsa.cetak', compact('jsa'))->setPaper(array(0,0,609.449,935.433), 'landscape');
        // return $pdf->stream('tes.pdf');
    }
}
