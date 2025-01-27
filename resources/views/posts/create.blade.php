@extends('plantilla')

@section('title', 'Crear nuevo post')

@section('content')
    <h1>Crear nuevo post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                   id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control @error('contenido') is-invalid @enderror"
                      id="contenido" name="contenido" rows="5" required>{{ old('contenido') }}</textarea>
            @error('contenido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear post</button>
    </form>
@endsection
