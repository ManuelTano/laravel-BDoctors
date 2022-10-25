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
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Cript password
        $pass_to_crypt = Hash::make($request['password']);
        $request['password'] = $pass_to_crypt;

        $data = $request->all();

        $user->update($data);

        return redirect()->route('home');
    }
}
