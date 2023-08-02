<?php

namespace Database\Factories;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->realTextBetween(10,20,5),
            'artist_id'=> fake()->numberBetween(1,Artist::count()),
            'duration'=> fake()->numberBetween(2*60, 5*60)
        ];
    }
}
