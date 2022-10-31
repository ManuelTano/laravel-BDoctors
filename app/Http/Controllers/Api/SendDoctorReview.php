<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

use Illuminate\Support\Facades\Validator;

class SendDoctorReview extends Controller
{
    // Metodo che consente di inviare una nuova recensione

    public function sendNewReview(Request $request){

        $data = $request->all();

        // Validiamo ciò che ci arriva dal form Front-end
        $validator = Validator::make($data , [
            'first_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'feedback' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $new_review = new Review();

        $new_review->user_id = 1;

        $new_review->fill($data);

        $new_review->save();
        
        if($validator->fails()) return response()->json('La recensione non è stata inviata. Riprova più tardi.');
        else return response()->json('La recensione è stata inviata correttamente.');
    }

}
