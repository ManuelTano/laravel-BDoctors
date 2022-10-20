<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str; 

use App\User;

class UserDetailController extends Controller
{
    public function edit(){
        // Preleviamo l'utente attualmente loggato nella sessione
        $user = Auth::user();

        // Preleviamo i suoi dati personali e passiamoli alla edit
        $details = $user->userDetail;
        return view('admin.userdetails.edit',compact('details'));
    }

    public function update(Request $request){

        // Preleviamo l'user e i suoi details
        // attualmente loggato in questa sessione
        $user = Auth::user();
        $details = $user->userDetail;

        // Validazione dei dati in arrivo
        // $request->validate([
        //     'first_name' => 'nullable|string',
        //     'last_name' => 'nullable|string',
        //     'year_of_birth' => 'nullable|date_format:Y',
        //     'address' => 'nullable|string',
        // ],[
        //     'numeric' => 'La data di nascita deve essere numerica!'
        // ]);

        // Assegnazione dei dati
        $data = $request->all();

        // Slug name
        $word_to_slug = $data['first_name'] . ' ' . $data['last_name'];

        // Slug time
        $details->slug = Str::of($word_to_slug)->slug('-');

        // Update dei dati
        $details->update($data);

        return redirect()->route('admin.users.index');
    }
}
