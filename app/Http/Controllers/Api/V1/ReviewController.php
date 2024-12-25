<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        // Obtener todas las reseñas con las relaciones
        $reviews = Review::with(['professional', 'client', 'request'])->get();
        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'professional_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:users,id',
            'request_id' => 'required|exists:requests,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Crear una nueva reseña
        $review = Review::create($request->all());
        return response()->json($review, 201);
    }

    public function show($id)
    {
        // Obtener una reseña específica con las relaciones
        $review = Review::with(['professional', 'client', 'request'])->find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        return response()->json($review);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'professional_id' => 'sometimes|exists:users,id',
            'client_id' => 'sometimes|exists:users,id',
            'request_id' => 'sometimes|exists:requests,id',
            'rating' => 'sometimes|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Actualizar la reseña
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->update($request->all());
        return response()->json($review);
    }

    public function destroy($id)
    {
        // Eliminar una reseña
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
