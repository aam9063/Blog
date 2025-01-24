<?php

// para crear el modelo de Comentario con su migración:
//php artisan make:model Comentario -m


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['contenido', 'usuario_id', 'post_id']; // Campos que se pueden rellenar

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}

/*
Creamos el factory y el seeder de Comentario::
php artisan make:factory ComentarioFactory --model=Comentario

*/
