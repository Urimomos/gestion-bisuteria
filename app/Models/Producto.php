<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   protected $primaryKey = 'idproducto';
    
    // Nombre de la tabla
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'precompra',
        'preventa',
        'inventario',
        'imagen',
    ];
}
