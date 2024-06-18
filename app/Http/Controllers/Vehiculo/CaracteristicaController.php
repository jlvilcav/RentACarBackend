<?php

namespace App\Http\Controllers\Vehiculo;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo\Caracteristica;
use Illuminate\Http\Request;

class CaracteristicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Caracteristica::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'caracteristica' => 'required|max:50',
            'label' => 'required|max:50',
            'usuCrea' => 'required|integer',
            'usuMod' => 'integer',
            'bitEstado' => 'integer'
        ]);

        $caracteristica = Caracteristica::create($validated);
        return response()->json($caracteristica, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $caracteristica = Caracteristica::find($id);

        if (!$caracteristica) {
            return response()->json(['message' => 'Caracteristica not found'], 404);
        }

        return response()->json($caracteristica);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $caracteristica = Caracteristica::find($id);

        if (!$caracteristica) {
            return response()->json(['message' => 'Caracteristica not found'], 404);
        }

        $validated = $request->validate([
            'caracteristica' => 'required|max:50',
            'label' => 'required|max:50',
            'usuCrea' => 'required|integer',
            'usuMod' => 'integer',
            'bitEstado' => 'integer'
        ]);

        $caracteristica->update($validated);

        return response()->json($caracteristica, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $caracteristica = Caracteristica::find($id);

        if (!$caracteristica) {
            return response()->json(['message' => 'Caracteristica not found'], 404);
        }

        $caracteristica->delete();

        return response()->json(null, 204);
    }
}
