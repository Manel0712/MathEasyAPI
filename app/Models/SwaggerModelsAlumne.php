<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "Alumne",
    title: "Alumne",
    description: "Representa un alumne, heretat de Usuaris"
)]
class SwaggerModelsAlumne
{
    #[OA\Property(type: "integer", description: "ID de l'alumne")]
    public int $id;

    #[OA\Property(type: "string", description: "Nom de l'usuari")]
    public string $Nom;

    #[OA\Property(type: "string", description: "Cognoms de l'usuari")]
    public string $Cognoms;

    #[OA\Property(type: "string", format: "password", description: "Password de l'usuari")]
    public string $Password;

    #[OA\Property(type: "string", description: "Nom d'usuari dins del curs")]
    public string $Nom_Usuari;

    #[OA\Property(type: "string", description: "Curs de l'alumne")]
    public string $Curs;

    #[OA\Property(type: "integer", format: "int32", description: "Experiència de l'alumne")]
    public int $Experiencia;

    #[OA\Property(type: "string", description: "Imatge de perfil", example: "images/avatar.jpg")]
    public string $ProfilePicturePath;
}