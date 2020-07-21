<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profil()
    {
        return view('user.profil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
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
            'nama'          => ['nullable','string','nama','max:128',Rule::unique('users','nama')->ignore($user)],
            'password'      => ['nullable','string','min:8','confirmed'],
            'password_lama' => ['required','string','min:8'],
        ]);
        if (Hash::check($request->password_lama, $user->password)) {
            if ($request->nama == '' && $request->password == '') {
                return redirect()->back()->with('error','Tidak ada perubahan yang berhasil disimpan');
            } else {
                if($request->nama){
                    $user->nama = $request->nama;
                    $user->nama_verified_at = null;
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
