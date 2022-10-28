<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\User;
use App\Models\Review;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

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

    public function sendNewReview(){
        $text = 'invia recensione';
        return response()->json(compact('text'));
    }

    public function sendNewMessage(){
        $text = 'invia messaggio';
        return response()->json(compact('text'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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