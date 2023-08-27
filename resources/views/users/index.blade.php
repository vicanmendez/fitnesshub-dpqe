@extends('layouts.users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h2> Nuevo usuario </h2>
           @if (isset($success)) 
                <div class="alert alert-success" role="alert">
                    {{ $success }}
                </div>
            @endif
            <form method="post" action="{{ route('users.new')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Email </label>
                  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Rol</label>
                  @if($currentUser->is_admin === 1) 
                    <select name="role" class="form-control" id="roleSelect">
                        <option> Seleccione </option>
                        <option value="client"> Cliente </option>
                        <option value="trainer"> Entrenador </option>
                        <option value="admin"> Administrador </option>
                      </select>
                    </div>
                  @else 
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                        <option> Seleccione </option>
                        <option value="client"> Cliente </option>
                        <option value="trainer"> Entrenador </option>
                      </select>
                    </div>
                @endif

                <div id="genderInput" class="form-group" style="display:none">
                    <label for="genderSelect">Sexo</label>
                      <select name="gender" class="form-control" id="genderSelect">
                          <option> Seleccione </option>
                          <option value="Masculino"> Masculino </option>
                          <option value="Femenino"> Femenino </option>
                          <option value="No declara"> No declara </option>
                        </select>
                </div>


                  
                <div class="form-group">
                    <label for="gym">Gimnasio</label>
                    <select name="gym" class="form-control" id="gyms"> 
                        <option> Seleccione </option>
                            @forelse ($gyms as $gym)
                                <option value="{{ $gym->id }}"> {{ $gym->name }} </option>
                            @empty
                                <option value="1"> No hay gimnasios registrados </option>
                            @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="name"> Nombre de usuario</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
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
                    <select name="city" class="form-control" id="selectCity">
                        <option value="">Seleccione</option>
                    </select>
                </div>

                
                

                <input type="submit" class="btn btn-primary" value="Guardar">
                    

            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h2> Usuarios </h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Rol</th>
                </tr>
            </thead>
            @if (isset($users))
                @forelse ($users as $user)
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->city->name }} </td>
                        <td>
                        
                        @if ($user->role == 'trainer')
                            Entrenador
                        @elseif ($user->role == 'client')
                            Cliente
                        @elseif ($user->role == 'admin')
                            Administrador
                        @endif
                        </td>
                    </tr>
                @empty
                    <p> No hay usuarios registrados </p>
                @endforelse
            @endif

        </table>
        </div>
    </div>

</div>

<!-- JavaScript code to handle dynamic dropdowns -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectCountry = document.getElementById('selectCountry');
        var selectProvince = document.getElementById('selectProvince');
        var selectCity = document.getElementById('selectCity');
        var provinceContainer = document.getElementById('provinceContainer');
        var cityContainer = document.getElementById('cityContainer');
        var roleSelect = document.getElementById('roleSelect');

        roleSelect.addEventListener('change', function() {
            var role = this.value;
            if (role === 'client') {
                genderInput.style.display = 'block';
            } else {
                genderInput.style.display = 'none';
            }
        });

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
