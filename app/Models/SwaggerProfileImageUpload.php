<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "ProfileImageUpload",
    title: "Profile Image Upload",
    description: "Dades per pujar una imatge de perfil en base64"
)]
class SwaggerProfileImageUpload
{
    #[OA\Property(
        type: "string",
        format: "binary",
        description: "Imatge en base64 (data:image/...;base64,...)",
        example: "data:image/png;base64,iVBORw0KGgoAAA..."
    )]
    public string $image;

    #[OA\Property(
        type: "string",
        description: "Extensió de la imatge",
        example: "png"
    )]
    public string $extension;
}