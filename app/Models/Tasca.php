<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tema;
use App\Models\Operacio;

class Tasca extends Model
{
    protected $fillable = [
        "Nom",
        "Data_obertura",
        "Data_tancament",
        "tema_id",
    ];

    protected $dates = [
        "Data_obertura",
        "Data_tancament",
    ];

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id');
    }

    public function alumnes()
    {
        return $this->belongsToMany(Alumne::class, 'alumne_tasca', 'Tasca', 'Alumne')->withPivot('id', 'Alumne', 'Tasca', 'Qualificacio', 'Estat_tramesa');
    }

    public function operacions()
    {
        return $this->belongsToMany(Operacio::class, 'operacio_tascas', 'Tasca', 'Operacio');
    }
}
