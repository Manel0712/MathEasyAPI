<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\InformeController;
use App\Models\Alumne;
use App\Models\Informe;
use App\Models\Experiencia;
use App\Models\Tasca;
use App\Models\AlumneTasca;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\TascaController;
use App\Http\Controllers\AlumneTascaController;
use App\Http\Controllers\OperacioController;
use App\Http\Controllers\OperacioTascaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('alumnes', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->index();
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('alumnes', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->store($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::get('alumnes/{alumne}', function (Request $request, Alumne $alumne) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->show($alumne);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::put('alumnes/{alumne}', function (Request $request, Alumne $alumne) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->update($request, $alumne);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('loggin', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->loggin($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('tokenLoggin', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->tokenLoggin($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('perfilImage', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->perfilImageUpload($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('perfilImageEdit', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->perfilImageEdit($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('professors', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $professorController = new ProfessorController();
        return $professorController->store($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('professorsLoggin', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $professorController = new ProfessorController();
        return $professorController->loggin($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::get('informes', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new InformeController();
        return $alumneController->index();
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('informes', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new InformeController();
        return $alumneController->store($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::get('alumnes/experiencia/{experiencia}', function (Request $request, Experiencia $experiencia) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->experiencia($experiencia);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::put('alumnes/experiencia/{experiencia}', function (Request $request, Experiencia $experiencia) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new AlumneController();
        return $alumneController->experienciaUpdate($request, $experiencia);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::get('informesAlumne/{alumne}', function (Request $request, $alumne) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneController = new InformeController();
        return $alumneController->informesAlumne($alumne);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('/send-code', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $verificacioController = new VerificationController();
        return $verificacioController->sendCode($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('/verify-code', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $verificacioController = new VerificationController();
        return $verificacioController->verifyCode($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::get('/temes', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $temaController = new TemaController();
        return $temaController->index();
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('/temes', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $temaController = new TemaController();
        return $temaController->store($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('/tasques', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $tascaController = new TascaController();
        return $tascaController->store($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('/assignarTascaAlumne', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneTascaController = new AlumneTascaController();
        return $alumneTascaController->store($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::get('/obtenirAssignacionsTasca/{tasca}', function (Request $request, Tasca $tasca) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneTascaController = new AlumneTascaController();
        return $alumneTascaController->obtenirAssignacionsTasca($tasca);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::delete('/eliminarAssignacio', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneTascaController = new AlumneTascaController();
        return $alumneTascaController->eliminarAssignacio($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::get('/tasquesAlumne/{alumne}', function (Request $request, Alumne $alumne) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $temaController = new TemaController();
        return $temaController->tasquesAlumne($alumne);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::post('/assignarOperacions', function (Request $request) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $operacioController = new OperacioController();
        return $operacioController->store($request);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

Route::put('respostesOperacions/{alumneTasca}', function (Request $request, AlumneTasca $alumneTasca) {
    $token = $request->bearerToken();
    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
        $alumneTascaController = new AlumneTascaController();
        return $alumneTascaController->update($request, $alumneTasca);
    }
    else {
        return response()->json([
            "Usuari no autenticat"
        ], 401);
    }
});

/* API TOKEN */
/* Ap3wO8b4mJzkap05MbNMzgtaBxqTUyYHuYbmQDxH7f9f5913 */