<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArtistSeeder::class,
            SongSeeder::class,
            AlbumSeeder::class
        ]);
    }
}
