<?php

namespace App\Http\Controllers\Vehiculo;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    // Mostrar todos los vehículos
    public function index()
    {
        return Vehiculo::all();
    }

    // Crear un nuevo vehículo
    public function store(Request $request)
    {
        $vehiculo = Vehiculo::create($request->all());
        return response()->json($vehiculo, 201);
    }

    // Mostrar un vehículo específico
    public function show($id)
    {
        return Vehiculo::findOrFail($id);
    }

    // Actualizar un vehículo existente
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($request->all());
        return response()->json($vehiculo, 200);
    }

    // Eliminar un vehículo
    public function destroy($id)
    {
        Vehiculo::destroy($id);
        return response()->json(null, 204);
    }
}
