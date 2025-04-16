@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Personajes desde la Base de Datos</h1>

<a href="/rickandmorty" class="inline-block mb-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
    Volver a API
</a>

<table class="w-full table-auto bg-white rounded shadow">
    <thead>
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Nombre</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Specie</th>
            <th class="border px-4 py-2">Imagen</th>
            <th class="border px-4 py-2">Detalle</th>
            <th class="border px-4 py-2">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($characters as $char)
        <tr class="hover:bg-gray-100">
            <td class="border px-4 py-2">{{ $char->id }}</td>
            <td class="border px-4 py-2">{{ $char->name }}</td>
            <td class="border px-4 py-2">{{ $char->status }}</td>
            <td class="border px-4 py-2">{{ $char->species }}</td>
            <td class="border px-4 py-2">
                <img src="{{ $char->image }}" class="w-12 h-12 rounded-full"></td>
            <td class="border px-4 py-2">
                <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600"
                    onclick="alert(
                        'Type: {{ $char->type ?: 'N/A' }}\n' +
                        'Sex: {{ $char->gender }}\n' +
                        'Origin: {{ $char->origin_name }}\n' +
                        'Origin URL: {{ $char->origin_url }}'
                    )">Ver detalle
                </button>
            </td>
            <td class="border px-4 py-2">
                <a href="{{ url('/rickandmorty/edit/'.$char->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">
                    Editar
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
