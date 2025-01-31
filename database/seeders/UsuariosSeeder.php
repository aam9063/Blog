<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        // Crear el usuario admin
        Usuario::factory()->create([
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        // Crear 2 usuarios editores
        Usuario::factory(2)->create([
            'role' => 'editor'
        ]);
    }
}


// Despues de esto ejecutamos: php artisan migrate:fresh --seed
