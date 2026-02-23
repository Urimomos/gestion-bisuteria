<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioPrincipalSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Dueña',
            'email' => 'bisuteria.miranda.mm@gmail.com',
            'password' => Hash::make('proyectosgB'),
            'rol' => 'maestro', // Asegúrate de asignar el rol aquí
            'email_verified_at' => now(), // Útil para que no pida verificar correo al desplegar
        ]);
    }
}