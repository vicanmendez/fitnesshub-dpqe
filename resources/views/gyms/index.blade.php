@extends('layouts.gym')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
           <h2> Nuevo gimnasio </h2>
            <form method="post" action="{{ route('gyms.new')}}">
                @csrf
                <div class="form-group">
                  <label for="name">Nombre </label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
               
                <div class="form-group">
                    <label for="address">Direccion </label>
                    <input type="text" name="address" class="form-control" id="address" required>
                </div>

                <div class="form-group">
                    <label for="city">Ciudad </label>
                    <input type="number" name="city_id" class="form-control" id="city" required>
                </div>

                <div class="form-group">
                    <label for="phone"> Telefono  </label>
                    <input type="text" name="phone" class="form-control" id="phone">

                <div class="form-group">
                    <label for="lat">Latitud (para ubicar en maps) </label>
                    <input type="number" name="lat" class="form-control" id="lat">
                </div>

                <div class="form-group">
                    <label for="long">Longitud (para ubicar en maps) </label>
                    <input type="number" name="long" class="form-control" id="long">
                </div>
                <input type="submit" class="btn btn-primary" value="Guardar">
                    

            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
               <h2> Gimnasios </h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Longitud</th>
                    </tr>
                </thead>
                @forelse ($gyms as $gym) 
                    <tr>
                        <td> {{ $gym->id }} </td>
                        <td> {{ $gym->name }} </td>
                        <td> {{ $gym->address }} </td>
                        <td> {{ $gym->phone }} </td>
                        <td> {{ $gym->city->name }} </td>
                        <td> {{ $gym->lat }} </td>
                        <td> {{ $gym->long }} </td>
                    </tr>
                @empty
                    <span> No hay gimnasios registrados </span>
                @endforelse
            </table>
            </div>
        </div>
</div>
@endsection

 