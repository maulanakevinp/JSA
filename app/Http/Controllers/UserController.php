<?php

namespace App\Http\Controllers;

use App\Peran;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(12);

        if ($request->cari) {
            $users = User::where('nama', 'like', "%{$request->cari}%")
                        ->whereHas('peran', function ($peran) use ($request) {
                            $peran->where('nama', 'like', "%{$request->cari}%");
                        })
                        ->paginate(12);
        }

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peran = Peran::all();
        return view('user.create', compact('peran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'          => ['required', 'string', 'max:128', 'unique:users,nama'],
            'peran'         => ['required'],
            'foto_profil'   => ['nullable' ,'image', 'max:2048'],
        ]);

        $data['nama']       = $request->nama;
        $data['peran_id']   = $request->peran;

        if ($request->foto_profil) {
            $data['foto_profil'] = $request->foto_profil->store('public/foto_profil');
        }

        $user = User::create($data);

        return redirect()->route('pengguna.show', $user)->with('success', 'Penggunaa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        return view('user.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        $peran = Peran::all();
        return view('user.edit', compact('pengguna','peran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            'nama'          => ['required', 'string', 'max:128'],
            'peran'         => ['required'],
            'foto_profil'   => ['nullable' ,'image', 'max:2048'],
        ]);

        $pengguna->nama       = $request->nama;
        $pengguna->peran_id   = $request->peran;

        if ($request->foto_profil) {
            if ($pengguna->foto_profil != 'noavatar.png') {
                File::delete(storage_path('app/' . $pengguna->foto_profil));
            }
            $pengguna->foto_profil = $request->foto_profil->store('public/foto_profil');
        }

        $pengguna->save();

        return redirect()->back()->with('success', 'Penggunaa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        if ($pengguna->foto_profil != 'noavatar.png') {
            File::delete(storage_path('app/' . $pengguna->foto_profil));
        }
        $pengguna->delete();
        return redirect()->back()->with('success', 'Penggunaa berhasil dihapus');
    }

    public function profil()
    {
        return view('user.profil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function updateProfil(Request $request, User $user)
    {
        if (request()->ajax()) {
            $validator = Validator::make($request->all(),[
                'foto_profil'   => ['required', 'image', 'max:2048']
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error'     => true,
                    'message'   => $validator->errors()->all()
                ]);
            }

            if ($user->foto_profil != 'noavatar.png') {
                File::delete(storage_path('app/'.$user->foto_profil));
            }
            $user->foto_profil = $request->file('foto_profil')->store('public/foto_profil');
            $user->save();

            return response()->json([
                'error'     => false,
                'data'      => ['foto_profil'   => $user->foto_profil]
            ]);
        }
    }

    public function pengaturan()
    {
        return view('user.pengaturan');
    }

    public function updatePengaturan(Request $request, User $user)
    {
        $nama = false;
        $password = false;
        $request->validate([
            'nama'          => ['nullable','string','max:128',Rule::unique('users','nama')->ignore($user)],
            'password'      => ['nullable','string','min:8','confirmed'],
            'password_lama' => ['required','string','min:8'],
        ]);
        if (Hash::check($request->password_lama, $user->password)) {
            if ($request->nama == '' && $request->password == '') {
                return redirect()->back()->with('error','Tidak ada perubahan yang berhasil disimpan');
            } else {
                if($request->nama){
                    $user->nama = $request->nama;
                    $nama = true;
                }

                if ($request->password && $request->password_confirmation) {
                    $user->password = Hash::make($request->password);
                    $password = true;
                }
                $user->save();

                if ($nama && $password) {
                    return redirect()->back()->with('success','nama dan password berhasil diperbarui');
                } elseif ($nama) {
                    return redirect()->back()->with('success','nama berhasil diperbarui');
                } elseif($password){
                    return redirect()->back()->with('success','Password berhasil diperbarui');
                }
            }
        } else {
            return redirect()->back()->with('error','Password yang anda masukkan salah');
        }
    }
}
