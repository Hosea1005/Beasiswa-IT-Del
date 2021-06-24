<?php

namespace App\Imports;

use App\Models\Keuangan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class KeuanganImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Keuangan([
            'nama_beasiswa_keuangan'    =>  $row['nama_beasiswa_keuangan'],
            'tahun_anggaran'            =>  $row['tahun_anggaran'],
            'nominal_biaya'             =>  $row['nominal_biaya'],
            //
        ]);
    }
}
