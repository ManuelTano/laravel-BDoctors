<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;


use App\User;
use App\Models\Message;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $faker->locale('it_IT');
        
        $users_ids = User::pluck('id')->toArray();

        for($i = 0; $i < 100 ; $i++){
            $new_message = new Message();

            $new_message->user_id = Arr::random($users_ids);;

            $new_message->first_name = $faker->firstName();
            $new_message->last_name = $faker->lastName();
            $new_message->email = $faker->email();
            $new_message->text = $faker->paragraph();

            $new_message->save();
        }
    }
}
