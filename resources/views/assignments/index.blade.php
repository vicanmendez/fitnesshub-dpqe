@extends('layouts.assignments')

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


            <h2> Planificación de actividades </h2>
               
             
            
                <form method="POST" action="{{ route('assignments.new') }}">
                    @csrf
                    <div class="form-group">
                        <label for="selectProgram"> Programa de actividades </label>
                        <select class="form-control col-md-9" id="selectProgram" name="program">
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}"> {{ $program->title }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seelctTrainer"> Entrenador a asignar </label>
                        <select class="form-control col-md-9" id="selectTrainer" name="trainer">
                            @foreach ($trainers as $trainer)
                                <option value="{{ $trainer->id }}"> {{ $trainer->user->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seelctTrainer"> Cliente a asignar </label>
                        <select class="form-control col-md-9" id="selectClient" name="client">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}"> {{ $client->user->name }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="description"> Descripción </label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Ej: Plan semanal de ejercicios para Juan Carlos" required>
                    </div>

                    <div class="form-group">
                        <label for="comments"> Comentarios (opcional) </label>
                        <input type="text" class="form-control" id="comments" name="comments" placeholder="Ej: Comentarios sobre el plan" >
                    </div>

                    <div class="form-group">
                        <label for="completed"> Completado </label>
                        <select class="form-control col-md-9" id="completed" name="completed">
                            <option value="0"> No </option>
                            <option value="1"> Si </option>
                        </select>
                    </div>
                    




                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <a class="btn btn-secondary" href={{ route('programs') }}> Cancelar </a>
                </form>
            
                <h2> Asignaciones de trabajo realizadas  </h2>
                <table class="table"> 
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Entrenador</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Programa</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Comentarios</th>
                        <th scope="col">Completado</th>
                        <th scope="col">Acciones</th>
                   
                        </tr>
                    </thead>
                    @forelse($assignments as $assignment)
                        <tr>
                            <td> {{ $assignment->id }} </td>
                            <td> {{ $assignment->trainer->user->name }} </td>
                            <td> {{ $assignment->client->user->name }} </td>
                            <td> {{ $assignment->program->title }} </td>
                            <td> {{ $assignment->description }} </td>
                            <td> {{ $assignment->comments }} </td>
                            <td> {{ ($assignment->completed == 0) ? "No" : "Si" }} </td>
                            <td>
                                <a href="{{ route('assignments.delete', ['id'=>$assignment->id ]) }}" > Eliminar </a>
                            </td>
                        </tr>
                    @empty
                        <span class="text-danger"> No hay planificaciones asignadas </span>
                    @endforelse
                </table>
    
            
            <a class="btn btn-secondary" href="{{ route('programs') }}"> Regresar </a>
        

        </div>
    </div>
        


@endsection 