<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumneTasca extends Model
{
    protected $table = "alumne_tasca";

    protected $fillable = [
        "Alumne",
        "Tasca",
        "Qualificacio",
        "Estat_tramesa",
        "Resultat1",
        "Resultat2",
        "Resultat3",
        "Resultat4",
        "Resultat5",
        "Resultat6",
        "Resultat7",
        "Resultat8",
        "Resultat9",
        "Resultat10",
    ];
}
