<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alumne;

class Experiencia extends Model
{
    protected $fillable = [
        'Nivell',
        'Total_xp',
        'Medalles',
    ];

    public function alumne()
    {
        return $this->belongsTo(Alumne::class, 'Experiencia');
    }
}
