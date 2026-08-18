<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peserta;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peserta::create([
        'nama_tim' => 'SMPN 1 Coders',
        'asal_sekolah' => 'SMP Negeri 1',
        'status_berkas' => 'terverifikasi'
    ]);

        Peserta::create([
        'nama_tim' => 'Tech Kids JHS',
        'asal_sekolah' => 'SMP IT Bintang',
        'status_berkas' => 'menunggu'
    ]);
    }
}
