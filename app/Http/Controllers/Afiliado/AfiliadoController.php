<?php

namespace App\Http\Controllers\Afiliado;

use App\Http\Controllers\Controller;
use App\Models\Afiliado\Afiliado;
use Illuminate\Http\Request;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Afiliado::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idPersona' => 'required|exists:personas,id',
            'idBanco' => 'required|exists:bancos,id',
            'cta' => 'required|string|max:20',
            'cci' => 'required|string|max:20',
            'yape' => 'required|string|max:9',
            'plin' => 'required|string|max:9',
            'usuCrea' => 'nullable|integer',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $afiliado = Afiliado::create($request->all());

        return response()->json($afiliado, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Afiliado $afiliado)
    {
        return $afiliado;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Afiliado $afiliado)
    {
        $request->validate([
            'idPersona' => 'required|exists:personas,id',
            'idBanco' => 'required|exists:bancos,id',
            'cta' => 'required|string|max:20',
            'cci' => 'required|string|max:20',
            'yape' => 'required|string|max:9',
            'plin' => 'required|string|max:9',
            'usuCrea' => 'nullable|integer',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $afiliado->update($request->all());

        return response()->json($afiliado, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $afiliado->delete();

        return response()->json(null, 204);
    }
}
