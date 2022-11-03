<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\User;
use App\Models\UserDetail;

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
            $detail->thumb = $faker->image(360, 360, 'people', true);
            $detail->phone = $faker->e164PhoneNumber();

            $detail->save();
            
        }
    }
}
