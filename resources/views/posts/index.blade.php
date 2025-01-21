@extends('plantilla')

@section('title', 'Listado de Posts')

@section('content')
    <h1>Listado de Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                {{ $post->titulo }}
                <a href="{{ route('posts.show', $post->id) }}">Editar</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf <!-- token de seguridad -->
                    @method('DELETE') <!-- método de spoofing que permite enviar un formulario como DELETE -->
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{ $posts->links() }} <!-- links() lo que hace es mostrar los enlaces de paginación -->
@endsection
