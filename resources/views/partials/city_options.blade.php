<option value=""> Ciudad: </option>
@foreach ($cities as $city)
    <option value="{{ $city->id }}">{{ $city->name }}</option>
@endforeach
