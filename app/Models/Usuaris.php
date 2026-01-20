<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuaris extends Model
{
    protected $common_fillable = [
        "Nom",
        "Cognoms",
        "Password",
        "ProfilePicturePath"
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = array_merge($this->fillable, $this->common_fillable);

    }
}
