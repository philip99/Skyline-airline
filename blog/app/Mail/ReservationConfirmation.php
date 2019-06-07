<?php

namespace App\Mail;
use App\User; 
use App\Flight;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App; 
use Illuminate\Support\Facades\Auth;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $user; 
    public $flight;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Flight $flight)
    {
        //
       $this->user = $user; 
       $this->flight = $flight;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // $user = Auth::user();
       //, [ 'user'=>$user]
        return $this->view('reservationconfirmation');
    }
}
