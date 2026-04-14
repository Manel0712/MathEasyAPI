<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Alumne;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temes = Tema::with('tasques')->get()->map(function($tema){
            return [
                'id' => $tema->id,
                'Nom' => $tema->Nom,
                'tasques' => $tema->tasques->map(function($tasca){
                    return [
                        'id' => $tasca->id,
                        'Nom' => $tasca->Nom,
                        'Data_obertura' => $tasca->Data_obertura ? Carbon::parse($tasca->Data_obertura)->format('d/m/Y') : null,
                        'Data_tancament' => $tasca->Data_tancament ? Carbon::parse($tasca->Data_tancament)->format('d/m/Y') : null,
                        'operacions' => $tasca->operacions->map(fn($op) => [
                            'id' => $op->id,
                            'Operacio' => $op->Operacio
                        ])->values(),
                    ];
                }),
            ];
        });
        return response()->json($temes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tema = Tema::create($request->all());
        return response()->json($tema, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        //
    }

    public function tasquesAlumne(Alumne $alumne) {
        $temes = Tema::with('tasques.alumnes', 'tasques.operacions')->get()->map(function($tema) use ($alumne) {
            return [
                'id' => $tema->id,
                'Nom' => $tema->Nom,
                'tasques' => $tema->tasques
                    ->filter(fn($tasca) => $tasca->alumnes->contains('id', $alumne->id))
                    ->map(function($tasca) use ($alumne) {
                        $alumnePivot = $tasca->alumnes->firstWhere('id', $alumne->id);
                        return [
                            'id' => $tasca->id,
                            'Nom' => $tasca->Nom,
                            'Data_obertura' => $tasca->Data_obertura
                                ? Carbon::parse($tasca->Data_obertura)->format('d/m/Y')
                                : null,
                            'Data_tancament' => $tasca->Data_tancament
                                ? Carbon::parse($tasca->Data_tancament)->format('d/m/Y')
                                : null,
                            'operacions' => $tasca->operacions->map(fn($op) => [
                                'id' => $op->id,
                                'Operacio' => $op->Operacio
                            ])->values(),
                            'tema' => $tasca->tema_id,
                            'pivot' => $alumnePivot->pivot,
                        ];
                    })
                    ->values(),
            ];
        });
        return response()->json($temes, 200);
    }
}
