<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = User::count();
        if($total > 0){
            echo "There are {$total} users in database \n";
            return ;
        }

        $user = User::factory()
            ->has(Playlist::factory()->count(10), 'playlists')
            ->create();
    }
}
