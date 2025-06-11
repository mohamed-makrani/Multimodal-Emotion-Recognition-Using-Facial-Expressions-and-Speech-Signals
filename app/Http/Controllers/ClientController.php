<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    public function addClient(Request $request)
    {
        Client::create([
            'agent_id' => auth()->id(),
            'name' =>$request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'product' => $request->product,
            'quantite' => $request->quantite,
            'emotion' => $request->emotion,
        ]);


        return redirect('/mesgResult')->with('success', 'Inscription réussie 🎉');

    }
}
