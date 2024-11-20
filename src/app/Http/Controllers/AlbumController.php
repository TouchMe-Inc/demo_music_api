<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return AlbumResource::collection($albums);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequest $request)
    {
        $album = Album::create($request->validated());

        return new AlbumResource($album);
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $album->update($request->validated());

        return new AlbumResource($album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json(null, 204);
    }
}
