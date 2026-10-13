<?php

namespace App\Http\Controllers;

use App\Models\Tantara;
use App\Models\Animateur;
use Illuminate\Http\Request;

class TantaraController extends Controller
{
    public function index()
    {
        // On affiche seulement les tantara NON diffusés par défaut
        $tantaras = Tantara::where('statut', 'non_diffuse')->get();
        $tantarasDiffuses = Tantara::where('statut', 'diffuse')->orderByDesc('date_diffusion')->get();
        return view('tantaras.index', compact('tantaras', 'tantarasDiffuses'));
    }

    public function create()
    {
        return view('tantaras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        Tantara::create([
            'titre' => $request->titre,
            'statut' => 'non_diffuse',
        ]);

        return redirect()->route('tantaras.index')->with('success', 'Tantara ajouté à la liste.');
    }

    // Fonction spéciale : marquer comme diffusé
    public function diffuser(Request $request, Tantara $tantara)
    {
        $tantara->update([
            'statut' => 'diffuse',
            'date_diffusion' => now(),
            'animateur_id' => $request->animateur_id,
        ]);

        return redirect()->route('tantaras.index')->with('success', 'Tantara marqué comme diffusé.');
    }

    public function destroy(Tantara $tantara)
    {
        $tantara->delete();
        return redirect()->route('tantaras.index')->with('success', 'Tantara supprimé.');
    }
}