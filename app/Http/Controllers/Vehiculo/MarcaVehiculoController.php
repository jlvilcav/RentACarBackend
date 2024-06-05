<?php

namespace App\Http\Controllers\Vehiculo;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo\MarcaVehiculo;
use Illuminate\Http\Request;

class MarcaVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MarcaVehiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombreMarcaVehiculo' => 'required|max:20',
            'usuCrea' => 'required|integer',
            'bitEstado' => 'required|integer'
        ]);

        $marca = MarcaVehiculo::create($validated);
        return response()->json($marca, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $marcaVehiculo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Encuentra el registro por ID
        $marcaVehiculo = MarcaVehiculo::find($id);

        // Verifica si el registro existe
        if (!$marcaVehiculo) {
            return response()->json(['message' => 'MarcaVehiculo not found'], 404);
        }

        // Valida los datos del request
        $validated = $request->validate([
            'nombreMarcaVehiculo' => 'required|max:20',
            'usuCrea' => 'required|integer',
            'usuMod' => 'integer',
            'bitEstado' => 'required|integer'
        ]);

        // Actualiza el registro con los datos validados
        $marcaVehiculo->update($validated);

        // Devuelve la respuesta
        return response()->json($marcaVehiculo, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marcaVehiculo->delete();
        return response()->json(null, 204);
    }
}
