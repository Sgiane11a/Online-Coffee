<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function acercaDe()
    {
        return view('Footer.acercaDe');
    }
    public function privacidad()
    {
        return view('Footer.privacidad');
    }
    public function terminosCondiciones()
    {
        return view('Footer.terminosCondiciones');
    }
    public function reglamento()
    {
        return view('Footer.reglamento');
    }
    public function contactanos()
    {
        return view('Footer.contactanos');
    }
    public function mapa()
    {
        return view('Footer.mapa');
    }
    public function preguntas()
    {
        return view('Footer.preguntas');
    }
}
