<?php

namespace App\Http\Controllers;

use App\Models\Tasca;
use Illuminate\Http\Request;

class TascaController extends Controller
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
        $tasca = Tasca::create($request->all());
        return response()->json($tasca, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasca $tasca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasca $tasca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasca $tasca)
    {
        //
    }
}
