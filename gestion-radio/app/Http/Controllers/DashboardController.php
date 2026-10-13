<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\Animateur;
use App\Models\Chanson;
use App\Models\SmsAuditeur;
use App\Models\Tantara;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programmes' => Programme::count(),
            'animateurs' => Animateur::count(),
            'chansons' => Chanson::count(),
            'sms' => SmsAuditeur::count(),
            'tantaras_disponibles' => Tantara::where('statut', 'non_diffuse')->count(),
        ];

        $chansonPopulaire = Chanson::orderByDesc('nombre_demandes')->first();

        return view('dashboard', compact('stats', 'chansonPopulaire'));
    }
}