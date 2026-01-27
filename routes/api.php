<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumneController;
use App\Models\Alumne;
use App\Models\Informe;
use Laravel\Sanctum\PersonalAccessToken;

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

/* API TOKEN */
/* Ap3wO8b4mJzkap05MbNMzgtaBxqTUyYHuYbmQDxH7f9f5913 */