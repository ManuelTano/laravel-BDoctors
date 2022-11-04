<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Models\Sponsorship;

use Illuminate\Support\Arr;

class SponsorshipUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $sponsorship_ids = Sponsorship::pluck('id')->toArray();

        foreach($users as $user){
            $sponsor = [];
            $sponsor[] = Arr::random($sponsorship_ids);
            $user->sponsorships()->sync($sponsor);
        }
    }
}
