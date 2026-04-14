<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "LoginResponse",
    title: "Login Response"
)]
class SwaggerLoginResponse
{
    #[OA\Property(
        property: "Resposta",
        type: "object",
        properties: [
            new OA\Property(
                property: "Alumne",
                ref: "#/components/schemas/Alumne"
            ),
            new OA\Property(
                property: "token",
                type: "string",
                example: "1|abc123token"
            )
        ]
    )]
    public object $Resposta;
}