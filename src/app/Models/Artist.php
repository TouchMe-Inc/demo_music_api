<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @OA\Schema(
 *     schema="Artist",
 *     type="object",
 *     title="Artist",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="name", type="string", example="Eminem"),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-21T11:28:35Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-21T11:28:35Z")
 *     }
 * )
 */
class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
