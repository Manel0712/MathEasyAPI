<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tasca;

class Tema extends Model
{
    protected $fillable = [
        "Nom",
    ];

    public function tasques()
    {
        return $this->hasMany(Tasca::class, 'tema_id');
    }
}
