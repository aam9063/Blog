@extends('plantilla')

@section('title', 'Listado de Posts')

@section('content')
    <h1>Listado de Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <strong>{{ $post->titulo }}</strong>
                <!-- $post->usuario->login Obtenemos el login del usuario asociado al post -->
                <!-- Si el post tiene un usuario asociado, mostramos el login del usuario, si no, mostramos 'Usuario desconocido' -->
                ({{ $post->usuario ? $post->usuario->login : 'Usuario desconocido' }})
                <a href="{{ route('posts.show', $post->id) }}">Ver</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{ $posts->links() }}
@endsection
