<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAlbumSongRequest;
use App\Services\AlbumSongService;

class AlbumSongController extends Controller
{
    private $albumSongService;

    public function __construct(AlbumSongService $albumSongService)
    {
        $this->albumSongService = $albumSongService;
    }

    public function index($albumId)
    {
        $songs = $this->albumSongService->getSongsFromAlbum($albumId);

        return response()->json($songs);
    }

    public function store(AddAlbumSongRequest $request, $albumId)
    {
        $this->albumSongService->addSongToAlbum(
            $albumId,
            $request->song_id,
            $request->track_number
        );

        return response()->json(['message' => 'Song added to album successfully.'], 201);
    }

    public function destroy($albumId, $songId)
    {
        $this->albumSongService->removeSongFromAlbum($albumId, $songId);

        return response()->json(['message' => 'Song removed from album successfully.']);
    }
}
