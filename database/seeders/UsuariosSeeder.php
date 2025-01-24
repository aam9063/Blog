<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        // Crea 3 usuarios usando el factory
        Usuario::factory(3)->create();
    }
}
