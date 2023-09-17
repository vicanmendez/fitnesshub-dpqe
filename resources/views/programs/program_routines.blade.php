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


            <h2> Rutinas y actividades asignadas al programa </h2>
               
            @if (isset($routines))
             
               
                <form method="POST" action="{{ route('programs.routines.new', ['id'=>$program->id]) }}">
                    @csrf
                    <div class="form-group">
                        <select class="form-control col-md-9" id="selectRoutine" name="routine" onchange="loadRoutine()">
                            @foreach ($routines as $routine)
                                <option value="{{ $routine->id }}"> {{ $routine->title }} </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="btn btn-secondary" href={{ route('programs.routines', ['id'=> $program->id]) }}> Cancelar </a>
                </form>
            
                <h2> Actividades (rutinas) asignadas al programa </h2>
                <table class="table"> 
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                   
                        </tr>
                    </thead>
                    @forelse($routinePrograms as $re)
                        <tr>
                            <td> {{ $re->routine->id }} </td>
                            <td> {{ $re->routine->title }} </td>
                            <td> {{ $re->routine->type }} </td>
                            <td>
                                <a href="{{ route('programs.routines.delete', ['id'=>$program->id, 'id_rut'=>$re->routine->id]) }}" > Eliminar </a>
                            </td>
                        </tr>
                    @empty
                        <span class="text-danger"> No hay rutinas asignadas </span>
                    @endforelse
                </table>
    
            @else
                <span class="text-danger"> No hay rutinas disponibles </span>
                <a href = "{{ route('routines.new') }}"> Crear una </a>
            @endif
            <a class="btn btn-secondary" href="{{ route('programs') }}"> Regresar </a>
        

        </div>
    </div>
        


@endsection 