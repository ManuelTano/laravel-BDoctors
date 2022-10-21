<?php

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([SpecialtySeeder::class, SponsorshipSeeder::class, UserSeeder::class, MessageSeeder::class]);
    }
}
