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
            $detail->thumb = "https://st.depositphotos.com/1371851/1256/i/600/depositphotos_12560182-stock-photo-handsome-man-with-eyeglasses.jpg";
            $detail->phone = $faker->e164PhoneNumber();

            // if($detail->thumb) Storage::delete($detail->thumb);
            // $thumb_link = Storage::put('users_thumb',$data['thumb']);
            // $details->thumb = $thumb_link;

            $detail->save();
            
        }
    }
}
