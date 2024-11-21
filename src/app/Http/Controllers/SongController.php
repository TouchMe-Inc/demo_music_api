<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Http\Resources\SongResource;
use App\Models\Song;

/**
 * @OA\Tag(
 *     name="Song",
 *     description="CRUD"
 * )
 */
class SongController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/songs",
     *     summary="Display all songs",
     *     tags={"Song"},
     *     @OA\Response(response="200", description="All songs are shown")
     * )
     */
    public function index()
    {
        $songs = Song::all();
        return SongResource::collection($songs);
    }

    /**
     * @OA\Post(
     *     path="/api/songs",
     *     summary="Add new song",
     *     tags={"Song"},
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/SongRequest")),
     *     @OA\Response(response="201", description="The song has been added")
     * )
     */
    public function store(SongRequest $request)
    {
        $song = Song::create($request->validated());

        return new SongResource($song);
    }

    /**
     * @OA\Get(
     *     path="/api/songs/{song}",
     *     summary="Get song",
     *     tags={"Song"},
     *     @OA\Parameter(name="song", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *          response=200,
     *          description="The song was shown",
     *          @OA\JsonContent(ref="#/components/schemas/Song")
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="Song not found",
     *     ),
     * )
     */
    public function show(Song $song)
    {
        return new SongResource($song);
    }

    /**
     * @OA\Put(
     *     path="/api/songs/{song}",
     *     summary="Update song",
     *     tags={"Song"},
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/SongRequest")),
     *     @OA\Parameter(name="song", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="The song has been updated")
     * )
     */
    public function update(SongRequest $request, Song $song)
    {
        $song->update($request->validated());

        return new SongResource($song);
    }

    /**
     * @OA\Delete(
     *     path="/api/songs/{song}",
     *     summary="Remove song",
     *     tags={"Song"},
     *     @OA\Parameter(name="song", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="The song has been removed")
     * )
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return response()->json(null, 204);
    }
}
