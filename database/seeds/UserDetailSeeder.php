<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\User;
use App\Models\UserDetail;

use Illuminate\Support\Arr;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $details = Userdetail::all();

        foreach($details as $detail){
            $detail->thumb = Arr::random(config('images'));
            $detail->phone = $faker->e164PhoneNumber();

            $detail->save();
            
        }
    }
}
