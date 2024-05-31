<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idPersona' => 'required|exists:personas,id',
            'idPais' => 'required|exists:paises,id',
            'nacionalidad' => 'required|string|max:20',
            'usuCrea' => 'nullable|integer',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $cliente = Cliente::create($request->all());

        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::find($id);

        if (is_null($cliente)) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'idPersona' => 'required|exists:personas,id',
            'idPais' => 'required|exists:paises,id',
            'nacionalidad' => 'required|string|max:20',
            'usuCrea' => 'nullable|integer',
            'usuMod' => 'nullable|integer',
            'bitEstado' => 'nullable|integer'
        ]);

        $cliente = Cliente::find($id);

        if (is_null($cliente)) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $cliente->update($request->all());

        return response()->json($cliente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);

        if (is_null($cliente)) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Registro eliminado'], 204);
    }
}
