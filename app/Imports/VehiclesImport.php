<?php

namespace App\Imports;

use App\Models\Vehicle;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VehiclesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Vehicle([
            'registration_number' => $row['registration_number'],
            'brand'               => $row['brand'],
            'model'               => $row['model'],
            'type'                => $row['type'],
            'fuel_type'           => $row['fuel_type'],
            'year'                => $row['year'],
            'doors'               => $row['doors'],
            'is_active'           => strtolower($row['active']) === 'yes', // Convierte "YES"/"NO" a booleano
        ]);
    }
}
