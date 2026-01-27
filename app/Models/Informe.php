<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alumne;

class Informe extends Model
{
    protected $fillable = [
        'Tipus_partida',
        'Respostes_correctes',
        'Respostes_incorrectes',
        'Experiencia',
        'alumne_id'
    ];

    public function alumnes() {
        return $this->belongsTo(Alumne::class, "alumne_id");
    }
}
