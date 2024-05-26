<?php

namespace App\Http\Controllers\Vehiculo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeloVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelos = ModeloVehiculo::all();
        return response()->json($modelos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idMarcaVehiculo' => 'required|exists:marcavehiculos,idMarcaVehiculo',
            'nombreModeloVehiculo' => 'required|string|max:20',
            'usuCrea' => 'nullable|integer',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $modelo = ModeloVehiculo::create($validatedData);

        return response()->json($modelo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $modelo = ModeloVehiculo::findOrFail($id);
        return response()->json($modelo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'idMarcaVehiculo' => 'required|exists:marcavehiculos,idMarcaVehiculo',
            'nombreModeloVehiculo' => 'required|string|max:20',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $modelo = ModeloVehiculo::findOrFail($id);
        $modelo->update($validatedData);

        return response()->json($modelo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $modelo = ModeloVehiculo::findOrFail($id);
        $modelo->delete();

        return response()->json(null, 204);
    }
}
