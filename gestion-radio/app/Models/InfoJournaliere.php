<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoJournaliere extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'resume', 'heure_relais', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}