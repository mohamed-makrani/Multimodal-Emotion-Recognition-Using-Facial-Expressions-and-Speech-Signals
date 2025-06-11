<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class AuthControllerRegister extends Controller
{
    public function register(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:profiles,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Insertion dans la base de données
        Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Ne jamais enregistrer un mdp en clair !
        ]);

        // Redirection ou message
        return redirect('/login')->with('success', 'Inscription réussie 🎉');
    }
}
