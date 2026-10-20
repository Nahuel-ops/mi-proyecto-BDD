<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // para el middleware auth

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [], [
            'password' => 'contraseña',
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
            ->withErrors(['email' => 'Las credenciales no son correctas.'])
            ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('cursos.index'))
            ->with('success', 'Bienvenido(a),' . Auth::user()->name . '.');
            
    }

}
