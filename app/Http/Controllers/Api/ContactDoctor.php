<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

use Illuminate\Support\Facades\Validator;

class ContactDoctor extends Controller
{
    public function sendNewMessage(Request $request,$id){
        $data = $request->all();

        // Validiamo ciò che ci arriva dal form Front-end
        $validator = Validator::make($data , [
            'first_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'text' => 'required|string',
        ]);

        $new_message = new Message();

        $new_message->user_id = $id;

        $new_message->fill($data);

        $new_message->save();

        return response()->json('ciao');
    }
}
