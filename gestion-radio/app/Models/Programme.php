<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'jour_diffusion', 'heure_debut', 'heure_fin', 'type', 'animateur_id'];

    public function animateur()
    {
        return $this->belongsTo(Animateur::class);
    }

    public function emissions()
    {
        return $this->hasMany(Emission::class);
    }
}