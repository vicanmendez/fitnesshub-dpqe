@extends('layouts.clients')

@section('content')

    
    


    <div class="container">


                <div class="row justify-content-center">
                    <div class="col-md-8">

                        
                @if (isset($success) and count($success) > 0)
                    <div class="alert alert-success" role="alert">
                        {{ $success }}
                    </div>
                @endif

                @if (isset($errors) and count($errors) > 0))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors }}
                    </div>
                @endif
                <h2> {{ $client->user->name }} </h2>
                <form method="post" action="{{ route('clients.update', $client->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nombre </label>
                        <input type="text" name="name" value={{$name}} class="form-control" id="nameInput" placeholder="Nombre" required>
                    </div>
                
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" name="email" value={{$client->user->email}} class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="phone_prefix">Prefijo telefónico</label>
                            <input type="text" name="phone_prefix" value="{{ $phone_prefix }}" class="form-control" id="phone_prefix" required>
                        </div>
                        <div class="col-md-8">
                            <label for="phone">Teléfono</label>
                            <input type="text" name="phone" value="{{ $phone }}" class="form-control" id="phone" required>
                        </div>
                    </div>

                    <div id="genderInput" class="form-group">
                        <label for="genderSelect">Sexo</label>
                        <select name="gender" class="form-control" id="genderSelect">
                            <option value="Masculino" {{ $clientSex === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ $clientSex === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="No declara" {{ $clientSex === 'No declara' ? 'selected' : '' }}>No declara</option>
                        </select>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="height"> Altura (m) </label>
                            <input type="text" name="height" value="{{ $height }}" class="form-control" id="height">

                        </div>
                        <div class="col-md-6">
                            <label for="height"> Peso (kg) </label>
                            <input type="text" name="weight" value="{{ $weight }}" class="form-control" id="weight">
                            
                        </div>
                        
                    </div>

                    <div id="trainingTypeInput" class="form-group">
                        <label for="trainingTypeSelect">Tipo de entrenamiento</label>
                        <select name="training_type" class="form-control" id="trainingTypeSelect">
                            <option value="Presencial" {{ $training_type === 'Presencial' ? 'selected' : '' }}>Presencial</option>
                            <option value="Semi Presencial" {{ $training_type === 'Semi Presencial' ? 'selected' : '' }}>Semi Presencial</option>
                            <option value="Virtual" {{ $training_type === 'Virtual' ? 'selected' : '' }}>Virtual</option>
                        </select>
                    </div>

                    <div class="form-group">
                            <input type="checkbox" name="require_checkups" id="require_checkups" {{ $require_checkups === 1 ? 'checked' : '' }}> Requiere chequeos 
                    </div>
                    
                    <div class="form-group">
                            <label for="checkup_frequency">Frecuencia de chequeos</label>
                            <input type="text" name="checkup_frequency" value="{{ $checkup_frequency }}" class="form-control" id="checkup_frequency">
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" name="require_questionnaire" id="require_questionnaire" {{ $require_questionnaire === 1 ? 'checked' : '' }}> Requiere cuestionario
                    </div>
                    
                    <div class="form-group">
                        <label for="questionnaire_link"> Link al cuestionario (URL) </label>
                        <input type="text" name="questionnaire_link" value="{{ $questionnaire_link }}" class="form-control" id="questionnaire_link">
                    </div>

                    <div id="paymentStatusInput" class="form-group">
                        <label for="paymentStatusSelect">Estado de pago</label>
                        <select name="payment_status" class="form-control" id="paymentStatusSelect">
                            <option value="Al dia" {{ $payment_status === 'Al dia' ? 'selected' : '' }}>Al día</option>
                            <option value="Cuota vencida" {{ $payment_status === 'Cuota vencida' ? 'selected' : '' }}>Cuota vencida</option>
                            <option value="Pendiente" {{ $payment_status === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        </select>
                    </div>

                    <div id="paymentMethodInput" class="form-group">
                        <label for="paymentMethodSelect">Método de pago</label>
                        <select name="payment_method" class="form-control" id="paymentMethodSelect">
                            <option value="Tarjeta" {{ $payment_method === 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                            <option value="Transferencia bancaria" {{ $payment_method === 'Transferencia bancaria' ? 'selected' : '' }}>Transferencia bancaria</option>
                            <option value="Efectivo" {{ $payment_method === 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                        </select>
                    </div>
                    
                    <div id="installmentCurrencyInput" class="form-group">
                        <label for="installmentCurrencySelect">Moneda de la cuota</label>
                        <select name="installment_currency" class="form-control" id="installmentCurrencySelect">
                            <option value="USD" {{ $installment_currency === 'USD' ? 'selected' : '' }}> Dólar estadounidense </option>
                            <option value="EUR" {{ $installment_currency === 'EUR' ? 'selected' : '' }}> Euro </option>
                            <option value="UYU" {{ $installment_currency === 'UYU' ? 'selected' : '' }}> Peso Uruguayo </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="installment_amount">Monto de la cuota</label>
                        <input type="number" name="installment_price" value="{{ $installment_price }}" class="form-control" id="installement_price">
                    </div>
                    
                    <div class="form-group">
                        <label for="last_payment_date">Último Pago</label>
                        <input type="date" name="last_payment_date" value="{{ $client->last_payment_date }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="next_expiring_date">Próxima Expiración</label>
                        <input type="date" name="next_expiring_date" value="{{ $client->next_expiring_date }}" class="form-control">
                    </div>
                    

                    <a class="btn btn-primary" href={{ route('clients') }}> Volver al listado </a>
            
                    <input type="submit" class="btn btn-danger" value="Actualizar datos">
                
                </form>

            </div>
        </div>
    </div>

 

@endsection