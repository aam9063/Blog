@extends('plantilla')

@section('title', 'Listado de posts')

@section('content')
    <h1>Listado de posts</h1>
    <ul>
        @foreach ($post as $item)
            <li>
                <a href="{{ route('posts.show', $item['id']) }}">{{ $item['title'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection
