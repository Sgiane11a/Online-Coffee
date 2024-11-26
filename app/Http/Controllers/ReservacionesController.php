<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservacionesController extends Controller
{
    function index()
    {
        return view('reservaciones');
    }

    function guestindex()
    {
        return view('reservations');
    }
}
