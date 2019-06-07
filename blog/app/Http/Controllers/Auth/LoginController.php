<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;



use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }

    public function socialLogin()
    {
        return Socialite::driver("google")->redirect();
    }
  
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver("google")->user();
        //dd($userSocial);
        //$user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($userSocial)
        {
            $userFromDataBase= User::All()->where('email', $userSocial->email)->first();
            if($userFromDataBase)
            {
                Auth::login($userFromDataBase);
                return redirect()->action('HomeController@index');
            }
            else
            {
                $user = User::create([
                    'name' => $userSocial->name,
                    'email' => $userSocial->email,
                    'password' => "",
                    'user_role' => 1,
                    'profile_url' => null,
                    
                ]);
                $user->accessToken = $userSocial->token;
               Auth::login($user);
               return redirect()->action('HomeController@index');
            }

        }
        else
        {
          return view('auth.register', ['name' => $userSocial->getName(),'email'=> $userSocial->getEmail()]);
        }
    }

}
