<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Profile;

class AgentPageController extends Controller
{
    public function showAgents()
    {

        return view('admin.agent');
    }
}
