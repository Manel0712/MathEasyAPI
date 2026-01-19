<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: "API MathEasy",
    version: "1.0",
    description: "API per gestionar operacions i recursos de MathEasy amb Laravel i autenticació Bearer",
)]
#[OA\Server(
    url: "http://matheasyapi.test/api",
    description: "Servidor local de desenvolupament"
)]
#[OA\SecurityScheme(
    securityScheme: "bearerAuth",
    type: "http",
    scheme: "bearer",
    bearerFormat: "JWT",
    description: "Introduïu el token Bearer JWT per autenticar-vos"
)]
class SwaggerInfo
{
}