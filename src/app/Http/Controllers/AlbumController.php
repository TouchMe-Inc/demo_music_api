<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;

/**
 * @OA\Tag(
 *     name="Album",
 *     description="CRUD"
 * )
 */
class AlbumController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/albums",
     *     summary="Display all albums",
     *     tags={"Album"},
     *     @OA\Response(
     *          response=200,
     *          description="All albums are shown",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Album")
     *          )
     *      ),
     * )
     */
    public function index()
    {
        $albums = Album::all();
        return AlbumResource::collection($albums);
    }

    /**
     * @OA\Post(
     *     path="/api/albums",
     *     summary="Add album",
     *     tags={"Album"},
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/AlbumRequest")),
     *     @OA\Response(
     *         response=201,
     *         description="The album has been added",
     *         @OA\JsonContent(ref="#/components/schemas/Album")
     *     ),
     * )
     */
    public function store(AlbumRequest $request)
    {
        $album = Album::create($request->validated());

        return new AlbumResource($album);
    }

    /**
     * @OA\Get(
     *     path="/api/albums/{album}",
     *     summary="Get album",
     *     tags={"Album"},
     *     @OA\Parameter(name="album", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *          response=200,
     *          description="The album was shown",
     *          @OA\JsonContent(ref="#/components/schemas/Album")
     *     ),
     * )
     */
    public function show(Album $album)
    {
        return new AlbumResource($album);
    }

    /**
     * @OA\Put(
     *     path="/api/albums/{album}",
     *     summary="Update album",
     *     tags={"Album"},
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/AlbumRequest")),
     *     @OA\Parameter(name="album", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *          response="200",
     *          description="The artist has been updated",
     *          @OA\JsonContent(ref="#/components/schemas/Album")
     *     )
     * )
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $album->update($request->validated());

        return new AlbumResource($album);
    }

    /**
     * @OA\Delete(
     *     path="/api/albums/{album}",
     *     summary="Remove album",
     *     tags={"Album"},
     *     @OA\Parameter(name="album", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="The artist has been removed")
     * )
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return response()->json(null, 204);
    }
}
