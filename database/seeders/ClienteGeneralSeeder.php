<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        
        DB::table('clientes')->insertOrIgnore([
            'idcliente' => 1,
            'nombre' => 'CLIENTE GENERAL',
            'AP' => '',
            'AM' => '',
            'telefono' => '0000000000',
            'email' => 'general@zacatelco.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
