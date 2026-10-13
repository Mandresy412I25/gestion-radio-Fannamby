<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animateur extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'specialite'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }

    public function tantaras()
    {
        return $this->hasMany(Tantara::class);
    }
}