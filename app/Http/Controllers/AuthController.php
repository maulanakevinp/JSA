<?php

namespace App\Http\Controllers;

use App\Rules\LoginRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.masuk');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'nama'      => ['required', 'max:128', 'required_with:password', new LoginRule($request->password)],
            'password'  => ['required']
        ]);

        return redirect()->route('profil');
    }

    public function keluar()
    {
        Auth::logout();
        return redirect()->route('masuk');
    }
}
