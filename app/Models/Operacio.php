<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tasca;

class Operacio extends Model
{
    protected $fillable = [
        "Operacio",
    ];

    public function tasques()
    {
        return $this->belongsToMany(Tasca::class, 'operacio_tascas', 'Operacio', 'Tasca');
    }
}
