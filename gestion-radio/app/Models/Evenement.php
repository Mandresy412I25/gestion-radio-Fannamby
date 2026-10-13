<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'date', 'lien_diffusion', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}