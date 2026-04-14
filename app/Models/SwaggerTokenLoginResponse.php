<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "TokenLoginResponse",
    title: "Token Login Response",
    description: "Resposta del login amb token"
)]
class SwaggerTokenLoginResponse
{
    #[OA\Property(
        description: "Dades de l'alumne autenticat",
        ref: "#/components/schemas/Alumne"
    )]
    public object $Alumne;

    #[OA\Property(
        type: "string",
        description: "Token d'accés",
        example: "1|abc123tokenxyz"
    )]
    public string $token;
}