<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Flight extends Model
{
    protected $fillable = [
        'flightNr', 'depDateTime', 'depPlace','destDateTime', 'destPlace'
    ];
    protected $primaryKey = 'flightNr';

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    static function searchByDate($date)
    {
        $flights = DB::table('flights')->whereDate('depDateTime', '=', $date)->get();
        return $flights;
    }
}
