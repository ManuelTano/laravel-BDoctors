<?php

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties=config('specialties');
        foreach ($specialties as $specialty) {
            $new_specialty = new Specialty();
            $new_specialty->label = $specialty;
            $new_specialty->save();
        }
    }
}
