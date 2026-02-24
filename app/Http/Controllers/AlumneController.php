<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;

#[OA\Tag(
    name: "Alumnes",
    description: "Operacions relacionades amb els alumnes"
)]
class AlumneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #[OA\Get(
        path: "/alumnes",
        tags: ["Alumnes"],
        summary: "Llistar tots els alumnes",
        description: "Retorna una llista amb tots els alumnes registrats",
        security: [["bearerAuth" => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: "Llista d'alumnes",
                content: new OA\JsonContent(
                    type: "array",
                    items: new OA\Items(ref: "App\Models\SwaggerModelsAlumne")
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
        $alumnes = Alumne::all();
        return response()->json($alumnes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    #[OA\Post(
        path: "/alumnes",
        tags: ["Alumnes"],
        summary: "Crear un nou alumne",
        description: "Crea un alumne nou amb les dades proporcionades",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Dades de l'alumne",
            content: new OA\JsonContent(ref: "App\Models\SwaggerModelsAlumneInput")
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: "Alumne creat correctament",
                content: new OA\JsonContent(ref: "App\Models\SwaggerModelsAlumne")
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
        $alumne = Alumne::where('Nom_Usuari', $request->Nom_Usuari)->first();
        if ($alumne) {
            return response()->json("El nom d'usuari ja existeix", 400);
        }
        else {
            $passwordHash = Hash::make($request->Password);
            $experiencia = Experiencia::create([
                'Nivell' => 0,
                'Total_xp' => 0,
                'Medalles' => 0,
            ]);
            $alumne = Alumne::create([
                'Nom' => $request->Nom,
                'Cognoms' => $request->Cognoms,
                'Password' => $passwordHash,
                'ProfilePicturePath' => $request->ProfilePicturePath,
                'Nom_Usuari' => $request->Nom_Usuari,
                'Curs' => $request->Curs,
                'Experiencia' => $experiencia->id,
                'Nivell' => 0,
            ]);
            return response()->json([$alumne->load('experiencia')], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    #[OA\Get(
        path: "/alumnes/{id}",
        tags: ["Alumnes"],
        summary: "Mostrar un alumne",
        description: "Retorna les dades d'un alumne específic pel seu ID",
        security: [["bearerAuth" => []]],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                description: "ID de l'alumne",
                required: true,
                schema: new OA\Schema(type: "integer", format: "int64")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Alumne trobat correctament",
                content: new OA\JsonContent(
                    type: "object",
                    ref: "#/components/schemas/Alumne"
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
    public function show(Alumne $alumne)
    {
        return response()->json([$alumne], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    #[OA\Put(
        path: "/alumnes/{id}",
        tags: ["Alumnes"],
        summary: "Actualitzar dades d'un alumne",
        description: "Actualitza les dades personals d'un alumne autenticat.",
        security: [["bearerAuth" => []]],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "ID de l'alumne",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Dades a actualitzar de l'alumne",
            content: new OA\JsonContent(ref: "#/components/schemas/AlumneUpdateInput")
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: "Alumne actualitzat correctament",
                content: new OA\JsonContent(ref: "#/components/schemas/Alumne")
            ),
            new OA\Response(
                response: 401,
                description: "No autenticat"
            ),
            new OA\Response(
                response: 404,
                description: "Alumne no trobat"
            ),
            new OA\Response(
                response: 422,
                description: "Dades no vàlides"
            )
        ]
    )]
    public function update(Request $request, Alumne $alumne)
    {
        $alumne->update($request->all());
        return response()->json([$alumne->load('experiencia')], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumne $alumne)
    {
        //
    }

    #[OA\Post(
        path: "/loggin",
        tags: ["Alumnes"],
        summary: "Iniciar sessió d'un alumne",
        description: "Comprova el nom d'usuari i la contrasenya. Retorna les dades de l'alumne si és correcte.",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Dades d'inici de sessió",
            content: new OA\JsonContent(ref: "#/components/schemas/LoginRequest")
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: "Usuari autenticat correctament",
                content: new OA\JsonContent(ref: "#/components/schemas/Alumne")
            ),
            new OA\Response(
                response: 401,
                description: "Usuari i/o contrasenya incorrectes"
            )
        ]
    )]
    public function loggin(Request $request) {
        $alumne = Alumne::where('Nom_Usuari', $request->Nom_Usuari)->with('experiencia')->first();
        if ($alumne && Hash::check($request->Password, $alumne->Password)) {
            $token = $alumne->createToken("mobile_token")->plainTextToken;
            return response()->json(["Resposta" => ["Alumne" => $alumne, "token" => $token]], 200);
        }
        else {
            return response()->json(["Usuari i/o contrasenya incorrectes"], 401);
        }
    }

    public function tokenLoggin(Request $request) {
        $token = $request->token;
        $user = PersonalAccessToken::findToken($token);
        if (!$user) {
            return response()->json(["message" => "Token inválido"], 401);
        }
        $alumne = $user->tokenable;
        $alumne->load('experiencia');
        return response()->json([$alumne], 200);
    }

    public function perfilImageUpload(Request $request) {
        $request->validate([
            'image' => 'required|string',
            'extension' => 'required|string|in:jpg,jpeg,png'
        ]);
        $imageData = $request->image;
        if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
            $imageData = substr($imageData, strpos($imageData, ',') + 1);
        }
        $imageData = base64_decode($imageData);
        if ($imageData === false) {
            return response()->json(['message' => 'Base64 inválido'], 400);
        }
        $filename = Str::random(20) . '.' . $request->extension;
        $path = storage_path("app/public/images/$filename");
        file_put_contents($path, $imageData);
        return response()->json([
            'message' => 'Imagen subida correctamente',
            'path' => "images/$filename"
        ], 201);
    }

    public function perfilImageEdit(Request $request) {
        $request->validate([
            'image' => 'required|string',
            'extension' => 'required|string|in:jpg,jpeg,png'
        ]);
        $imageData = $request->image;
        if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
            $imageData = substr($imageData, strpos($imageData, ',') + 1);
        }
        $imageData = base64_decode($imageData);
        if ($imageData === false) {
            return response()->json(['message' => 'Base64 inválido'], 400);
        }
        Storage::disk('public')->delete($request->path);
        $filename = Str::random(20) . '.' . $request->extension;
        $path = storage_path("app/public/images/$filename");
        file_put_contents($path, $imageData);
        return response()->json([
            'message' => 'Imagen subida correctamente',
            'path' => "images/$filename"
        ], 201);
    }

    public function experiencia(Experiencia $experiencia) {
        return response()->json([$experiencia], 200);
    }

    public function experienciaUpdate(Request $request, Experiencia $experiencia) {
        $experiencia->update($request->all());
        return response()->json([$experiencia], 200);
    }
}