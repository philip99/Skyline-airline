<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;
use App; 
use Illuminate\Support\Facades\Auth;
use App\Mail\ReservationConfirmation; 

class FlightController extends Controller
{
    /**
     *
     * @param  string  $city

     */
    public function SearchPerCity($city)
    {
        $flights = Flight::all()->where('destPlace' , $city);

        return view('city', ['flights' => $flights]);
        //echo $flights;
    }

    /**
     * @param int $id
     */
    public function getAllInfo($id) 
    {
        $flights = App\Flight::all()->where('flightNr', $id); 
        return view('details', ['flights'=> $flights]); 
    }

    public function getAllFlights() 
    {
        $flights = Flight::all();
        return view('city', ['flights'=> $flights]); 
    }

    public function bookFlight(Request $request)
    {  
       $flightId = $request->input('flightId');
     
      $flight = Flight::find($flightId);
   
     if(Auth::check())
     {
        return view('bookflight', ['flight'=>$flight]); 
     }
     else 
     {
         echo "You need to be logged in";
     }
      
    }

    public function ticketReservation(Request $request)
    {  
        if(Auth::check())
        {
            $flightId = $request->input('flightId'); 
            $userId = $request->input('id');

            $flight = Flight::find($flightId);
    
            $user = Auth::user();
    
            $user->flights()->save($flight);

            //Send a confirmation email with details of the flight 
            \Mail::to($user)->send(new ReservationConfirmation($user, $flight)); 

            return view('ticket', ['flight'=> $flight , 'user'=>$user]); 
        }
        else 
        {
            echo "Please, log in!";
        }
    }
     
    public function searchFlightByDate(Request $request) 
    {
        $flightDepartureDate = $request->input('DepartureDate');
        $flightArriveDate = $request->input('ArriveDate');
        $flights = Flight::searchByDate($flightDepartureDate);

        return view('city', ['flights'=> $flights]); 

    }

 
}
