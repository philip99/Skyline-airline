<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_role', 'profile_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function flights() 
    {
        return $this->belongsToMany('App\Flight');
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Reviews');
    }

    public function GetReviewsCount()
    {
        $count = Reviews::All()->where('user_id', $this->id)->count();
        return $count;
    }

    public function GetByEmail($email)
    {
        $email = User::All()->where('email', $email);
        return $email;
    }
}
