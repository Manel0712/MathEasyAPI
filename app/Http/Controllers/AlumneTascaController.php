<?php

namespace App\Http\Controllers;

use App\Models\AlumneTasca;
use App\Models\Tasca;
use App\Models\Alumne;
use App\Models\Professor;
use App\Mail\TascaAssignada;
use App\Mail\TascaDesassignada;
use App\Mail\Tramesa;
use App\Mail\Qualificacio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlumneTascaController extends Controller
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
    public function store(Request $request)
    {
        $asignacio = AlumneTasca::create($request->all());
        $alumne = Alumne::find($request->Alumne);
        $tasca = Tasca::find($request->Tasca);
        Mail::to($alumne->Email)->send(new TascaAssignada($alumne, $tasca));
        return response()->json($asignacio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AlumneTasca $alumneTasca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlumneTasca $alumneTasca)
    {
        $tasca = Tasca::find($alumneTasca->Tasca);
        if (!$request->has('Qualificacio')) {
            Mail::to($request->Email)->send(new Tramesa($tasca));
        }
        else {
            $professor = Professor::find($request->Professor);
            $alumne = Alumne::find($alumneTasca->Alumne);
            Mail::to($alumne->Email)->send(new Qualificacio($professor, $tasca));
        }
        $alumneTasca->update($request->all());
        return response()->json([$alumneTasca], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlumneTasca $alumneTasca)
    {
        //
    }

    public function obtenirAssignacionsTasca(Tasca $tasca) {
        $alumnes = AlumneTasca::where('Tasca', $tasca->id)->get();
        return response()->json($alumnes, 200);
    }

    public function eliminarAssignacio(Request $request) {
        $alumneTasca = AlumneTasca::where('Alumne', $request->Alumne)->where('Tasca', $request->Tasca)->get();
        $alumneTasca->each(function($item){
            $item->delete();
        });
        $alumne = Alumne::find($request->Alumne);
        $tasca = Tasca::find($request->Tasca);
        if($alumne && $tasca){
            Mail::to($alumne->Email)->send(new TascaDesassignada($alumne, $tasca));
        }
        return response()->json([], 204);
    }
}
