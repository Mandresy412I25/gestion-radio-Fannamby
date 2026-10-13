<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UtilisateurController extends Controller
{
    public function index()
    {
        $enAttente = User::where('is_approved', false)->get();
        $valides = User::where('is_approved', true)->get();

        return view('admin.utilisateurs.index', compact('enAttente', 'valides'));
    }

    public function approuver(User $user)
    {
        $user->update(['is_approved' => true]);

        return back()->with('success', 'Compte approuvé.');
    }
}