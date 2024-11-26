<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    function index(){
        return view('user.reservations.index');
    }

    function guestindex()
    {
        return view('reservaciones');
    }
}
