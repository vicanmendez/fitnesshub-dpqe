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

    
    @if (isset($program))


        <h2> Editar programa</h2>
        <form method="POST" action="{{ route('programs.update', ['id' => $program->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"> Titulo </label>
                <input type="text" class="form-control" value="{{ $program->title }}" id="title" name="title" placeholder="Ej: Definición 2 meses" required>
            </div>
            <div class="form-group">
                <label for="description"> Tipo </label>
                <input type="text" class="form-control" value="{{ $program->type }}" id="type" name="type" placeholder="Ej: Alimentación" required>
            </div>
            
            <button type="submit" class="btn btn-primary"> Editar </button>
        </form>
    @else
        @if (isset($routine))
        <form method="POST" action="{{ route('routines.update', ['id' => $routine->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name"> Titulo </label>
                <input type="text" class="form-control" value="{{ $routine->title }}" id="title" name="title" placeholder="Ej: Tren superior" required>
            </div>
            <div class="form-group">
                <label for="description"> Tipo </label>
                <input type="text" class="form-control" value="{{ $routine->type }}" id="type" name="type" placeholder="Ej: Ejercicios" required>
            </div>
            <a class="btn btn-secondary" href="{{ route('programs') }}"> Volver </a>

            <button type="submit" class="btn btn-primary"> Editar </button>
        </form>
        @endif
    @endif

    </div>
</div>

@endsection