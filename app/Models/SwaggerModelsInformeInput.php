<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "InformeInput",
    title: "Entrada Informe",
    description: "Dades necessàries per crear un informe"
)]
class SwaggerModelsInformeInput
{
    #[OA\Property(type: "string", description: "Tipus de partida")]
    public int $Tipus_partida;

    #[OA\Property(type: "integer", description: "Numero de respostes correctes")]
    public int $Respostes_correctes;

    #[OA\Property(type: "integer", description: "Numero de respostes incorrectes")]
    public int $Respostes_incorrectes;

    #[OA\Property(type: "integer", description: "Experiencia obtinguda")]
    public int $Experiencia;

    #[OA\Property(type: "integer", description: "ID de l'alumne")]
    public int $alumne_id;
}
