<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class AdminController extends Controller
{
    public function index()
    {
       $pesertas = User::where('role', 'user')->get();

        return view('dashboard-admin', compact('pesertas'));
    }
}