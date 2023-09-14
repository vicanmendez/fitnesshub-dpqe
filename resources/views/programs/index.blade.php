@extends('layouts.programs')

@section('content')
<script>

window.onload = function() {
        document.getElementById("newProgram").style.display = "none";
        document.getElementByUd("newRoutine").style.display = "none";
    }

</script>


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

        <div id="newRoutine" style="display:none"> 
            <h2> Nueva Rutina </h2>
            <form method="POST" action="{{ route('routines.new') }}">
                @csrf
                <div class="form-group">
                    <label for="name"> Titulo </label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Ej: Tren superior" required>
                </div>
                <div class="form-group">
                    <label for="description"> Tipo </label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Ej: Ejercicios (o, dieta)" required>
                </div>
                
                <button type="submit" class="btn btn-primary"> Guardar </button>
                <button class="btn btn-secondary" onclick="closeNewRoutine()"> Cancelar </button>
            </form>
            
        </div>

        @if (isset($routines))
        <h2> Rutinas </h2>
        <button type="button" class="btn btn-primary" onclick="newRoutine()">
            Crear
        </button>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Tipo</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
        @forelse ($routines as $routine)
                <tr>
                    <td> {{ $routine->id }} </td>
                    <td> {{ $routine->title }} </td>
                    <td> {{ $routine->type }} </td>
                    <td>
                        <a href="{{ route('routines.edit', $routine->id) }}" > Editar </a> -
                        <a href="{{ route('routines.delete', $routine->id) }}" > Eliminar </a> -
                        <a href="{{ route('routines.exercises', $routine->id) }}" > Agregar ejercicios </a>
                    </td>
                </tr>

        @empty
            <p> No hay rutinas registradas </p>
        @endforelse
        </table>
    @endif

    <div class="mt-3"> </div>

    <div id="newProgram">
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
            
            <button type="submit" class="btn btn-primary"> Guardar </button>
            <button class="btn btn-secondary" onclick="closeNewProgram()"> Cancelar </button>
        </form>
    </div>




    <div class="mt-3"> </div>
      



            @if (isset($programs))
                <h2> Programas </h2>
                <button type="button" class="btn btn-primary" onclick="newProgram()">
                    Crear
                </button>
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
                                <a href="{{ route('programs.edit', $program->id) }}" > Editar </a> -
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

<script>
  

    function newProgram() {
        document.getElementById("newProgram").style.display = "block";
    }

    function closeNewProgram() {
        document.getElementById("newProgram").style.display = "none";
    }

    function newRoutine() {
        document.getElementById("newRoutine").style.display = "block";
    }

    function closeNewRoutine() {
        document.getElementById("newRoutine").style.display = "none";
    }
</script>
@endsection
