<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    // Laravel por defecto busca la tabla "clientes", pero es mejor asegurarlo
    protected $table = 'clientes';

    // Tu diagrama especifica idcliente como PK
    protected $primaryKey = 'idcliente';

    // Campos que permitiremos llenar masivamente
    protected $fillable = [
        'nombre',
        'AP', 
        'AM',
        'telefono',
        'email'
    ];  
}
