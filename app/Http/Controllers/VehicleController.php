<?php

namespace App\Http\Controllers;

use App\Imports\VehiclesImport;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function import(Request $request)
    {
        /* return (new VehiclesImport)->import('vehicles.xlsx'); */
        (new VehiclesImport)->import(request()->file('file'));
        /* (new VehiclesImport)->import('vehicles.xlsx'); */

        return redirect('/')->with('success', 'File imported successfully!');
    }
}
