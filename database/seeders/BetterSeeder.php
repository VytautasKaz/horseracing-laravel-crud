<?php

namespace Database\Seeders;

use App\Models\Better;
use Illuminate\Database\Seeder;

class BetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $better = new Better();
        $better->name = "Namey";
        $better->surname = "Surnamey";
        $better->bet = 500;
        $better->save();

        $better2 = new Better();
        $better2->name = "John";
        $better2->surname = "Cena";
        $better2->bet = 1000;
        $better2->save();

        $better3 = new Better();
        $better3->name = "Michael";
        $better3->surname = "Scott";
        $better3->bet = 200;
        $better3->save();
    }
}
