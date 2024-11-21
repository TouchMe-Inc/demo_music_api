<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="AlbumRequest",
 *     type="object",
 *     title="AlbumRequest",
 *     required={"title", "artist_id", "release_year"},
 *     properties={
 *         @OA\Property(property="title", type="string", example="Rapgod"),
 *         @OA\Property(property="artist_id", type="integer", example="1"),
 *         @OA\Property(property="release_year", type="integer", example="2007"),
 *     }
 * )
 */
class AlbumRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        ];
    }
}
