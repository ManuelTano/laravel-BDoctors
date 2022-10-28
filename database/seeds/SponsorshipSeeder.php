<?php

use Illuminate\Database\Seeder;
use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = config('sponsorships');
        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship();
            $new_sponsorship->business_plan = $sponsorship['business_plan'];
            $new_sponsorship->time_plan = $sponsorship['time_plan'];
            $new_sponsorship->price = $sponsorship['price'];
            $new_sponsorship->save();
        }
    }
}
