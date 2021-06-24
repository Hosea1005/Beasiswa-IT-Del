<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class KeuanganModel extends Model
{
    public function allData(){
        return DB::table('keuangans')->get();
    }
        protected $fillable = [
        'nama_beasiswa_keuangan',
        'tahun_anggaran',
        'nominal_biaya',
        
    ];

}
