<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;
    /*
    public function definition()
    {
        $login = $this->faker->unique()->word();

        return [
            'login' => $this->faker->unique()->word(),
            'password' =>  Hash::make($login), // Sin encriptar la contraseña para que sea más fácil de recordar
        ];
    }
*/
    public function definition()
    {
        $login = $this->faker->unique()->word();

        return [
            'login' => $login,
            'password' => Hash::make($login),
        ];
    }
    // php artisan make:seeder UsuariosSeeder | Seeder para generar 3 usuarios de prueba
    // php artisan make:factory PostFactory --model=Post | Factory para generar el factory de Post





    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
