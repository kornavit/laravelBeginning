<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Song;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::get();
        return view('artists.index', [
            'artists' => $artists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // Dependency Injection
    {
        $artist_name = $request->get('name');
        if($artist_name == null){
            return redirect()->back();
        }
        
        $artist = new Artist();
        $artist->name = $artist_name;
        $artist->save();

        return redirect()->route('artists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('artists.show' , [
            'artist' => $artist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit',[
            'artist' => $artist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $artist->name = $request->get('name');
        $artist->save();
        return redirect()->route('artists.show', ['artist' => $artist]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        if($artist->songs->isEmpty()){
            $artist->delete();
            return redirect()->route('artists.index');
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new song of specified artist.
     * HTTP Method: GET
     * Route Path: /artists/{artist}/songs
     * Route Name: artists.songs.create
     */
    public function createSong(Artist $artist){
        return view('artists.create-song',[
            'artist' => $artist
        ]);
    }

    /**
     * Store a newly created song of specified artist in storage.
     * HTTP Method: POST
     * Route Path: /artists/{artist}/songs
     * Route Name: artists.songs.store
     */
    public function storeSong(Request $request, Artist $artist){
        $song = new Song(); // use App\Models\Song;
        $song->title = $request->get('title');
        $song->duration = $request->get('duration');

        // $song->artist_id = $artist->id;
        // $song->save();

        $artist->songs()->save($song);
        return redirect()->route('artists.show', ['artist' => $artist]);
    }
}
