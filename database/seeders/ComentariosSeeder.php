<?php

namespace Database\Seeders;

use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    public function run()
    {
        // Generar 3 comentarios por cada post
        Post::all()->each(function ($post) {
            Comentario::factory(3)->create(['post_id' => $post->id]);
        });
    }
}

// Aplicamos las migraciones y los seeders reiniciando la base de datos y rellenar con datos: php artisan migrate:fresh --seed
