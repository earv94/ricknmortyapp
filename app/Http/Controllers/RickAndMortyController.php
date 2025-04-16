<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Character;

class RickAndMortyController extends Controller
{
    public function index()
    {
        $characters = [];
        $url = 'https://rickandmortyapi.com/api/character';
        $next = $url;

        while ($next && count($characters) < 100) {
            $response = Http::get($next);
            $data = $response->json();
            $characters = array_merge($characters, $data['results']);
            $next = $data['info']['next'];
        }

        $characters = array_slice($characters, 0, 100);

        return view('rickandmorty.index', compact('characters'));
    }

    public function save()
    {
        $characters = [];
        $url = 'https://rickandmortyapi.com/api/character';
        $next = $url;

        while ($next && count($characters) < 100) {
            $response = Http::get($next);
            $data = $response->json();
            $characters = array_merge($characters, $data['results']);
            $next = $data['info']['next'];
        }

        $characters = array_slice($characters, 0, 100);

        foreach ($characters as $char) {
            Character::updateOrCreate(
                ['id' => $char['id']],
                [
                    'name' => $char['name'],
                    'status' => $char['status'],
                    'species' => $char['species'],
                    'type' => $char['type'],
                    'gender' => $char['gender'],
                    'origin_name' => $char['origin']['name'],
                    'origin_url' => $char['origin']['url'],
                    'image' => $char['image']
                ]
            );
        }

        return redirect()->route('rick.db');
    }

    public function fromDatabase()
    {
        $characters = Character::all();
        return view('rickandmorty.fromdb', compact('characters'));
    }

    public function edit($id)
    {
        $character = Character::findOrFail($id);
        return view('rickandmorty.edit', compact('character'));
    }

    public function update(Request $request, $id)
    {
        $character = Character::findOrFail($id);
        $character->update($request->all());

        return redirect()->route('rick.db')->with('success', 'Personaje actualizado correctamente.');
    }

}
