<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Aqui hay que añadir los seeders que hemos creado y queremos ejecutar
        $this->call([
            UsuariosSeeder::class,
            PostsSeeder::class,
            ComentariosSeeder::class,
        ]);
    }
}

/*
Para eliminar los datos existentes y rellenar la base de datos con los nuevos elementos, usa el comando:
php artisan migrate:fresh --seed
*/
