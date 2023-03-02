<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    //Obtenemos todas las canciones de la base de datos y las pasamos a la vista songs.index para que se muestren
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create()
    //Mostramos un formulario para que el usuario pueda crear una nueva cancion
    {
        return view('songs.create');
    }

    public function store(Request $request)
    //Guardamos una nueva canción en la base de datos y y redirigimos al usuario a la la vista song.index con un mensaje de exito
    {
        $song = new Song;
        $song->user_id = auth()->user()->id;
        $song->song = $request->song;
        $song->artist = $request->artist;
        $song->gender = $request->gender;
        $song->youtube = $request->youtube;
        $song->image = $request->image;
        $song->listened = $request->listened;
        $song->save();
        return redirect()->route('song.index')->with('success', 'Song created successfully!');
    }

    public function show(Song $song)
    //Mostramos los detalles de una cancion especifica (el parámetro $song es una instancia del modelo Song que se pasará a la vista songs.show)
    {
        return view('songs.show', compact('song'));
    }

    public function edit(Song $song)
    //Mostramos un formulario para que el usuario pueda editar una canción existente (el parámetro $song es una instancia del modelo Song que se pasará a la vista songs.edit)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    //Actualizamos una canción existente en la base de datos. La función recibe los datos enviados desde el formulario de edit  y actualiza las propiedades correspondientes del modelo Song. Guarda los cambios en la base de datos y redirige al usuario a songs.index con un mensaje de exito
    {
        $song->song = $request->song;
        $song->artist = $request->artist;
        $song->gender = $request->gender;
        $song->youtube = $request->youtube;
        $song->image = $request->image;
        $song->listened = $request->listened;
        $song->save();
        return redirect()->route('songs.index')->with('success', 'Song updated successfully!');
    }

    public function destroy(Song $song)
    // Elimina una cancion de la base de datos
    {
        $song->delete();
        return redirect()->route('songs.index')->with('success', 'Song deleted successfully!');
    }
}
