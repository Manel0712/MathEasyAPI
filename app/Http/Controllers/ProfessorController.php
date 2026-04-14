<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use OpenApi\Attributes as OA;

#[OA\Tag(
    name: "Professors",
    description: "Operacions relacionades amb els professors"
)]
class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professors = Professor::all();
        return response()->json($professors, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    #[OA\Post(
        path: "/professors",
        tags: ["Professors"],
        summary: "Crear un nou professor",
        description: "Crea un professor nou amb les dades proporcionades",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Dades de l'alumne",
            content: new OA\JsonContent(ref: "App\Models\SwaggerModelsProfessorInput")
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: "Professor creat correctament",
                content: new OA\JsonContent(ref: "App\Models\SwaggerModelsProfessor")
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
        $passwordHash = Hash::make($request->Password);
        $professor = Professor::create([
            'Nom' => $request->Nom,
            'Cognoms' => $request->Cognoms,
            'Password' => $passwordHash,
            'Email' => $request->Email,
            'Data_Naixement' => $request->Data_Naixement,
        ]);
        return response()->json($professor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professor $professor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $professor)
    {
        //
    }

    public function loggin(Request $request) {
        $professor = Professor::where('Email', $request->Email)->first();
        if ($professor && Hash::check($request->Password, $professor->Password)) {
            return response()->json(["professor" => $professor], 200);
        }
        else {
            return response()->json(['message' => "Email i/o contrasenya incorrectes"], 401);
        }
    }
}
