@extends('layouts.programs')

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

    


    <h2> Nuevo programa</h2>
    <form method="POST" action="{{ route('programs.new') }}">
        @csrf
        <div class="form-group">
            <label for="name"> Titulo </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Ej: Definición 2 meses" required>
        </div>
        <div class="form-group">
            <label for="description"> Tipo </label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Ej: Alimentación" required>
        </div>
        
        <button type="submit" class="btn btn-primary"> Crear </button>
    </form>


    <div class="mt-3"> </div>


            @if (isset($programs))
                <h2> Programas </h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                @forelse ($programs as $program)
                        <tr>
                            <td> {{ $program->id }} </td>
                            <td> {{ $program->title }} </td>
                            <td> {{ $program->type }} </td>
                            <td>
                                <a href="{{ route('programs.edit', $program->id) }}" > Editar </a>
                                <a href="{{ route('programs.delete', $program->id) }}" > Eliminar </a>
                            </td>
                        </tr>

                @empty
                    <p> No hay programas registrados </p>
                @endforelse
                </table>    
            @endif


        </div>
    </div>
</div>
@endsection
