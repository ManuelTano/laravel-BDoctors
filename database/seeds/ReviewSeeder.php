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
        $users = User::pluck('id')->toArray();

        foreach($users as $user){
            $new_review = new Review();

            $new_review->user_id = $user;

            $new_review->first_name = $faker->firstName();
            $new_review->last_name = $faker->lastName();
            $new_review->feedback = $faker->paragraph();
            $new_review->rating = $faker->numberBetween(0, 5);

            $new_review->save();
        }
    }
}