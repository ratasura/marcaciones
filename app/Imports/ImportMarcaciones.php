<?php

namespace App\Imports;

use App\Marcacion;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMarcaciones implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Marcacion([
            'fecha'   => @$row[0],
            'codigo'   => @$row[1],
            'ip'   => @$row[2],
            'tipo'   => @$row[3],
            'dsc1'   => @$row[4],
            'ci'   => @$row[5],
            'nombre'   => @$row[6]
        ]);
    }
}
