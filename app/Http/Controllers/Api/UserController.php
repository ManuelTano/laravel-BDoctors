<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;
use App\Models\Review;
use App\Models\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('specialties')->get();
        return response()->json($users);
    }

    public function filterByInput($query){

        $users_by_firstname = User::with('specialties')
        ->where('first_name','like','%' . $query . '%')
        ->get();

        $users_by_lastname = User::with('specialties')
        ->where('last_name','like','%' . $query . '%')
        ->get();

        return response()->json(compact('users_by_firstname','users_by_lastname'));
    }

    public function filterBySpecialty($query){
        $users = User::with('specialties')->get();

        $users_by_specialty = [];

        foreach($users as $user){
            foreach($user->specialties as $specialty){
                if($specialty->id == $query) $users_by_specialty[] = $user;
            }
        }

        return response()->json(compact('users_by_specialty'));
    }

    // Metodo che consente di prelevare le reviews relative
    // ad un dottore

    public function fetchReviews($id){
        $user_reviews = Review::where('user_id',$id)->get();
        return response()->json(compact('user_reviews'));
    }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    // Metodo legato alla rotta che preleva un singolo
    // medico in funzione dell'id
    public function show($id)
    {
        $user = User::where('id',$id)->get();
        return response()->json(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}