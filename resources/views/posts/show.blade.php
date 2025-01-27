@extends('plantilla')

@section('title', $post->titulo)

@section('content')
    <h1>{{ $post->titulo }}</h1>
    <p>Escrito por {{ $post->usuario ? $post->usuario->login : 'Usuario desconocido' }} el {{ $post->created_at->format('d/m/Y') }}</p>
    <p>{{ $post->contenido }}</p>

    <div class="mb-3">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar post</a>
    </div>

    <h2>Comentarios</h2>
    <ul>
        @foreach ($post->comentarios as $comentario)
            <li>
                <p>{{ $comentario->contenido }}</p>
                <small>Escrito por {{ $comentario->usuario ? $comentario->usuario->login : 'Usuario desconocido' }} el {{ $comentario->created_at->format('d/m/Y') }}</small>
            </li>
        @endforeach
    </ul>
@endsection
