<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;


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
        $users = User::pluck('id')->toArray();

        foreach($users as $user){
            $new_message = new Message();

            $new_message->user_id = $user;

            $new_message->first_name = $faker->firstName();
            $new_message->last_name = $faker->lastName();
            $new_message->text = $faker->paragraph();

            $new_message->save();
        }
    }
}
