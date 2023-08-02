<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = Artist::count();
        if($total > 0){
            echo "There are {$total} artists in database \n";
            return ;
        }

        $artist = new Artist();
        $artist->name = "Miley Cyrus";
        $artist->save();

        $artist = Artist::factory()
            ->has(Song::factory()->count(10))
            ->create();
    }
}
