<?php

namespace App\Http\Controllers;

use App\Flight; 
use App\User;
use App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request

     */
    public function updateEmail(Request $request)
    {
       // $user = User::find({{ Auth::user()->id }});
        $user->name = $request;
        $user->save();
    }

        /**
     *
     * @param  Request  $request

     */
    public function updateUserData(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
       
        $user = Auth::user();

        $user->name = $name;
        $user->email = $email;

        $user->save();

        echo $user;
    }

    public function deleteUserData()
    {
        $user = Auth::user();
        Auth::logout();
        if ($user->delete()) 
        {  
            $message = "Your account has been deleted!";
            return redirect()->route('index', ['message'=> $message]);
            //return view('index', ['message'=> $message]);
        } 
        
    }

    /**
     * Show the profile for the given user for everone.
     *
     * @param int $id
     */
    public function ShowUserPerId($id)
    {
        if(Auth::Check())//check the Uesr is Loged in.
        {
            if(Auth::User()->user_role == 0)// to check if the User Admin or Not
            {
                $user = User::find($id);
                return view('showUser', ['user' => $user]);    
            }
            else
            {
                echo "You are not allowed to enter this page";
            }
        }
    }

    /**
     * Delete user by an given ID.
     * Admin Role requird.
     *
     * @param int $id
     */
    public function DeleteUserPerId($id)
    {
        if(Auth::Check())//check the Uesr is Loged in.
        {
            if(Auth::User()->user_role == 0)// to check if the User Admin or Not
            {
                $user = User::find($id);
                $user->delete();
                $message = "The account has been deleted!";
                return redirect()->route('index', ['message'=> $message]);
                //return view('index', ['message'=> $message]);
            }
            else
            {
                echo "You are not allowed to enter this page";
            }
        }
    }

    /**
     * Make a uer an admin.
     * Admin Role requird.
     *
     * @param int $id
     */
    public function MakeUserAdmin($id)
    {
        if(Auth::Check())//check the Uesr is Loged in.
        {
            if(Auth::User()->user_role == 0)// to check if the User Admin or Not
            {
                $user = User::find($id);
                $user->user_role = 0;
                $user->save();
                $message = "The account is an admin now!";
                return redirect()->route('index', ['message'=> $message]);
                // action('HomeController@index', ['message'=> $message]);
                //return view('index', ['message'=> $message]);
            }
            else
            {
                echo "You are not allowed to enter this page";
            }
        }
    }

    

    
}