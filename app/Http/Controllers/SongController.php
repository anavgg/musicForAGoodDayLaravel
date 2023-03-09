<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    public function index()
    //Obtenemos todas las canciones de la base de datos y las pasamos a la vista songs.index para que se muestren
    {
        $songs = Song::all();
        return view('song.index', compact('songs'));
    }

    public function create()
    //Mostramos un formulario para que el usuario pueda crear una nueva cancion
    {
        return view('song.create');
    }

    public function store(Request $request)
{
    $rules = [
        'song' => 'required|max:255',
        'artist' => 'required|max:255',
        'gender' => 'required|max:255',
        'youtube' => 'required|url',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'listened' => 'required|in:yes,no'
    ];

    $messages = [
        'song.required' => 'The song field is required.',
        'artist.required' => 'The artist field is required.',
        'gender.required' => 'The gender field is required.',
        'youtube.required' => 'The youtube field is required.',
        'youtube.url' => 'The youtube field must be a valid URL.',
        'image.image' => 'The image field must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
        'image.max' => 'The image may not be greater than 2048 kilobytes.',
        'listened.required' => 'The listened field is required.',
        'listened.in' => 'The listened field must be either "yes" or "no".'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $song = new Song();
    $song->user_id = auth()->user()->id;
    $song->song = $request->post('song');
    $song->artist = $request->post('artist');
    $song->gender = $request->post('gender');
    $song->youtube = $request->post('youtube');
    $song->listened = $request->post('listened');
    $imagePath = $request->file('image')->store('/uploads');
    $song->image = asset($imagePath);

    // $image = $request->file('image');
    // $imageName = time() . '.' . $image->getClientOriginalExtension();
    // $image->move(public_path('uploads'), $imageName);

    // $song->image = '/uploads' . $imageName;

    // if($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $filename = time() . '.' . $image->getClientOriginalExtension();
    //     $path = 'public/uploads' . $filename;
    //     Storage::putFileAs($path, $image, $filename);
    //     $song->image = $filename;
    // }
    $song->save();
    return redirect()->route('song.index')->with('success', 'Song created successfully!');
    // $validatedData = $request->validate([
    //     'song' => 'required|string|max:255',
    //     'artist' => 'required|string|max:255',
    //     'gender' => 'required|string|max:255',
    //     'youtube' => 'required|string|max:255',
    //     'image' => 'nullable|image|max:2048',
    //     'listened' => 'required|in:yes,no',
    // ]);

    // $song = new Song;
    // $song->user_id = auth()->user()->id;
    // $song->song = $validatedData['song'];
    // $song->artist = $validatedData['artist'];
    // $song->gender = $validatedData['gender'];
    // $song->youtube = $validatedData['youtube'];
    // $song->listened = $request->listened ?? 'no';

    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $filename = time() . '_' . $image->getClientOriginalName();
    //     $path = $image->storeAs('public/uploads', $filename);
    //     $song->image = $filename;
    // }

    // $song->save();

    // return redirect()->route('song.index')->with('success', 'Song created successfully!');
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
