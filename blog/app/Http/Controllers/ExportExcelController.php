<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\User;
use Illuminate\Support\Facades\Auth;

class ExportExcelController extends Controller
{
    function index() 
    {
        $users = User::all(); 
        return view('export_excel')->with('users', $users); 
    }

    function excel()
    {
        if (Auth::user()->user_role == 0)
        {
            $users = User::all();
            $users_array[] = array('ID', 'Name', 'Email', 'User_role', 'Created_at', 'Updated_at', 'Picture name'); 
    
            foreach($users as $user)
            {
            // dd($user);
            //print_r($user);
            $users_array[] = array(
                'id' => $user['id'] , 
                'name' => $user->name, 
                'email' => $user['email'],
                'user_role' => $user['user_role'],
                'created_at' => $user['created_at'], 
                'updated_at' => $user['updated_at'],
                'profile_url' => $user['profile_url']
            );
    
            }
    
            Excel::create('Users data', function($excel) use ($users_array)
            {   
                $excel->setTitle('Users data'); 
                $excel->sheet('Users data', function($sheet) use ($users_array)
                {
                    $sheet->fromArray($users_array, null, 'A1', false, false);
                });
    
            })->download('xlsx');
        }
        else 
        {
            return "You are not allowed to see this information";
        }
      

    }
}
