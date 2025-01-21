<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

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
        // return 'Nuevo post'; Exercise 1

        return redirect()->route('inicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id); // Busca el post por su id y si no lo encuentra lanza una excepción
        return view('post.show', compact('post')); // Retorna la vista con el post
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return 'Edición del post ' . $id;
        // Editar un post: http://localhost:8000/posts/1/editar

        return redirect()->route('inicio');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
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
