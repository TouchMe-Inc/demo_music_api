<?php

namespace App\Services;

use App\Models\AlbumSong;

class AlbumSongService
{
    public function addSongToAlbum($albumId, $songId, $trackNumber)
    {
        AlbumSong::create([
            'album_id' => $albumId,
            'song_id' => $songId,
            'track_number' => $trackNumber,
        ]);
    }

    public function removeSongFromAlbum($albumId, $songId)
    {
        AlbumSong::where('album_id', $albumId)
            ->where('song_id', $songId)
            ->delete();
    }

    public function getSongsFromAlbum($albumId)
    {
        $albumSongs = AlbumSong::where('album_id', $albumId)->with('song')->get();

        return $albumSongs->map(function ($albumSong) {
            return [
                'id' => $albumSong->song->id,
                'title' => $albumSong->song->title,
                'track_number' => $albumSong->track_number,
            ];
        });
    }
}
