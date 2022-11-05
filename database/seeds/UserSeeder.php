<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Specialty;
use App\Models\UserDetail;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
        $faker->locale('it_IT');
        
        for($i = 0 ; $i < 10 ; $i++){

            $specialties_ids = Specialty::pluck('id')->toArray();

            $new_user = new User();

            $new_user->name = $faker->name();
            $new_user->first_name = $faker->firstName();
            $new_user->last_name = $faker->lastName();
            $new_user->email = $faker->email();
            $new_user->password = bcrypt($faker->name());
            $new_user->address = $faker->address();
            $new_user->city = 'Milano';

            $new_user->save();

            $user_specialties = [];

            while(count($user_specialties) == 0){
                foreach($specialties_ids as $specialty){
                    if($faker->boolean()) $user_specialties[] = $specialty;
                }
            }

            $new_user->specialties()->attach($user_specialties);

            // Creiamo i suoi dettagli in modo tale da agganciarli
            $details = new UserDetail();
            $details->user_id = $new_user->id;
            $details->save();
        } 
    }
}
