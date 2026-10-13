<?php

namespace App\Http\Controllers;

use App\Models\Animateur;
use App\Models\User;
use Illuminate\Http\Request;

class AnimateurController extends Controller
{
    public function index()
    {
        $animateurs = Animateur::with('user')->get();
        return view('animateurs.index', compact('animateurs'));
    }

    public function create()
    {
        return view('animateurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'specialite' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'animateur',
            'is_approved' => true,
        ]);

        Animateur::create([
            'user_id' => $user->id,
            'specialite' => $request->specialite,
        ]);

        return redirect()->route('animateurs.index')->with('success', 'Animateur ajouté avec succès.');
    }

    public function edit(Animateur $animateur)
    {
        return view('animateurs.edit', compact('animateur'));
    }

    public function update(Request $request, Animateur $animateur)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $animateur->user_id,
            'specialite' => 'nullable|string',
        ]);

        $animateur->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $animateur->update([
            'specialite' => $request->specialite,
        ]);

        return redirect()->route('animateurs.index')->with('success', 'Animateur mis à jour.');
    }

    public function destroy(Animateur $animateur)
    {
        $animateur->user->delete(); // supprime aussi l'animateur grâce au onDelete('cascade')
        return redirect()->route('animateurs.index')->with('success', 'Animateur supprimé.');
    }
}