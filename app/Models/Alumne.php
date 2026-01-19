<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuaris;

class Alumne extends Usuaris
{
    protected $fillable = [
        "Nom_Usuari",
        "Curs",
        "Experiencia",
    ];
}
