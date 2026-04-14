<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use OpenApi\Attributes as OA;
use Illuminate\Http\Request;

#[OA\Tag(
    name: "Informes",
    description: "Operacions relacionades amb els informes"
)]
class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #[OA\Get(
        path: "/informes",
        tags: ["Informes"],
        summary: "Llistar tots els informes",
        description: "Retorna una llista amb tots els informes creats",
        security: [["bearerAuth" => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: "Llista d'informes",
                content: new OA\JsonContent(
                    type: "array",
                    items: new OA\Items(ref: "#/components/schemas/Informe")
                )
            ),
            new OA\Response(
                response: 401,
                description: "Usuari no autenticat"
            )
        ]
    )]
    public function index()
    {
        $informe = Informe::with('alumnes')->get();
        $informe->each(function($informe) {
            $nombre = $informe->alumnes->Nom ?? '';
            $apellidos = $informe->alumnes->Cognoms ?? '';
            $informe->nombre_completo = trim($nombre . ' ' . $apellidos);
            unset($informe->alumnes);
        });
        return response()->json($informe, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    #[OA\Post(
        path: "/informes",
        tags: ["Informes"],
        summary: "Crear un nou informe",
        description: "Crea un informe amb les dades proporcionades",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Dades de l'informe",
            content: new OA\JsonContent(ref: "#/components/schemas/InformeInput")
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: "Informe creat correctament",
                content: new OA\JsonContent(ref: "#/components/schemas/Informe")
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
        $informe = Informe::create($request->all());
        return response()->json([$informe], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informe $informe)
    {
        //
    }

    #[OA\Get(
        path: "/informesAlumne/{alumne}",
        tags: ["Informes"],
        summary: "Llistar tots els informes d'un alumne concret",
        description: "Retorna una llista amb tots els informes creats d'un alumne concret",
        security: [["bearerAuth" => []]],
        parameters: [
            new OA\Parameter(
                name: "alumne",
                in: "path",
                description: "ID de l'alumne",
                required: true,
                schema: new OA\Schema(type: "integer", format: "int64")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Llista d'informes d'un alumne concret",
                content: new OA\JsonContent(
                    type: "array",
                    items: new OA\Items(ref: "#/components/schemas/Informe")
                )
            ),
            new OA\Response(
                response: 404,
                description: "Alumne no trobat"
            ),
            new OA\Response(
                response: 401,
                description: "Usuari no autenticat"
            )
        ]
    )]
    public function informesAlumne($alumne) {
        $informes = Informe::Where('alumne_id', $alumne)->get();
        return response()->json($informes, 200);
    }
}
