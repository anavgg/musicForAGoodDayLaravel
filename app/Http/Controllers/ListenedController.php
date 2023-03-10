<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listened;
use App\Models\Song;
use Illuminate\Http\Request;


class ListenedController extends Controller
{
    public function index() {

        $listeneds = Listened::with(['user', 'song'])->get();
        return view('listened.index', compact('listeneds'));
        // $listened = Listened::all();
        // return view('listened.index', compact('listened'));
    }

    public function markAsListened(Song $song) {
        $listened = new Listened();
        $listened->song_id = $song->id;
        $listened->user_id = auth()->id();
        $listened->save();
        $song->listened = 'yes';
        $song->save();

        return redirect()->route('listened.index')->with('success', 'Song marked as listened!!');
    }
}
