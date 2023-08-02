<?php

namespace App\Http\Controllers;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index() {
        $songs = Song::with('artist')->paginate(20);

        return view('songs.index', [
            'title' => 'Song Playlist',
            'songs' => $songs
        ]);
    }
}
