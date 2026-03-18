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
            'rol' => 'maestro',
            'email_verified_at' => now(), 
        ]);
    }
}