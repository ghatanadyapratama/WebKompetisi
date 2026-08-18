<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'nama_tim',
        'asal_sekolah',
        'status_berkas'
    ];
}
