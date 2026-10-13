<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emission extends Model
{
    use HasFactory;

    protected $fillable = ['date_diffusion', 'fichier_audio', 'statut', 'programme_id'];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function smsAuditeurs()
    {
        return $this->hasMany(SmsAuditeur::class);
    }
}