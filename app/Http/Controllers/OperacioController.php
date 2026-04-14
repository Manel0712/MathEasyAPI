<?php

namespace App\Http\Controllers;

use App\Models\Operacio;
use App\Models\OperacioTasca;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

#[OA\Tag(
    name: "Operacions",
    description: "Operacions relacionades amb les operacions matemàtiques"
)]
class OperacioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    #[OA\Post(
        path: "/assignarOperacions",
        tags: ["Operacions"],
        summary: "Crear o reutilitzar una operació matemàtica i la assigna a una tasca",
        description: "Crea o reutilitza una operació matemàtica i la assigna a una tasca",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["operacio", "Tasca"],
                properties: [
                    new OA\Property(
                        property: "operacio",
                        type: "string",
                        description: "Tipus d'operació matemàtica (suma, resta, multiplicació...)",
                        example: "suma"
                    ),
                    new OA\Property(
                        property: "Tasca",
                        type: "integer",
                        description: "ID de la tasca",
                        example: 3
                    )
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: "Operació assignada correctament",
                content: new OA\JsonContent(
                    ref: "#/components/schemas/OperacioTasca"
                )
            ),
            new OA\Response(
                response: 400,
                description: "Dades no vàlides"
            ),
            new OA\Response(
                response: 401,
                description: "Usuari no autenticat"
            )
        ]
    )]
    public function store(Request $request)
    {
        $existe = false;
        $operacio = $request->operacio;
        $operacions = Operacio::all();
        foreach ($operacions as $orperacioBBDD) {
            if ($orperacioBBDD->Operacio == $operacio) {
                $existe = true;
            }
        }
        if ($existe) {
            $operacioId = Operacio::where('Operacio', $operacio)->first();
            $asignarOperacio = OperacioTasca::create([
                "Operacio" => $operacioId->id,
                "Tasca" => $request->Tasca,
            ]);
            return response()->json($asignarOperacio);
        }
        else {
            $operacioId = Operacio::create([
                "Operacio" => $operacio,
            ]);
            $asignarOperacio = OperacioTasca::create([
                "Operacio" => $operacioId->id,
                "Tasca" => $request->Tasca,
            ]);
            return response()->json($asignarOperacio);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Operacio $operacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operacio $operacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operacio $operacio)
    {
        //
    }
}
