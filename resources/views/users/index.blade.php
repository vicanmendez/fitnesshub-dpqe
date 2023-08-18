@extends('layouts.users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h2> Nuevo usuario </h2>
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
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
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
                  
                <div class="form-group">
                    <label for="name" class="sr-only">Nombre</label>
                    <input type="text" id="inputName" class="form-control" name="name" placeholder="Nombre" required autofocus>
                </div>
                <div class="form-group">
                    <label for="country" class="sr-only">País</label>
                    <select name="country" class="form-control" id="selectPais">
                        <option>Seleccione</option>
                    </select>

                </div>

                <div class="form-group">
                    <label for="provincia" class="sr-only">Departamento / Provincia </label>
                    <select name="province" class="form-control" id="selectProvincia">
                        <option>Seleccione</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ciudad" class="sr-only">Ciudad </label>
                    <select name="city" class="form-control" id="selectCiudad">
                        <option value="null">Seleccione</option>
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Guardar">
                    

            </form>

        </div>
    </div>
</div>
@endsection
