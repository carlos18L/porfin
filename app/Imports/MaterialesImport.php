<?php

namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class MaterialesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $obra = null;

        foreach ($rows as $index => $row) {
            // Detectar el nombre de la obra (fila específica)
            if ($index == 6) { // Cambia esto según la fila donde esté el nombre de la obra
                $obra = $row[1]; // Ajusta la columna según tu estructura
                continue;
            }

            // Detectar la fila de inicio de los datos relevantes (tabla de materiales)
            if ($index >= 17) { // Cambia este número según la fila inicial de los datos
                // Evitar procesar filas vacías o encabezados
                if (is_null($row[0]) || $row[0] == "Código") {
                    continue;
                }

                // Crear un material solo con las columnas relevantes
                Material::create([
                    'codigo'   => $row[0] ?? null,                       // Columna "Código"
                    'concepto' => $row[1] ?? null,                       // Columna "Concepto"
                    'unidad'   => $row[2] ?? null,                       // Columna "Unidad"
                    'fecha'    => isset($row[3]) ? \Carbon\Carbon::parse($row[3])->format('Y-m-d') : null, // Columna "Fecha"
                    'cantidad' => $row[4] ?? null,                       // Columna "Cantidad"
                    'obra'     => $obra,                                 // Nombre de la obra
                ]);
            }
        }
    }
}


