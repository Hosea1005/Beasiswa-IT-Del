<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dana extends Model
{
    protected $guarded = [];

    public function addData($data){
        return DB::table('permohonan')->insert($data);
    }

    public function allDataPendaftar(){
        return DB::table('permohonan')->get();
    }
    public function detailDataPendaftar($id_per){
        return DB::table('permohonan')->where('id_per', $id_per)->first();
    }

    public function editData($id_per,$data){
        return DB::table('permohonan')
        ->where('id_per',$id_per)
        ->update($data);
    }
}
