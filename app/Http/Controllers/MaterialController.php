<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Imports\MaterialesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::paginate(10); // Lista los materiales con paginación
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new MaterialesImport, $request->file('file'));

        return redirect()->route('materials.index')->with('success', 'Materiales importados correctamente.');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:255',
            'concepto' => 'required|string|max:255',
            'unidad' => 'required|string|max:50',
            'fecha' => 'required|date',
            'cantidad' => 'required|numeric',
            'obra' => 'required|string|max:255',
        ]);

        $material = Material::findOrFail($id);
        $material->update($request->all());

        return redirect()->route('materials.index')->with('success', 'Material actualizado correctamente.');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material eliminado correctamente.');
    }
    public function show($id)
    {
        $material = Material::findOrFail($id); // Busca el material por ID
        return view('materials.show', compact('material')); // Envía a la vista
    }

}
