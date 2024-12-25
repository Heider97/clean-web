<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    public function index()
    {
        // Obtener todos los profesionales con información de usuario
        $professionals = Professional::with('user')->get();
        return response()->json($professionals);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'nullable|numeric|min:0|max:5',
            'total_reviews' => 'nullable|integer|min:0',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Crear un nuevo profesional
        $professional = Professional::create($request->all());
        return response()->json($professional, 201);
    }

    public function show($id)
    {
        // Obtener un profesional específico
        $professional = Professional::with('user')->find($id);
        if (!$professional) {
            return response()->json(['message' => 'Professional not found'], 404);
        }
        return response()->json($professional);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'rating' => 'nullable|numeric|min:0|max:5',
            'total_reviews' => 'nullable|integer|min:0',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Actualizar el profesional
        $professional = Professional::find($id);
        if (!$professional) {
            return response()->json(['message' => 'Professional not found'], 404);
        }

        $professional->update($request->all());
        return response()->json($professional);
    }

    public function destroy($id)
    {
        // Eliminar un profesional
        $professional = Professional::find($id);
        if (!$professional) {
            return response()->json(['message' => 'Professional not found'], 404);
        }

        $professional->delete();
        return response()->json(['message' => 'Professional deleted successfully']);
    }
}
