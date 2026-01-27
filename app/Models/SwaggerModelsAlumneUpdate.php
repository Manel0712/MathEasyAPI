<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "AlumneUpdateInput",
    title: "Actualització Alumne",
    description: "Dades per actualitzar un alumne. Tots els camps són opcionals."
)]
class SwaggerModelsAlumneUpdate
{
    #[OA\Property(type: "string", nullable: true, description: "Nom de l'usuari")]
    public ?string $Nom = null;

    #[OA\Property(type: "string", nullable: true, description: "Cognoms de l'usuari")]
    public ?string $Cognoms = null;

    #[OA\Property(type: "string", format: "password", nullable: true, description: "Password de l'usuari")]
    public ?string $Password = null;

    #[OA\Property(type: "string", nullable: true, description: "Nom d'usuari dins del curs")]
    public ?string $Nom_Usuari = null;

    #[OA\Property(type: "string", nullable: true, description: "Curs de l'alumne")]
    public ?string $Curs = null;

    #[OA\Property(type: "integer", format: "int32", nullable: true, description: "Experiència de l'alumne")]
    public ?int $Experiencia = null;

    #[OA\Property(type: "string", nullable: true, description: "Imatge de perfil", example: "images/avatar.jpg")]
    public ?string $ProfilePicturePath = null;
}