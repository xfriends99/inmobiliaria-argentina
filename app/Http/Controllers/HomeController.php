<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.homepage');
    }

    public function signin()
    {
        return view('frontend.signin');
    }

    public function signup()
    {
        return view('frontend.signup');
    }

    public function inmobiliarias()
    {
        return view('frontend.inmobiliarias');
    }

    public function carrito()
    {
        return view('frontend.carrito');
    }

    public function nosotros()
    {
        return view('frontend.nosotros');
    }

    public function propiedad()
    {
        return view('frontend.propiedad');
    }

    public function thankyou()
    {
        return view('frontend.thankyou');
    }
}
