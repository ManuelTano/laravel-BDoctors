<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactDoctor extends Controller
{
    public function sendNewMessage(){
        // Validiamo ciò che ci arriva dal form Front-end
        $validation = $request->validate([
            'first_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'text' => 'required|string',
        ],[]);

        // Passiamo i dati in una nuova variabile
        $data = $request->all();

        // Creiamo una nuova recensione
        $new_message = new Message();

        // Filliamo i campi
        $new_message->fill($data);

        if($validation->fails()) return response()->json(compact('Non è stato possibile inviare il tuo messaggio!'));
        return response()->json(compact('Il tuo messaggio è stata inviata con successo!'));
    }
}
