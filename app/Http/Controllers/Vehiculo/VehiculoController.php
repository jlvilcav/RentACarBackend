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
        $validated = $request->validate([
            'idMarcaVehiculo' => 'required|integer',
            'idModeloVehiculo' => 'required|integer',
            'placa' => 'required|string|max:6',
            'motor' => 'required|integer',
            'anio' => 'required|string|max:4',
            'kilometraje' => 'required|integer',
            'gps' => 'integer',
            'fechaSoat' => 'date',
            'fechaInspeccionVehicular' => 'date',
            'idAfilado' => 'integer',
            'idTipoVehiculo' => 'required|integer',
            'idTipoCombustible' => 'required|integer',
            'idTrasmision' => 'required|integer',
            'idTraccion' => 'required|integer',
            'idCategoriaVehiculo' => 'required|integer',
            'precioAlquiler' => 'required|numeric',
            'observacion' => 'string|max:1000',
            'usuCrea' => 'required|integer',
            'usuMod' => 'integer',
            'bitEstado' => 'integer'
        ]);

        $vehiculo = Vehiculo::create($validated);
        return response()->json($vehiculo, 201);
    }

    // Mostrar un vehículo específico
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehiculo not found'], 404);
        }

        return response()->json($vehiculo);
    }

    // Actualizar un vehículo existente
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehiculo not found'], 404);
        }

        $validated = $request->validate([
            'idMarcaVehiculo' => 'required|integer',
            'idModeloVehiculo' => 'required|integer',
            'placa' => 'required|string|max:6',
            'motor' => 'required|integer',
            'anio' => 'required|string|max:4',
            'kilometraje' => 'required|integer',
            'gps' => 'integer',
            'fechaSoat' => 'date',
            'fechaInspeccionVehicular' => 'date',
            'idAfilado' => 'integer',
            'idTipoVehiculo' => 'required|integer',
            'idTipoCombustible' => 'required|integer',
            'idTrasmision' => 'required|integer',
            'idTraccion' => 'required|integer',
            'idCategoriaVehiculo' => 'required|integer',
            'precioAlquiler' => 'required|numeric',
            'observacion' => 'string|max:1000',
            'usuCrea' => 'required|integer',
            'usuMod' => 'integer',
            'bitEstado' => 'integer'
        ]);

        $vehiculo->update($validated);

        return response()->json($vehiculo, 200);
    }

    // Eliminar un vehículo
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return response()->json(['message' => 'Vehiculo not found'], 404);
        }

        $vehiculo->delete();

        return response()->json(null, 204);
    }
}
