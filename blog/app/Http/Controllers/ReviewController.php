<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reviews;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    //public static $titles = array("Enjoyed the service",
     //"Rome", "Oslo" ,"Lisbon" ,"Copenhagen" ,"Valencia" ,"Zurich" ,"Stockholm");
     
    //public static $content = array("Enjoyed KLM's service! They had great service all along the way!",
    // "Rome", "Oslo" ,"Lisbon" ,"Copenhagen" ,"Valencia" ,"Zurich" ,"Stockholm");

    public function showAllReviews()
    {
        //return view('reviews');
        //$user = User::find(1);
        //$review = new Reviews(['title'=>'title 2' , 'content'=>'here is the second content']);
        //$user->reviews()->save($review);
        $AuthUser = Auth::User();
        
        $reviews = Reviews::all();
        return view('reviews', ['reviews' => $reviews , 'AuthUser' => $AuthUser ] );

        //return dd($reviews[0]->user());
        //return $reviews[0]->GetUser();
        
    }

    public function addReiew(Request $request)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $review = new Reviews();
            $review->title = $request->input('title');
            $review->content = $request->input('body');
            $review->user_id = $user->id;
            $review->save();

            return redirect()->action('ReviewController@showAllReviews');
        }
        else
        {
            echo "Please login to add reviws.";
        }
        
    } 

    /**
     * @param int $id
     */
    public function editReviewPage($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $review = Reviews::find($id);

            if($user->id == $review->user_id or $user->user_role == 0)
            {
                return view('editReview', ['review' => $review] );
            }
            else
            {
                echo "You are not allowed to see that page.";
            }
            
        }
        else
        {
            echo "Please login";
        }
    }

    /**
     * @param int $id
     */
    public function editReview(Request $request , $id)
    {

        if(Auth::check())
        {
            $user = Auth::user();
            $review = Reviews::find($id);

            if($user->id == $review->user_id or $user->user_role == 0)
            {
                $review->title = $request->input('title');
                $review->content = $request->input('body');
        
                $review->save();
        
                return redirect()->action('ReviewController@showAllReviews');
            }
            else
            {
                echo "You are not allowed to see that page.";
            }
            
        }
        else
        {
            echo "Please login";
        }

    }

    
    /**
     * @param int $id
     */
    public function DeleteReview($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $review = Reviews::find($id);

            if($user->id == $review->user_id or $user->user_role == 0)
            {
                $review->delete();
                return redirect()->action('ReviewController@showAllReviews');
            }
            else
            {
                echo "You are not allowed to delete that post.";
            }
            
        }
        else
        {
            echo "Please login";
        }
    }



}
