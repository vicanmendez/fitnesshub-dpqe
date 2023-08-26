<option value=""> Provincia / Departamento: </option>
@foreach ($provinces as $province)
    <option value="{{ $province->id }}">{{ $province->name }}</option>
@endforeach