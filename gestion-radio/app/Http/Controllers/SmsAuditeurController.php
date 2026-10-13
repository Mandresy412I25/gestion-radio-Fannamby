<?php

namespace App\Http\Controllers;

use App\Models\SmsAuditeur;
use App\Models\Chanson;
use App\Models\Emission;
use Illuminate\Http\Request;

class SmsAuditeurController extends Controller
{
    public function index()
    {
        $sms = SmsAuditeur::with('chanson', 'emission.programme')->orderByDesc('date_reception')->get();
        return view('sms.index', compact('sms'));
    }

    public function create()
    {
        $chansons = Chanson::orderBy('titre')->get();
        $emissions = Emission::with('programme')->orderByDesc('date_diffusion')->get();
        return view('sms.create', compact('chansons', 'emissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_expediteur' => 'required|string|max:20',
            'contenu' => 'required|string',
            'type' => 'required|in:commentaire,demande_chanson,idee',
        ]);

        SmsAuditeur::create([
            'numero_expediteur' => $request->numero_expediteur,
            'contenu' => $request->contenu,
            'date_reception' => now(),
            'type' => $request->type,
            'emission_id' => $request->emission_id,
            'chanson_id' => $request->chanson_id,
        ]);

        return redirect()->route('sms.index')->with('success', 'SMS enregistré.');
    }

    public function destroy(SmsAuditeur $sm)
    {
        $sm->delete();
        return redirect()->route('sms.index')->with('success', 'SMS supprimé.');
    }
}