<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\UserDetail;

// Importate per validare i dati in arrivo
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // ! Attenzione: la seguente funzione aggiorna ESCLUSIVAMENTE il profilo 
    // ! dell'utente LOGGATO

    public function update(Request $request)
    {
        // Preleviamo l'user attualmente loggato in questa sessione
        $user = Auth::user();

        // Validazione dei dati in arrivo
        $request->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'city' => 'required|regex:/^[\pL\s\-]+$/u',
            'address' => 'required|string',
            'email' => 'required|email',
            'specialties' => 'required',
            'password' => 'required|string|min:8',
        ]);

        $data = $request->all();

        // @ Facciamo il sync dei tags: elimina quelli di prima e metti quelli checkati 
        if(array_key_exists('specialties',$data)){
            $user->specialties()->sync($data['specialties']);
        }else{
            // Nel caso in cui non arriva nulla vuol dire che sono stati tutti
            // de-checkati e quindi col detach li leviamo tutti
            $user->specialties()->detach();
        }

        // Cript password
        $pass_to_crypt = Hash::make($request['password']);
        $request['password'] = $pass_to_crypt;

        $data = $request->all();

        $user->update($data);

        return redirect()->route('home');
    }
}
