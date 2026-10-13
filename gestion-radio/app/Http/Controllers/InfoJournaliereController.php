<?php

namespace App\Http\Controllers;

use App\Models\InfoJournaliere;
use Illuminate\Http\Request;

class InfoJournaliereController extends Controller
{
    public function index()
    {
        $infos = InfoJournaliere::orderByDesc('date')->get();
        return view('infos.index', compact('infos'));
    }

    public function create()
    {
        return view('infos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|string',
        ]);

        InfoJournaliere::create([
            'date' => now()->toDateString(),
            'resume' => $request->resume,
            'heure_relais' => '12:00:00',
            'user_id' => auth()->id() ?? 1,
        ]);

        return redirect()->route('infos.index')->with('success', 'Info du jour enregistrée.');
    }

    public function destroy(InfoJournaliere $info)
    {
        $info->delete();
        return redirect()->route('infos.index')->with('success', 'Info supprimée.');
    }
}