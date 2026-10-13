<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::orderByDesc('date')->get();
        return view('evenements.index', compact('evenements'));
    }

    public function create()
    {
        return view('evenements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        Evenement::create([
            'titre' => $request->titre,
            'date' => $request->date,
            'lien_diffusion' => $request->lien_diffusion,
            'user_id' => auth()->id() ?? 1, // à ajuster une fois l'authentification en place
        ]);

        return redirect()->route('evenements.index')->with('success', 'Événement publié.');
    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenements.index')->with('success', 'Événement supprimé.');
    }
}