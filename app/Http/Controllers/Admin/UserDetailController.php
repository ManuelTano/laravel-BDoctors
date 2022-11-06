<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

// Importate per validare i dati in arrivo
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Str; 

use App\User;
use App\Models\UserDetail;
use App\Models\Specialty;

class UserDetailController extends Controller
{
    public function index(){
        $details = UserDetail::all();

        return view('admin.userdetails.index',compact('details'));
    }

    public function edit(){
        // Preleviamo l'utente attualmente loggato nella sessione
        $user = Auth::user();

        // Preleviamo tutte le specializzazioni
        $specialties = Specialty::all();

        // Preleviamo i suoi dati personali e passiamoli alla edit
        $details = $user->userDetail;

        // Specializzazioni del medico
        $prev_specialties = $user->specialties->pluck('id')->toArray();

        return view('admin.userdetails.edit',compact('details','specialties','prev_specialties'));
    }

    public function update(Request $request){

        // Preleviamo l'user e i suoi details
        // attualmente loggato in questa sessione
        $user = Auth::user();
        $details = $user->userDetail;

        // Validazione dei dati in arrivo
        $request->validate([
            'phone' => 'required|min:10|max:13',
            'thumb' => 'string',
            'curriculum_vitae' => 'string',
        ],[
            'min:10' => 'Il numero telefonico deve essere composto da almeno 10 caratteri',
            'max:13' => 'Il numero telefonico deve essere composto massimo 13 caratteri',
            'phone.required' => 'Il numero telefonico è un campo obbligatorio',
            'thumb.string' => 'L\'immagine deve essere una stringa',
            'curriculum_vitae.string' => 'Il curriculum vitae deve essere na stringa',
        ]);

        // Assegnazione dei dati
        $data = $request->all();

        // Update dei dati
        $details->update($data);

        return redirect()->route('home');
    }
}
