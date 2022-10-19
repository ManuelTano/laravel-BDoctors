<?php

use Illuminate\Database\Seeder;
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
        $users = User::all();

        foreach($users as $user){
            $new_message = new Message();

            $new_message->user_id = $user->id;

            $new_message->first_name = $faker->firstName();
            $new_message->last_name = $faker->lastName();
            $new_message->text = $faker->paragraphs();

            $new_message->save();
        }
    }
}
