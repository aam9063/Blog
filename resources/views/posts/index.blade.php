@extends('plantilla')

@section('title', 'Listado de Posts')

@section('content')
    <h1>Listado de Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <strong>{{ $post->titulo }}</strong>
                ({{ $post->usuario->login }})

                <a href="{{ route('posts.show', $post->id) }}">Ver</a>

                @auth
                    @if (Auth::user()->role === 'admin' || Auth::user()->id === $post->usuario_id)
                        <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    @endif
                @endauth
            </li>
        @endforeach
    </ul>

    {{ $posts->links() }}
@endsection

<!-- Esto asegura que solo el dueño del post pueda editarlo o eliminarlo. -->
