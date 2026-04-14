<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "OperacioMatematica",
    title: "Operació Matemàtica",
    description: "Representa una operació matemàtica (suma, resta, etc.)"
)]
class SwaggerOperacio
{
    #[OA\Property(type: "integer", example: 1)]
    public int $id;

    #[OA\Property(
        type: "string",
        description: "Operacio matemàtica"
    )]
    public string $Operacio;
}