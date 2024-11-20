<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\VehicleController;

Route::get('vehicles/import', [VehicleController::class, 'importForm'])->name('vehicles.importForm');
Route::post('vehicles/import', [VehicleController::class, 'import'])->name('vehicles.import');
Route::resource('vehicles', VehicleController::class);
use App\Http\Controllers\InsumoController;

Route::get('/insumos', [InsumoController::class, 'index'])->name('insumos.index');
Route::post('/insumos/import', [InsumoController::class, 'import'])->name('insumos.import');
Route::delete('/insumos/{id}', [InsumoController::class, 'destroy'])->name('insumos.destroy');
Route::get('/insumos/{id}/edit', [InsumoController::class, 'edit'])->name('insumos.edit');
Route::put('/insumos/{id}', [InsumoController::class, 'update'])->name('insumos.update');
use App\Http\Controllers\MaterialController;

Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
Route::post('/materials/import', [MaterialController::class, 'import'])->name('materials.import');
Route::get('/materials/{id}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('/materials/{id}', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('/materials/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');
Route::get('/materials/{id}', [MaterialController::class, 'show']);