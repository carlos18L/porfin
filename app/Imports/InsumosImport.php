<?php

namespace App\Imports;

use App\Models\Insumo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InsumosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Insumo([
            'obra' => $row['obra'],
            'cantidad' => $row['cantidad'],
            'descripcion' => $row['descripcion'],
            'estado' => $row['estado'],
            'codigo' => $row['codigo'],
            'concepto' => $row['concepto'],
            'unidad' => $row['unidad'],
            'fecha' => $row['fecha'],
        ]);
    }
}

