<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuaris;
use App\Models\Informe;
use App\Models\Experiencia;

class Alumne extends Usuaris
{
    protected $fillable = [
        "Nom_Usuari",
        "Curs",
        "Experiencia",
    ];

    public function informes() {
        return $this->hasMany(Informe::class, "alumne_id");
    }

    public function experiencia()
    {
        return $this->hasOne(Experiencia::class, 'id', 'experiencia_id');
    }
}
