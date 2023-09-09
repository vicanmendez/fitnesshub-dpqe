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
    <form method="POST" action="{{ route('exercises.new') }}">
        @csrf
        <div class="form-group">
            <label for="name"> Nombre </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del ejercicio" required>
        </div>
        <div class="form-group">
            <label for="description"> Descripción </label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Descripción del ejercicio" required>
        </div>
        <div class="form-group">
            <label for="video_url"> URL del video </label>
            <input type="text" class="form-control" id="video_url" name="video_url" placeholder="URL del video">
        </div>
        <button type="submit" class="btn btn-primary"> Crear </button>
    </form>


    <div class="mt-3"> </div>


            @if (isset($exercises))
                <h2> Ejercicios </h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">URL del Video</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                @forelse ($exercises as $exercise)
                        <tr>
                            <td> {{ $exercise->id }} </td>
                            <td> {{ $exercise->name }} </td>
                            <td> {{ $exercise->description }} </td>
                            <td> {{ $exercise->video_url }} </td>
                            <td>
                                <a href="{{ route('exercises.edit', $exercise->id) }}" > Editar </a>
                            </td>
                        </tr>

                @empty
                    <p> No hay ejercicios registrados </p>
                @endforelse
                </table>    
            @endif


        </div>
    </div>
</div>
@endsection
