<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterAdminAuthController extends Controller
{
    public function showRegister(){
        return view('admin.register');
    }
    public function register(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'matricule' => 'required|string|unique:admins,matricule',
            'password' => 'required|confirmed|min:6',
        ]);

        // Insertion dans la base de données
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'matricule' => $request->matricule,
            'password' => Hash::make($request->password), // Ne jamais enregistrer un mdp en clair !
        ]);

        // Redirection ou message
        return redirect('admin/login')->with('success', 'Inscription réussie 🎉');
    }
}
