<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     schema="Album",
 *     type="object",
 *     title="Album",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="title", type="string", example="Rapgod"),
 *         @OA\Property(property="artist_id", type="integer", example="1"),
 *         @OA\Property(property="release_year", type="integer", example="2007"),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-21T11:28:35Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-21T11:28:35Z")
 *     }
 * )
 */
class Album extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'artist_id', 'release_year'];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class)->withPivot('track_number');
    }
}
