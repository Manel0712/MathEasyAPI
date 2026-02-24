<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuaris;
use App\Models\Informe;
use App\Models\Experiencia;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Alumne extends Usuaris
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        "Nom_Usuari",
        "Curs",
        "Experiencia",
        "Nivell",
    ];

    public function informes() {
        return $this->hasMany(Informe::class, "alumne_id");
    }

    public function experiencia()
    {
        return $this->hasOne(Experiencia::class, 'id', 'Experiencia');
    }
}
