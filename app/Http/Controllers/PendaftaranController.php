<?php

namespace App\Http\Controllers;

use App\Models\Peserta; // Import model Peserta
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index() 
    {
        $peserta = Peserta::all(); 
        return view('landing', [
        'data_peserta' => $peserta
    ]);
    }

    public function formDaftar() 
    {
        return view('daftar');
    }

    public function formEdit($id) {
        $peserta = Peserta::findOrFail($id);
        return view('edit', [
            'peserta' => $peserta
        ]);
    }

    public function updateData(Request $request, $id) {
        $data_valid = $request->validate([
            'nama_tim'=> 'required|min:3|max:50',
            'asal_sekolah' => 'required'
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($data_valid);

        return redirect ('/')->with('sukses', 'Data tim berhasil Di perbarui!');
    }

    public function hapusData($id) {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect('/')->with('sukses', 'Data tim berhasil dihapus!');
    }

    public function simpanData(Request $request)
    {
        // dd($request->all());

        // 1. VALIDASI (Server-Side)
        $data_valid = $request->validate([
            'nama_tim' => 'required|min:3|max:50',  
            'asal_sekolah' => 'required|min:5'
        ], [
            'nama_tim.required' => 'Nama tim gak boleh kosonggg nih bossss!',
            'nama_tim.min'      => 'Nama tim minimal 3 huruf bossss!',

            'asal_sekolah.required' => 'Asal sekolah wajib diisi boss!',
            'asal_sekolah.min'      => 'Asal sekolah minimal 5 karakter!',
        ]);

        // 2. Insert Ke database
        $data_valid['status_berkas'] ='menunggu';
        Peserta::create($data_valid);

        // 3. REDIRECT & FLASH MESSAGE
        return redirect('/')->with('sukses', 'Mantap! Data tim kamu berhasil di daftarkan.');
    }
}