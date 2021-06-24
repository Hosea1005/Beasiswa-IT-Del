<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $fillable = [
        'nama_beasiswa_keuangan',
        'tahun_anggaran',
        'nominal_biaya',
        
    ];
}
