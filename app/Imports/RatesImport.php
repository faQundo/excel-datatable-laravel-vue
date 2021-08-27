<?php

namespace App\Imports;

use App\Models\Rate;
/* use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel; */
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow};
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class RatesImport implements ToModel ,WithHeadingRow
{
    use Importable;


    private $contract;

    public function setContract($contract)
    {
        $this->contract = $contract;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {

        $rate = new Rate([
            'origin' => $row['POL'],
            'destination' => $row['POD'],
            'currency' => $row['Curr.'],
            'twenty' => $row["20'GP"],
            'forty' =>  $row["40'GP"],
            'fortyhc' => $row["40'HC"],
        ]);
        $rate->contract()->associate($this->contract);
        return $rate;
    }
}
