<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "OperacioTasca",
    title: "Operació-Tasca",
    description: "Relació entre operació matemàtica i tasca"
)]
class SwaggerOperacioTasca
{
    #[OA\Property(type: "integer", example: 1)]
    public int $id;

    #[OA\Property(type: "integer", example: 2)]
    public int $Operacio;

    #[OA\Property(type: "integer", example: 5)]
    public int $Tasca;
}