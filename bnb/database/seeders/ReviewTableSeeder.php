<?php

namespace Database\Seeders;

use App\Models\Bookable;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookable::all()->each(function (Bookable $bookable) {
            $reviews = Review::factory(random_int(1, 30))->make();

            $bookable->reviews()->saveMany($reviews);
        });
    }
}
