<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="AlbumSongRequest",
 *     type="object",
 *     title="AlbumSongRequest",
 *     required={"song_id", "track_number"},
 *     properties={
 *         @OA\Property(property="song_id", type="integer", example="1"),
 *         @OA\Property(property="track_number", type="integer", example="1"),
 *     }
 * )
 */
class AlbumSongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'song_id' => 'required',
            'track_number' => 'required|integer',
        ];
    }
}
