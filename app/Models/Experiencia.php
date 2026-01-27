<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alumne;

class Experiencia extends Model
{
    protected $fillable = [
        'Nivell',
        'Total_xp',
    ];

    public function alumne()
    {
        return $this->belongsTo(Alumne::class, 'experiencia_id');
    }
}
