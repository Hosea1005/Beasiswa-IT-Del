<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PendaftarModel extends Model
{
    public function allDataPendaftar(){
        return DB::table('pendaftaran_beasiswa')->where('status_daftar', 0)->get();
    }
    public function detailDataPendaftar($id_pendaftaran){
        return DB::table('pendaftaran_beasiswa')->where('id_pendaftaran', $id_pendaftaran)->first();
    }
    public function editData($id_pendaftaran,$data){
        return DB::table('pendaftaran_beasiswa')
        ->where('id_pendaftaran',$id_pendaftaran)
        ->update($data);
    }

    public function deleteDataPendaftar($id_pendaftaran){
        return DB::table('pendaftaran_beasiswa')
        ->where('id_pendaftaran', $id_pendaftaran)
        ->delete();
    }

    public function allDataPenerima(){
        return DB::table('pendaftaran_beasiswa')->where('status_daftar', 1)->get();
    }
}
