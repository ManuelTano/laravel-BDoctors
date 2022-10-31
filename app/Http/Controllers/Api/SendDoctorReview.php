<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SendDoctorReview extends Controller
{
    // Metodo che consente di inviare una nuova recensione

    public function sendNewReview(Request $request){

        // Validiamo ciò che ci arriva dal form Front-end
        $validation = Validator::make($request , [
            'first_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'feedback' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ],[]);

        // Passiamo i dati in una nuova variabile
        $data = $request->all();

        // Creiamo una nuova recensione
        $new_review = new Review();

        $new_review->user_id = 1;

        // Filliamo i campi
        $new_review->fill($data);

        // if($validation->fails()) return response()->json(compact('Non è stato possibile inviare la tua recensione!'));
        // return response()->json(compact('La tua recensione è stata inviata con successo!'));
        return response()->json(compact('data'));
        else return response('',204);
    }

}
