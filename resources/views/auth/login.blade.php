@extends('plantilla')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="login">Usuario:</label>
        <input type="text" name="login" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Iniciar sesión</button>
    </form>
@endsection
