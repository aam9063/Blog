<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Usuario;
use App\Models\Comentario;
use App\Http\Requests\PostRequest;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

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


    public function edit(Post $post)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->id !== $post->usuario_id) {
            return redirect()->route('posts.index')->with('error', 'No tienes permiso para editar este post.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->id !== $post->usuario_id) {
            return redirect()->route('posts.index')->with('error', 'No tienes permiso para actualizar este post.');
        }

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post actualizado con éxito.');
    }

    public function destroy(Post $post)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->id !== $post->usuario_id) {
            return redirect()->route('posts.index')->with('error', 'No tienes permiso para eliminar este post.');
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post eliminado con éxito.');
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
