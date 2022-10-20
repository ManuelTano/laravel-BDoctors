<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0 ; $i < 10 ; $i++){
            $new_user = new User();

            $new_user->name = $faker->name();
            $new_user->email = $faker->email();
            $new_user->password = bcrypt($faker->name());

            $new_user->save();
        } 
    }
}
