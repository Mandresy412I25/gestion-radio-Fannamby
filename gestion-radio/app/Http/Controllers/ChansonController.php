<?php

namespace App\Http\Controllers;

use App\Models\Chanson;
use Illuminate\Http\Request;

class ChansonController extends Controller
{
    public function index()
    {
        $chansons = Chanson::orderByDesc('nombre_demandes')->get();
        return view('chansons.index', compact('chansons'));
    }

    public function create()
    {
        return view('chansons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'lien_source' => 'nullable|string',
        ]);

        Chanson::create($request->all());

        return redirect()->route('chansons.index')->with('success', 'Chanson ajoutée.');
    }

    public function incrementer(Chanson $chanson)
    {
        $chanson->increment('nombre_demandes');
        return redirect()->route('chansons.index')->with('success', 'Demande enregistrée pour "' . $chanson->titre . '".');
    }

    public function destroy(Chanson $chanson)
    {
        $chanson->delete();
        return redirect()->route('chansons.index')->with('success', 'Chanson supprimée.');
    }
}