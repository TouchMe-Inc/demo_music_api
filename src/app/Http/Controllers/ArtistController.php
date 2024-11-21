<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;

/**
 * @OA\Tag(
 *     name="Artist",
 *     description="CRUD"
 * )
 */
class ArtistController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/artists",
     *     summary="Display all artists",
     *     tags={"Artist"},
     *     @OA\Response(response="200", description="All artists are shown")
     * )
     */
    public function index()
    {
        $artists = Artist::all();
        return ArtistResource::collection($artists);
    }

    /**
     * @OA\Post(
     *     path="/api/artists",
     *     summary="Add artist",
     *     tags={"Artist"},
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/ArtistRequest")),
     *     @OA\Response(response="201", description="The artist has been added")
     * )
     */
    public function store(ArtistRequest $request)
    {
        $artist = Artist::create($request->validated());

        return new ArtistResource($artist);
    }

    /**
     * @OA\Get(
     *     path="/artists/{artist}",
     *     summary="Get artist",
     *     tags={"Artist"},
     *     @OA\Parameter(name="artist", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="The artist was shown")
     * )
     */
    public function show(Artist $artist)
    {
        return new ArtistResource($artist);
    }

    /**
     * @OA\Put(
     *     path="/api/artists/{artist}",
     *     summary="Update artist",
     *     tags={"Artist"},
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/ArtistRequest")),
     *     @OA\Parameter(name="artist", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="The artist has been updated")
     * )
     */
    public function update(ArtistRequest $request, Artist $artist)
    {
        $artist->update($request->validated());

        return new ArtistResource($artist);
    }

    /**
     * @OA\Delete(
     *     path="/api/artists/{artist}",
     *     summary="Remove artist",
     *     tags={"Artist"},
     *     @OA\Parameter(name="artist", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="The artist has been removed")
     * )
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response()->json(null, 204);
    }
}
