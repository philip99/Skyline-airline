<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ApiController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
            'name'=> 'required|string',
            'email'=> 'required|string|email||unique:users',
            'password'=> 'required|string|confirmed'
        ]);
        $user = new User([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
            'user_role'=> 1,
        ]);
        $user->save();
        return response()->json([
            'message'=> 'Hey Student a user was created'
        ], 201);
    }

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|string|email',
            'remember_me'=> 'boolean'
        ]);
        $userCredentials = request(['email', 'password']);
        if(!Auth::attempt($userCredentials))
            return response()->json([
               'message'=> 'Unauthorized'
            ], 401);

         $user = $request->user();
         $tokenResult = $user->createToken('User Personal Access Token');
         $token = $tokenResult->token;

         if($request->remember_me){
             $token->expires_at = Carbon::now()->addWeeks(2);
         }
        $token->save();
        return response()->json([
           'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateString()
        ]);

    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message'=> 'You have been logged out!'
        ]);
    }

    public function profile(Request $request){
        return response()->json($request->user());
    }
}
