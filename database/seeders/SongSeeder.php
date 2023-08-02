<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = Song::count();

        if($total > 0){
            echo "There are some songs in database \n";
            return ;
        }
        // $song = new Song();
        // $song->title = "Riyer";
        // $song->artist = "Miley Cyrus";
        // $song->duration = 33 * 60 + 20;
        // $song->save();

        // $song = new Song();
        // $song->title = "Song for you";
        // $song->artist = "Lee Isaacs";
        // $song->duration = 2 * 60 + 48;
        // $song->save();

        // $song = new Song();
        // $song->title = "คำถามซึง่ไร้คนตอบ";
        // $song->artist = "Getsunova";
        // $song->duration = 4 * 60 + 29;
        // $song->save();
        

        // Song::factory(500)->create();

        $artist = Artist::factory()->create();

        $song = Song::factory()
            ->count(10)
            ->for($artist)
            ->create();
    }
}
