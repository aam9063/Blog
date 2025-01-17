<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = array(
            array('id' => 1, 'title' => 'Post 1'),
            array('id' => 2, 'title' => 'Post 2'),
            array('id' => 3, 'title' => 'Post 3'),
            array('id' => 4, 'title' => 'Post 4'),
            array('id' => 5, 'title' => 'Post 5'),

        );

        return view('posts.index', compact('post'));
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
    public function show ($id)
    {
        return view('posts.show', ['id' => $id]);
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
    public function destroy(string $id)
    {
        //
    }
}
