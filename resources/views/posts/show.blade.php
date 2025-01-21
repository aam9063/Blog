@extends('plantilla')

@section('title', 'Detalles del Post')

@section('content')
    <h1>{{ $post->titulo }}</h1>
    <p>{{ $post->contenido }}</p>
    <p>Creado el: {{ $post->created_at->format('d/m/Y') }}</p>
@endsection
