@extends('layouts.programs')

@section('content')

<script>
    window.onload = function() {
        loadExercise();
    }
    function loadExercise() {
        var id = document.getElementById("selectExercise").value;
        document.getElementById("load").href = "/rutinas/{{ $routine->id }}/ejercicios/" + id;
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
        
        <div class="mt-3"> </div>

        <span class="text-secondary"> Rutina: {{ $routine->title }} </span>
        <br>
        <span class="text-secondary"> Tipo de rutina: {{ $routine->type }} </span>

        
        <h2> Ejercicios de la rutina </h2>
               
        @if (isset($exercises))
            <div class="row">
                <select class="form-control col-md-9" id="selectExercise" name="exercise" onchange="loadExercise()">
                    @foreach ($exercises as $exercise)
                        <option value="{{ $exercise->id }}"> {{ $exercise->name }} </option>
                    @endforeach
                </select>
                <div class="col-sm-1"> </div>
                <a id="load" class="btn btn-primary col-sm-2" href={{ route('routines.exercises.load', ['id'=>$routine->id, 'id_ejer'=>$exercise->id])}}> + </a>
            </div>

            @if (isset($ex))
                    <form method="POST" action="{{ route('routines.exercises.new', ['id'=>$routine->id, 'id_ejer'=>$ex->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="sets"> Repeticiones </label>
                            <input type="text" class="form-control" id="sets" name="sets" placeholder="Ej: 10">
                        </div>
                        <div class="form-group">
                            <label for="repetitions"> Series </label>
                            <input type="text" class="form-control" id="repetitions" name="repetitions" placeholder="Ej: 3">
                        </div>
                        <div class="form-group">
                            <label for="weight"> Tiempo de actividad (segundos) </label>
                            <input type="number" class="form-control" id="exercise_seconds" name="exercise_seconds" placeholder="Ej: 20">
                        </div>
                        <div class="form-group">
                            <label for="rest_seconds"> Tiempo de descanso (segundos) </label>
                            <input type="number" class="form-control" id="rest_seconds" name="rest_seconds" placeholder="Ej: 10">
                        </div>
                        <div class="form-group">
                            <label for="progress_metric"> Métrica de progreso (ejemplo: Kg) </label>
                            <input type="text" class="form-control" id="progress_metric" name="progress_metric" placeholder="Ej: Kg -en ejercicios de peso- o Segundos -en ejercicios por tiempo-">
                        </div>
                        <div class="form-group">
                            <label for="progress_value"> Valor de exigencia (ejemplo: 10) </label>
                            <input type="number" class="form-control" id="progress_value" name="progress_value" placeholder="Ej: 10 -si anteriormente se ingresó 'Kg', son 10 Kg-">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <a class="btn btn-secondary" href={{ route('routines.exercises', ['id'=> $routine->id]) }}> Cancelar </a>
                    </form>
            @endif
        
            <h2> Actividades de la rutina </h2>
            <table class="table"> 
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ejercicio</th>
                    <th scope="col">Repeticiones</th>
                    <th scope="col">Series</th>
                    <th scope="col">Segs. de actividad</th>
                    <th scope="col">Segs. de descanso</th>
                    <th scope="col">Métrica</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                @forelse($routineExercises as $re)
                    <tr>
                        <td> {{ $re->id }} </td>
                        <td> {{ $re->exercise->name }} </td>
                        <td> {{ $re->sets }} </td>
                        <td> {{ $re->repetitions }} </td>
                        <td> {{ $re->exercise_seconds }} </td>
                        <td> {{ $re->rest_seconds }} </td>
                        <td> {{ $re->progress_metric }} </td>
                        <td> {{ $re->progress_value }} </td>
                        <td>
                            <a href="{{ route('routines.exercises.delete', ['id'=>$routine->id, 'id_ejer'=>$re->exercise->id]) }}" > Eliminar </a>
                        </td>
                    </tr>
                @empty
                    <span class="text-danger"> No hay ejercicios asignados </span>
                @endforelse
            </table>

        @else
            <span class="text-danger"> No hay ejercicios disponibles </span>
            <a href = "{{ route('exercises.index') }}"> Crear uno </a>
        @endif
        <a class="btn btn-secondary" href="{{ route('programs') }}"> Volver </a>

    </div>
</div>

@endsection