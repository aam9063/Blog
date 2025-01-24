@extends('plantilla')

@section('title', $post->titulo)

@section('content')
    <h1>{{ $post->titulo }}</h1>
    <p>Escrito por {{ $post->usuario->login }} el {{ $post->created_at->format('d/m/Y') }}</p>
    <p>{{ $post->contenido }}</p>

    <h2>Comentarios</h2>
    <ul>
        @foreach ($post->comentarios as $comentario)
            <li>
                <p>{{ $comentario->contenido }}</p>
                <small>Escrito por {{ $comentario->usuario->login }} el {{ $comentario->created_at->format('d/m/Y') }}</small>
            </li>
        @endforeach
    </ul>
@endsection
