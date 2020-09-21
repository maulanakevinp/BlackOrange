<?php

namespace App\Http\Controllers;

use App\Rules\LoginRule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function edit()
    {
        return view('ganti-password');
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'password_lama'         => ['required','string','min:8'],
            'password_baru'         => ['required','string','min:8'],
            'ulangi_password_baru'  => ['required','string','same:password_baru'],
        ]);

        if (Hash::check($request->password_lama, $user->password)) {
            $user->password = Hash::make($request->password_baru);
            $user->save();
            return redirect()->back()->with('success','Password berhasil diperbarui');
        } else {
            return redirect()->back()->with('error','Password lama yang anda masukkan salah');
        }
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'email'     => ['required', 'max:64', 'required_with:password', new LoginRule($request->password)],
            'password'  => ['required']
        ]);

        return redirect('/');
    }

    public function keluar()
    {
        Auth::logout();
        return redirect('/');
    }
}
