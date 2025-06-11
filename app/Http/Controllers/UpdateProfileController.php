<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UpdateProfileController extends Controller
{
    public function showUpdateForm()
    {
        return view('updateProfile');
    }

    public function updateProfile(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $user = Auth::user();

        // Mise à jour du nom et de l'email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Mise à jour du mot de passe s’il est fourni
        $password = trim($request->input('password'));
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }

        // Sauvegarde des modifications
        $user->save();

        // Reconnexion de l'utilisateur pour éviter la déconnexion (notamment si le mot de passe a changé)
        Auth::login($user);

        // Redirection vers la page de profil avec message de succès
        return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès !');
    }
}
