@extends('layouts.auth')

@section('title', 'Registro de usuarios')

@section('content')

<div class="container md-3 center">
    <form class="form-signin" method="POST" action="{{ route('register') }}">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal"> Formulario de registro </h1>
        <label for="name" class="sr-only">Nombre</label>
        <input type="text" id="inputName" class="form-control" name="name" placeholder="Tu nombre" required autofocus>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="tucorreo@dominio.com" required autofocus>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="tu contraseña de acceso" required>
        <label for="inputPassword" class="sr-only">Repetir la contraseña</label>
        <input type="password" id="inputPassword" class="form-control" name="password_confirmation" placeholder="La misma ingresada anteriormente" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
    </form>
</div>
    Si ya tienes cuenta, <a href="{{ route('login') }}">inicia sesión</a>

@endsection