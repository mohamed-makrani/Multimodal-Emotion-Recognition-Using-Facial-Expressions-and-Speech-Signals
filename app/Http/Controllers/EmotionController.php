<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmotionController extends Controller
{
    public function home()
    {
        return view('home');
    }
}
