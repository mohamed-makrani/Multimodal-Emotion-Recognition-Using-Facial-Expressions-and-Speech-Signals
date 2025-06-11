<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControllerLogin extends Controller
{
    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('home');
        }
        else{
            return back()->withErrors([
                    'email' => 'Les identifiants sont incorrects.',
                    ])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecter l'utilisateur
        $request->session()->invalidate(); // Invalider la session
        $request->session()->regenerateToken(); // Régénérer le token CSRF pour plus de sécurité

        return redirect('/login'); // Rediriger vers la page de login après la déconnexion
    }
}
