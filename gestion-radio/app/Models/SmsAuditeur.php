<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsAuditeur extends Model
{
    use HasFactory;

    protected $fillable = ['numero_expediteur', 'contenu', 'date_reception', 'type', 'emission_id', 'chanson_id'];

    public function emission()
    {
        return $this->belongsTo(Emission::class);
    }

    public function chanson()
    {
        return $this->belongsTo(Chanson::class);
    }
}