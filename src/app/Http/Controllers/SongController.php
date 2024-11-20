<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Http\Resources\SongResource;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return SongResource::collection($songs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SongRequest $request)
    {
        $song = Song::create($request->validated());

        return new SongResource($song);
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return new SongResource($song);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SongRequest $request, Song $song)
    {
        $song->update($request->validated());

        return new SongResource($song);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return response()->json(null, 204);
    }
}
