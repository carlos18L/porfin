<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use App\Imports\InsumosImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::paginate(10); // Paginación de 10 registros
        return view('insumos.index', compact('insumos'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new InsumosImport, $request->file('file'));

        return redirect()->route('insumos.index')->with('success', 'Insumos importados correctamente.');
    }
    public function edit($id)
{
    $insumo = Insumo::findOrFail($id); // Encuentra el insumo por ID
    return view('insumos.edit', compact('insumo')); // Retorna la vista de edición con el registro
}

public function update(Request $request, $id)
{
    $request->validate([
        'obra' => 'required|string|max:255',
        'cantidad' => 'required|numeric',
        'descripcion' => 'required|string',
        'estado' => 'required|string',
        'codigo' => 'required|string|max:100',
        'concepto' => 'required|string',
        'unidad' => 'required|string|max:50',
        'fecha' => 'required|date',
    ]);

    $insumo = Insumo::findOrFail($id);
    $insumo->update($request->all()); // Actualiza el registro con los datos del formulario

    return redirect()->route('insumos.index')->with('success', 'Insumo actualizado correctamente.');
}


    public function destroy($id)
    {
        $insumo = Insumo::findOrFail($id);
        $insumo->delete();

        return redirect()->route('insumos.index')->with('success', 'Insumo eliminado correctamente.');
    }
}
