<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah sudah login? DAN 2. Cek apakah rolenya admin?
        if(Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }

         // Jika bukan admin, tendang keluar!
        return redirect ('/login')->with('error', 'Akses Ditolak! Anda bukan Panitia');
    }
}
