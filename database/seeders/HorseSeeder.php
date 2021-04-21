<?php

namespace Database\Seeders;

use App\Models\Horse;
use Illuminate\Database\Seeder;

class HorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horse = new Horse();
        $horse->name = "Jordan";
        $horse->runs = 6;
        $horse->wins = 6;
        $horse->about = "Would have at least 8, if he didn't retire.";
        $horse->save();

        $horse2 = new Horse();
        $horse2->name = "Blackbird";
        $horse2->runs = 5;
        $horse2->wins = 24;
        $horse2->about = "Great horse!";
        $horse2->save();

        $horse3 = new Horse();
        $horse3->name = "Mustang";
        $horse3->runs = 20;
        $horse3->wins = 10;
        $horse3->about = "50/50 chance to win!";
        $horse3->save();
    }
}
