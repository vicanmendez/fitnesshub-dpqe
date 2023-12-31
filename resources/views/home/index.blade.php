@extends('layouts.app')

@section('title', 'Entrenamiento')

@section('content')


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h1 class="h2">Principal - Nuevos usuarios</h1>
      
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <button class="btn btn-sm btn-outline-secondary">Compartir</button>
          <button class="btn btn-sm btn-outline-secondary">Exportar</button>
        </div>
        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          Esta semana
        </button>
      </div>
    </div>

    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

    
  </main>

@endsection