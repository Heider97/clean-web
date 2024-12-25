<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function index()
    {
        // Obtener todas las solicitudes con información del cliente
        $requests = Request::with('client')->get();
        return response()->json($requests);
    }

    public function store(HttpRequest $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|string|in:pending,approved,rejected,completed',
        ]);

        // Crear una nueva solicitud
        $newRequest = Request::create($request->all());
        return response()->json($newRequest, 201);
    }

    public function show($id)
    {
        // Obtener una solicitud específica
        $request = Request::with('client')->find($id);
        if (!$request) {
            return response()->json(['message' => 'Request not found'], 404);
        }
        return response()->json($request);
    }

    public function update(HttpRequest $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'client_id' => 'sometimes|exists:users,id',
            'address' => 'sometimes|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'description' => 'nullable|string|max:1000',
            'status' => 'sometimes|string|in:pending,approved,rejected,completed',
        ]);

        // Actualizar la solicitud
        $existingRequest = Request::find($id);
        if (!$existingRequest) {
            return response()->json(['message' => 'Request not found'], 404);
        }

        $existingRequest->update($request->all());
        return response()->json($existingRequest);
    }

    public function destroy($id)
    {
        // Eliminar una solicitud
        $request = Request::find($id);
        if (!$request) {
            return response()->json(['message' => 'Request not found'], 404);
        }

        $request->delete();
        return response()->json(['message' => 'Request deleted successfully']);
    }
}
