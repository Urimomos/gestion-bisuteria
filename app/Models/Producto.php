<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
   protected $primaryKey = 'idproducto';
    
   
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'categoria', 
        'ubicacion',
        'precompra',
        'preventa',
        'inventario',
        'imagen',
    ];
}
