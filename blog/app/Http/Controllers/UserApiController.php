<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserApiController extends Controller
{
    //
    public function getAllUsers(Request $request){
        $user = $request->user();
        if($user->user_role == 0)
        {
            return User::all();
        }
        return response()->json([
            'message'=> 'Unauthorized'
         ], 401);
    }

    public function update($id ,Request $request){
        $user = $request->user();
        if($user->user_role == 0 or $user->id == $id)
        {
            $userToUpdate = User::find($id);
            $request->validate([
                'name'=> 'required|string',
                'email'=> 'required|string|email',
            ]);

            if($userToUpdate != null)
            {
                $userToUpdate->name = $request->name;
                $userToUpdate->email = $request->email;
    
                $userToUpdate->save();
    
                return $userToUpdate;
            }
            else
            {
                return response()->json([
                    'message'=> 'There is no user with an ID ' . $id
                ],400);
            }
        }
        return response()->json([
            'message'=> 'Unauthorized'
         ], 401);
    }

    public function changePassord($id ,Request $request){
        $user = $request->user();
        if($user->user_role == 0 or $user->id == $id)
        {
            $userToUpdate = User::find($id);
            $request->validate([
                'password'=> 'required|string|confirmed'
            ]);

            if($userToUpdate != null)
            {
                $userToUpdate->password = bcrypt($request->password);

                $userToUpdate->save();
    
                return response()->json([
                    'message'=> 'Your password has been successfully updated!'
                 ]);
            }
            else
            {
                return response()->json([
                    'message'=> 'There is no user with an ID ' . $id
                ],400);
            }
        }
        return response()->json([
            'message'=> 'Unauthorized'
         ], 401);
    }

    public function deleteUser($id ,Request $request){

        $user = $request->user();

        if($user->user_role == 0 or $user->id == $id)
        {
            $userToDelete = User::find($id);

            //$userToDelete->token()->revoke();
            if($userToDelete != null)
            {
                if($userToDelete->delete())
                {
                    return response()->json([
                        'message'=> 'Your account has been successfully deleted!'
                    ]);
                }
            }
            else
            {
                return response()->json([
                    'message'=> 'There is no user with an ID ' . $id
                ],400);
            }

        }
        return response()->json([
            'message'=> 'Unauthorized'
         ], 401);



    }
}
