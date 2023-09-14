@extends('layouts.exercises')

@section('content')

<div class="container">

    
    <div class="row justify-content-center">
    <div class="col-md-8">

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

    


    <h2> Nuevo ejercicio </h2>
    <form method="POST" action="{{ route('exercises.update', $exercise->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name"> Nombre </label>
            <input type="text" value="{{ $exercise->name }}" class="form-control" id="name" name="name" placeholder="Nombre del ejercicio" required>
        </div>
        <div class="form-group">
            <label for="description"> Descripción </label>
            <input type="text" value="{{ $exercise->description }}" class="form-control" id="description" name="description" placeholder="Descripción del ejercicio" required>
        </div>
        <div class="form-group">
            <label for="video_url"> URL del video </label>
            <input type="text" value="{{ $exercise->url_video }}"class="form-control" id="video_url" name="video_url" placeholder="URL del video">
        </div>
        <a class="btn btn-secondary" href="{{ route('exercises') }}"> Volver </a>

        <button type="submit" class="btn btn-primary"> Actualizar </button>
    </form>


    <div class="mt-3"> </div>


        </div>
    </div>
</div>
@endsection
