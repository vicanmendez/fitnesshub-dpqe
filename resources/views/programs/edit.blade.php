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

    


    <h2> Editar programa</h2>
    <form method="POST" action="{{ route('programs.new') }}">
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

    </div>
</div>

@endsection