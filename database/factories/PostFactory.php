<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->paragraphs(3, true), // Texto largo
            'usuario_id' => Usuario::inRandomOrder()->first()->id, // Asociar a un usuario aleatorio
        ];
    }
}

// php artisan make:seeder PostsSeeder | Seeder para generar posts de prueba

