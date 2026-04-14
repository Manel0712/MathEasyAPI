<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "ExperienciaUpdateInput",
    title: "Actualització Experiencia",
    description: "Progres de l'alumne"
)]
class SwaggerModelsExperienciaUpdate
{
    #[OA\Property(type: "integer", description: "Nivell actual")]
    public ?int $Nivell;

    #[OA\Property(type: "integer", description: "Experiència total acumulada")]
    public ?int $Total_xp;

    #[OA\Property(type: "integer", description: "Nombre de medalles")]
    public ?int $Medalles;
}