<?php

namespace App\Imports;

use App\Models\Vehicle;
/* use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel; */
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow};

class VehiclesImport implements ToModel ,WithHeadingRow
{
    use Importable;/* Importante */

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vehicle([
            'registration_number' => $row['registration_number'],
            'brand' => $row['brand'],
            'model' => $row['model'],
            'type' => $row['type'],
            'fuel_type' => $row['fuel_type'],
            'year' => (integer) $row['year'],
            'doors' => (integer) $row['doors'],
            'is_active' => ($row['active'] == 'YES') ? 1 : 0,
        ]);
    }
}
