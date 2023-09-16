<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('login.index');
    }

    public function store (Request $request) {
        if(!Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        }
    }

    public function destroy()
    {
        Auth::logout();

        return to_route('login.index');
    }
}
