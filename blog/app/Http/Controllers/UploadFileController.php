<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UploadFileController extends Controller
{
    function index()
    {
        return view('welcome');
    }

    function upload(Request $request)
    {   
        $user = Auth::user();
        $this->validate($request, [
            'select_file' => 
                'required|image|mimes:jpeg,png,jpg,gif,JPG'
            ]);
        $image = $request->file('select_file');
        $new_name = Auth::user()->id. '.png'; 

        


        $mask = Image::canvas(200, 200);
        $mask->circle(200, 200/2, 200/2, function ($draw) {
            $draw->background('#fff');
        });

        $image->move(public_path("storage/img"), $new_name);
              
        $img = Image::make(public_path("storage/img").'/' . $new_name);
        $img->resize(200, 200)->encode('png')->insert("storage/img/watermark.png", 'bottom-center', 0, 4)->save(public_path("storage/img").'/' . $new_name);
           
        $img->mask($mask, false)->save(public_path("storage/img").'/' . $new_name);

        //This line saves a pixelated copy of the image in the pixelated folder 
        $img->pixelate(10)->save(public_path("storage/img/pixelated").'/' . $new_name);
        //

        $user->profile_url =  $new_name; 
        $user->save();

        return back()->with('succes', 'Image uploaded!')->with('path', $new_name);

        ////////

        
        
    }

    public function textToPhoto(Request $request)
    {

        $user = Auth::user();
        $this->validate($request, [
            'select_file' => 
                'required|image|mimes:jpeg,png,jpg,gif,JPG'
            ]);
        $image = $request->file('select_file');
        $new_name = Auth::user()->id. '.png'; 
        
        $image->move(public_path("img/cities"), $new_name);

        $img = Image::make(public_path("img/cities").'/' . $new_name);

        $img->text('Stockholm', 0, 0, function($font) {
            $font->file(public_path("fonts"). '/' . 'BEBAS___.ttf');
            $font->size(100);
            $font->color('#fdf6e3');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(0);
        })->save(public_path("img/cities").'/' . $new_name);

        $img->text('Rome' , 120, 100)->save(public_path("img/cities").'/' . $new_name);

        /////

    }

 
}
