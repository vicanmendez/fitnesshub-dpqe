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
                    <label for="pais" class="form-label"> Ubicación </label>
                    <select name="country" class="form-control" id="selectCountry">
                        <option value="">Seleccione país</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                
                </div>
                

                
                <div class="form-group" id="provinceContainer" style="display: none;">
                    <label for="province" class="sr-only">Departamento / Provincia</label>
                    <select name="province" class="form-control" id="selectProvince">
                        <option value="">Seleccione provincia</option>
                    </select>
                </div>
    
                <div class="form-group" id="cityContainer" style="display: none;">
                    <label for="city" class="sr-only">Seleccione ciudad</label>
                    <select name="city_id" class="form-control" id="selectCity">
                        <option value="">Seleccione</option>
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="address">Direccion </label>
                    <input type="text" name="address" class="form-control" id="address" required>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectCountry = document.getElementById('selectCountry');
        var selectProvince = document.getElementById('selectProvince');
        var selectCity = document.getElementById('selectCity');
        var provinceContainer = document.getElementById('provinceContainer');
        var cityContainer = document.getElementById('cityContainer');


        selectCountry.addEventListener('change', function() {
            var countryId = this.value;
            if (countryId) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/get-provinces/' + countryId, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        provinceContainer.style.display = 'block';
                        cityContainer.style.display = 'none';
                        selectProvince.innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                provinceContainer.style.display = 'none';
                cityContainer.style.display = 'none';
                selectProvince.innerHTML = '<option value="">Seleccione</option>';
                selectCity.innerHTML = '<option value="">Seleccione</option>';
            }
        });

        selectProvince.addEventListener('change', function() {
            var provinceId = this.value;
            if (provinceId) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/get-cities/' + provinceId, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        cityContainer.style.display = 'block';
                        selectCity.innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                cityContainer.style.display = 'none';
                selectCity.innerHTML = '<option value="">Seleccione</option>';
            }
        });
    });
</script>
@endsection

 