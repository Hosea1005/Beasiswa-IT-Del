<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GuruModel extends Model
{
    public function allData(){
        return DB::table('dosen')->get();
    }

    public function allDataKeasramaan(){
        return DB::table('keasramaan')->get();
    }
}
