<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loader extends Controller
{

    public function loading(Request $request) {

        return view('loading');

    }

}
