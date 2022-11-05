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
        $users = User::with('specialties','userDetail','sponsorships')
        ->join('sponsorship_user','sponsorship_user.user_id','=','users.id')
        ->join('sponsorships','sponsorships.id','=','sponsorship_user.sponsorship_id')
        ->select('sponsorships.*','users.*')
        ->where('sponsorships.business_plan','<>','basic')
        ->orderBy('sponsorships.id','DESC')
        ->get();
        return response()->json(compact('users'));
    }

    // Metodo legato alla rotta che preleva un singolo
    // medico in funzione dell'id
    public function show($user){
        $result = User::with('specialties','sponsorships')
        ->join('user_details','users.id','=','user_details.user_id')
        ->where('users.id','=',$user)
        ->get();
        return response()->json(compact('result'));
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
        $users = User::with('specialties','userDetail','sponsorships')
        ->join('reviews','reviews.user_id','=','users.id')
        ->select('users.*',DB::raw('round(AVG(reviews.rating)) as media'),DB::raw('COUNT(reviews.user_id) as numero_recensioni'))
        ->groupBy('reviews.user_id')
        ->get();

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

    // # Metodo che RAFFINA il filtro dei dottori in base al numero di recensioni

    public function raffinateFilterByMoreReviews($query){
        $users_by_more_reviews = User::with('specialties','userDetail')
        ->join('reviews','reviews.user_id','=','users.id')
        ->select('users.*',DB::raw('COUNT(reviews.user_id) as numero_recensioni'))
        ->orderBy('numero_recensioni','DESC')
        ->groupBy('reviews.user_id')
        ->get();

        $raffinate_users = [];

        foreach($users_by_more_reviews as $user){
            foreach($user->specialties as $specialty){
                if($specialty->id == $query) $raffinate_users[] = $user;
            }
        }

        return response()->json(compact('raffinate_users'));
    }

     // # Metodo che RAFFINA il filtro dei dottori in base alla media voto

     public function raffinateFilterByBestRating($query){
        $users_by_best_rating = User::with('specialties','userDetail')
        ->join('reviews','reviews.user_id','=','users.id')
        ->select('users.*',DB::raw('round(AVG(reviews.rating)) as media'))
        ->orderBy('media','DESC')
        ->groupBy('users.id')
        ->get();

        $raffinate_users = [];

        foreach($users_by_best_rating as $user){
            foreach($user->specialties as $specialty){
                if($specialty->id == $query) $raffinate_users[] = $user;
            }
        }

        return response()->json(compact('raffinate_users'));
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