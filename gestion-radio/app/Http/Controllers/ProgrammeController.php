<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\Animateur;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::with('animateur.user')->get();
        return view('programmes.index', compact('programmes'));
    }

    public function create()
    {
        $animateurs = Animateur::with('user')->get();
        return view('programmes.create', compact('animateurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'jour_diffusion' => 'required|string',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        Programme::create($request->all());

        return redirect()->route('programmes.index')->with('success', 'Programme créé avec succès.');
    }

    public function edit(Programme $programme)
    {
        $animateurs = Animateur::with('user')->get();
        return view('programmes.edit', compact('programme', 'animateurs'));
    }

    public function update(Request $request, Programme $programme)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'jour_diffusion' => 'required|string',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        $programme->update($request->all());

        return redirect()->route('programmes.index')->with('success', 'Programme mis à jour.');
    }

    public function destroy(Programme $programme)
    {
        $programme->delete();
        return redirect()->route('programmes.index')->with('success', 'Programme supprimé.');
    }
}