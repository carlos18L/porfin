<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\VehiclesImport;
use Maatwebsite\Excel\Facades\Excel;

class VehicleController extends Controller
{
    public function importForm()
    {
        return view('vehicles.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new VehiclesImport, $request->file('file'));

        return redirect()->route('vehicles.index')->with('success', 'Vehículos importados correctamente.');
    }
}
