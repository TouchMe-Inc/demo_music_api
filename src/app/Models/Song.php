<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @OA\Schema(
 *     schema="Song",
 *     type="object",
 *     title="Song",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="title", type="string", example="Godzilla"),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-21T11:28:35Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-21T11:28:35Z")
 *     }
 * )
 */
class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class)->withPivot('track_number');
    }
}
