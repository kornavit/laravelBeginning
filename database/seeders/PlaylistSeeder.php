<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = Playlist::count();
        if($total > 0){
            echo "There are {$total} playlists in database \n";
            return ;
        }

        $user = User::factory()->create();

        $playlist = Playlist::factory()
            ->count(10)
            ->for($user)->has(Song::factory()->count(10))
            ->create();
    }
}
