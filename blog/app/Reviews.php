<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    protected $fillable = [
        'title', 'content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key' , 'id');
    }

    public function GetUser()
    {
        return User::find($this->user_id);
    }



}
