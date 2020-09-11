<?php

namespace App\Http\Controllers;

use App\Rules\LoginRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        # code...
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
