<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "TokenLoginRequest",
    title: "Token Login Request",
    description: "Petición para validar un token de acceso"
)]
class SwaggerTokenLoginRequest
{
    #[OA\Property(
        type: "string",
        description: "Token de autenticación generado por Sanctum",
        example: "1|abc123tokenxyz"
    )]
    public string $token;
}