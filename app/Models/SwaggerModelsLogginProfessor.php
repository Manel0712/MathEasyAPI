<?php

namespace App\Models;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "LoginProfessor",
    title: "Login del professor",
    description: "Dades necessàries per iniciar sessió"
)]
class SwaggerModelsLogginProfessor
{
    #[OA\Property(type: "string", description: "Email del professor")]
    public string $Email;

    #[OA\Property(type: "string", description: "Contrasenya del professor")]
    public string $Password;
}
