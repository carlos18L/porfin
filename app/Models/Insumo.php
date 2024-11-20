<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'obra',
        'cantidad',
        'descripcion',
        'estado',
        'codigo',
        'concepto',
        'unidad',
        'fecha'
    ];
}
