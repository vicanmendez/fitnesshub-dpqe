@extends('layouts.clients')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (isset($clients))
                <h2> Clientes </h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                @forelse ($clients as $client)
                        <tr>
                            <td> {{ $client->id }} </td>
                            <td> {{ $client->user->name }} </td>
                            <td> {{ $client->user->email }} </td>
                            <td> {{ $client->user->city->name }} </td>
                            <td>
                                <a href="{{ route('clients.edit', $client->id) }}" > Editar </a>
                            </td>
                        </tr>

                @empty
                    <p> No hay clientes registrados </p>
                @endforelse
                </table>    
            @endif


        </div>
    </div>
</div>
@endsection
