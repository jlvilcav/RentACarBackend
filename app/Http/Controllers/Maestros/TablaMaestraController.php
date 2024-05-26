<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\Controller;
use App\Models\Maestros\TablaMaestra;
use Illuminate\Http\Request;

class TablaMaestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TablaMaestra::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tabla' => 'required|string|max:20',
            'descripcion' => 'required|string|max:50',
            'tipocampo' => 'required|string|max:15',
            'valor' => 'required|string|max:50',
            'usuCrea' => 'nullable|integer',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $tablaMaestra = TablaMaestra::create($request->all());

        return response()->json($tablaMaestra, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tablaMaestra = TablaMaestra::find($id);

        if (is_null($tablaMaestra)) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($tablaMaestra);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tabla' => 'required|string|max:20',
            'descripcion' => 'required|string|max:50',
            'tipocampo' => 'required|string|max:15',
            'valor' => 'required|string|max:50',
            'usuCrea' => 'nullable|integer',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $tablaMaestra = TablaMaestra::find($id);

        if (is_null($tablaMaestra)) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $tablaMaestra->update($request->all());

        return response()->json($tablaMaestra);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tablaMaestra = TablaMaestra::find($id);

        if (is_null($tablaMaestra)) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $tablaMaestra->delete();

        return response()->json(['message' => 'Registro eliminado'], 204);
    }
}
