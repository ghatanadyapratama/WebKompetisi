<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function prosesLogin(Request $request) {
        $credentials = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

         // Proses Autentikasi mencocokkan hash password otomatis
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard-admin');
        }
        
        // Jika salah password/email
        return back()->withErrors(['email' => 'Email atau Password salah']);
    }
}
