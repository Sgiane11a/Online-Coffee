<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForoController extends Controller
{
    function index()
    {
        return view('foro');
    }
}
