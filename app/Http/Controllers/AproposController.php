<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AproposController extends Controller
{
    public function apropos(){
        return view('apropos');
    }
}
