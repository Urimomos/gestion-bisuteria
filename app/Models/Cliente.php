<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $table = 'clientes';
    protected $primaryKey = 'idcliente';

    protected $fillable = [
        'nombre',
        'AP', 
        'AM',
        'telefono',
        'email'
    ];  
}
