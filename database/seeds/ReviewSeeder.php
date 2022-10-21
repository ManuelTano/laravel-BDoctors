<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;


use App\User;
use App\Models\Review;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users_ids = User::pluck('id')->toArray();

        for($i = 0; $i < 20 ; $i++){
            $new_review = new Review();

            $new_review->user_id = Arr::random($users_ids);;

            $new_review->first_name = $faker->firstName();
            $new_review->last_name = $faker->lastName();
            $new_review->feedback = $faker->paragraph();
            $new_review->email = $faker->email();
            $new_review->rating = $faker->numberBetween(1,5);

            $new_review->save();
        }
    }
}