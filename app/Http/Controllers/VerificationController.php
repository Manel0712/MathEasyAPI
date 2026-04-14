<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\VerificationCodeMail;

class VerificationController extends Controller
{
    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->email;
        $codigo = rand(100000, 999999);

        Cache::put('verification_'.$email, $codigo, now()->addMinutes(10));

        Mail::to($email)->send(new VerificationCodeMail($codigo));

        return response()->json(['message' => 'Código enviado']);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'codigo' => 'required'
        ]);

        $email = $request->email;
        $codigo = $request->codigo;

        $codigoGuardado = Cache::get('verification_'.$email);

        if ($codigoGuardado && $codigoGuardado == $codigo) {
            Cache::forget('verification_'.$email);
            return response()->json(['message' => 'Código correcto']);
        }

        return response()->json(['message' => 'Código incorrecto'], 400);
    }
}
