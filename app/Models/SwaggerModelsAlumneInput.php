<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "AlumneInput",
    title: "Entrada Alumne",
    description: "Dades necessàries per crear/actualitzar un alumne"
)]
class SwaggerModelsAlumneInput
{
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
    public string $Experiencia;

    #[OA\Property(type: "string", description: "Imatge de perfil", example: "images/avatar.jpg")]
    public string $ProfilePicturePath;
}