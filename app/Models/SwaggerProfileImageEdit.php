<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "ProfileImageEdit",
    title: "Profile Image Edit",
    description: "Dades per substituir la imatge de perfil existent"
)]
class SwaggerProfileImageEdit
{
    #[OA\Property(
        type: "string",
        format: "binary",
        description: "Nova imatge en base64",
        example: "data:image/jpeg;base64,..."
    )]
    public string $image;

    #[OA\Property(
        type: "string",
        description: "Extensió de la nova imatge",
        example: "jpg"
    )]
    public string $extension;

    #[OA\Property(
        type: "string",
        description: "Ruta actual de la imatge a reemplaçar",
        example: "images/avatar.png"
    )]
    public string $path;
}