<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
   protected $primaryKey = 'idproducto';
    
    // Nombre de la tabla
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'categoria', // Nuevo
        'ubicacion',
        'precompra',
        'preventa',
        'inventario',
        'imagen',
    ];
}
