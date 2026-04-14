<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "Professor",
    title: "Professor",
    description: "Representa un professor, heretat de Usuaris"
)]
class SwaggerModelsProfessor
{
    #[OA\Property(type: "integer", description: "ID del professor")]
    public int $id;

    #[OA\Property(type: "string", description: "Nom de l'usuari")]
    public string $Nom;

    #[OA\Property(type: "string", description: "Cognoms de l'usuari")]
    public string $Cognoms;

    #[OA\Property(type: "string", format: "password", description: "Password de l'usuari")]
    public string $Password;

    #[OA\Property(type: "string", description: "Email del professor")]
    public string $Email;

    #[OA\Property(type: "string", format: "date", description: "Data de naixement del professor")]
    public string $Data_Naixement;
}