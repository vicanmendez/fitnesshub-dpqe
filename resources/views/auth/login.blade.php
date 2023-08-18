@extends('layouts.auth')

@section('title', 'Inicio de sesión')

@section('content')

<div class="container md-3 center">
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Por favor, inicia sesión</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="tucorreo@dominio.com" required autofocus>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="tu contraseña de acceso" required>
        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Recordarme
        </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    </form>

        Si no tienes cuenta, <a href="{{ route('register') }}">regístrate</a>

</div>

@endsection