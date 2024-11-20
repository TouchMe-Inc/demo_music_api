<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AlbumSong extends Pivot
{
    protected $table = 'album_songs';

    protected $fillable = ['album_id', 'song_id', 'track_number'];
}
