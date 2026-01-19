<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "LoginRequest",
    title: "LoginRequest",
    description: "Dades necessàries per iniciar sessió"
)]
class SwaggerModelsLoggin
{
    #[OA\Property(type: "string", description: "Nom d'usuari de l'alumne")]
    public string $Nom_Usuari;

    #[OA\Property(type: "string", description: "Contrasenya de l'alumne")]
    public string $Password;
}
