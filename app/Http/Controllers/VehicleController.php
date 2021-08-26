<?php

namespace App\Http\Controllers;

use App\Imports\VehiclesImport;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function import()
    {
        /* return (new VehiclesImport)->import('vehicles.xlsx'); */

        (new VehiclesImport)->import('vehicles.xlsx');

        return redirect('/')->with('success', 'File imported successfully!');
    }
}
