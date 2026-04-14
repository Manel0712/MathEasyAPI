<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "Experiencia",
    title: "Experiencia",
    description: "Progres de l'alumne"
)]
class SwaggerModelsExperiencia
{
    #[OA\Property(type: "integer", description: "ID de l'experiència")]
    public int $id;

    #[OA\Property(type: "integer", description: "Nivell actual")]
    public int $Nivell;

    #[OA\Property(type: "integer", description: "Experiència total acumulada")]
    public int $Total_xp;

    #[OA\Property(type: "integer", description: "Nombre de medalles")]
    public int $Medalles;
}