<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tantara extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'statut', 'date_diffusion', 'animateur_id'];

    public function animateur()
    {
        return $this->belongsTo(Animateur::class);
    }
}