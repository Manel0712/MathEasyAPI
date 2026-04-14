<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Usuaris
{
    protected $fillable = [
        "Email",
        "Data_Naixement",
    ];
}
