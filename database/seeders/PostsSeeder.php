<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run()
    {
        // Crear 3 posts para cada usuario
        Usuario::all()->each(function ($usuario) {
            Post::factory(3)->create(['usuario_id' => $usuario->id]);
        });
    }
}
