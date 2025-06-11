<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Client;

class DashboardAdminAuthController extends Controller
{
    public function dashboard()
    {
        $profilesCount = Profile::count();
        $clientsCount = Client::count();
        $ventesCount = Client::sum('quantite');
        return view('admin.dashboard', compact('profilesCount', 'clientsCount', 'ventesCount'));
    }
}
