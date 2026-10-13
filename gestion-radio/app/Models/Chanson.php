<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chanson extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'lien_source', 'nombre_demandes'];

    public function smsAuditeurs()
    {
        return $this->hasMany(SmsAuditeur::class);
    }
}