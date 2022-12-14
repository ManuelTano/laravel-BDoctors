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
use Illuminate\Support\Facades\DB;

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

    // Metodo che filtra i dottori in base al numero di recensioni

    public function filterByMoreReviews(){
        $users_by_more_reviews = Review::join('users','reviews.user_id','=','users.id')
        ->select('users.*',DB::raw('COUNT(reviews.user_id) as numero_recensioni'))
        ->orderBy('numero_recensioni','DESC')
        ->groupBy('reviews.user_id')
        ->get();
        return response()->json(compact('users_by_more_reviews'));
    }

    // Metodo che filtra i dottori in base al rating

    public function filterByBestRating(){
        $users_by_most_rating = Review::join('users','reviews.user_id','=','users.id')
        ->select('users.*',DB::raw('AVG(reviews.rating) as media'))
        ->orderBy('media','DESC')
        ->groupBy('users.id')
        ->get();
        return response()->json(compact('users_by_most_rating'));
    }

    // Metodo che consente di prelevare le reviews relative
    // ad un dottore

    public function fetchReviews($id){
        $user_reviews = Review::where('user_id',$id)->get();
        return response()->json(compact('user_reviews'));
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