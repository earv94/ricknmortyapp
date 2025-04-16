@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar personaje</h1>


<form action="{{ route('rick.update', $character->id) }}" method="POST" class="space-y-4">
    @csrf
    <label>Nombre: <input type="text" name="name" value="{{ $character->name }}" class="border rounded w-full p-2"></label><br>
    <label>Status: <input type="text" name="status" value="{{ $character->status }}" class="border rounded w-full p-2"></label><br>
    <label>Species: <input type="text" name="species" value="{{ $character->species }}" class="border rounded w-full p-2"></label><br>
    <label>Type: <input type="text" name="type" value="{{ $character->type }}" class="border rounded w-full p-2"></label><br>
    <label>Gender: <input type="text" name="gender" value="{{ $character->gender }}" class="border rounded w-full p-2"></label><br>
    <label>Origin Name: <input type="text" name="origin_name" value="{{ $character->origin_name }}" class="border rounded w-full p-2"></label><br>
    <label>Origin URL: <input type="text" name="origin_url" value="{{ $character->origin_url }}" class="border rounded w-full p-2"></label><br>
    <label>Image URL: <input type="text" name="image" value="{{ $character->image }}" class="border rounded w-full p-2"></label><br>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Actualizar</button>
</form>
@endsection
