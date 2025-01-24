<?php

namespace Database\Factories;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    public function definition()
    {
        return [
            'contenido' => $this->faker->sentence(),
            'usuario_id' => Usuario::inRandomOrder()->first()->id,
            'post_id' => Post::inRandomOrder()->first()->id,
        ];
    }
}

// Generamos el seeder de Comentario: php artisan make:seeder ComentariosSeeder
