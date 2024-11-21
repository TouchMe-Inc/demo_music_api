<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumSongRequest;
use App\Services\AlbumSongService;

/**
 * @OA\Tag(
 *     name="AlbumSong",
 * )
 */
class AlbumSongController extends Controller
{
    private $albumSongService;

    public function __construct(AlbumSongService $albumSongService)
    {
        $this->albumSongService = $albumSongService;
    }

    /**
     * @OA\Get(
     *     path="/api/albums/{album}/songs",
     *     summary="Display album songs",
     *     tags={"AlbumSong"},
     *     @OA\Parameter(name="album", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="All album songs are shown")
     * )
     */
    public function index($album)
    {
        $songs = $this->albumSongService->getSongsFromAlbum($album);

        return response()->json($songs);
    }

    /**
     * @OA\Post(
     *     path="/api/albums/{album}/songs",
     *     summary="Add song to album",
     *     tags={"AlbumSong"},
     *     @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/AlbumSongRequest")),
     *     @OA\Parameter(name="album", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="201", description="Song added to album successfully")
     * )
     */
    public function store(AlbumSongRequest $request, $album)
    {
        $this->albumSongService->addSongToAlbum(
            $album,
            $request->song_id,
            $request->track_number
        );

        return response()->json(['message' => 'Song added to album successfully.'], 201);
    }

    /**
     * @OA\Delete(
     *     path="/api/albums/{album}/songs/{song}",
     *     summary="Remove song from album",
     *     tags={"AlbumSong"},
     *     @OA\Parameter(name="album", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Parameter(name="song", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Song removed from album successfully")
     * )
     */
    public function destroy($album, $song)
    {
        $this->albumSongService->removeSongFromAlbum($album, $song);

        return response()->json(['message' => 'Song removed from album successfully.']);
    }
}
