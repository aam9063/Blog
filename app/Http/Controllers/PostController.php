<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Usuario;
use App\Models\Comentario;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén los posts paginados
        $posts = Post::orderBy('titulo', 'asc')->paginate(5);

        // Retorna la vista con los datos paginados
        return view('posts.index', compact('posts'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // En su lugar, mostrar la vista del formulario
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // Los datos ya están validados por el PostRequest
        $usuario = Usuario::first();
        if (!$usuario) {
            $usuario = Usuario::create([
                'login' => 'default_user',
                'password' => bcrypt('password')
            ]);
        }

        Post::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'usuario_id' => $usuario->id
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); // Busca el post por su id y si no lo encuentra lanza una excepción
        return view('posts.show', compact('post')); // Retorna la vista con el post
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, $id)
    {
        // Los datos ya están validados por el PostRequest
        $post = Post::findOrFail($id);
        $post->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido
        ]);

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Primero eliminamos los comentarios asociados
        Comentario::where('post_id', $id)->delete();

        // Luego eliminamos el post
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function nuevoPrueba()
    {
        Post::create([
            'titulo' => 'Title ' . rand(1, 100),
            'contenido' => 'Content ' . rand(1, 255),
        ]);
        return redirect()->route('posts.index');
    }

    public function editarPrueba($id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'titulo' => 'Updated Title ' . rand(1, 100),
            'contenido' => 'Updated Content ' . rand(1, 255),
        ]);
        return redirect()->route('posts.index');
    }
}
