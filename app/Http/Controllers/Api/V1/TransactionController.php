<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Obtener todas las transacciones con información de las relaciones
        $transactions = Transaction::with(['request', 'client', 'professional'])->get();
        return response()->json($transactions);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'request_id' => 'required|exists:requests,id',
            'client_id' => 'required|exists:users,id',
            'professional_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string|in:cash,card,online',
            'status' => 'required|string|in:pending,paid,cancelled',
        ]);

        // Crear una nueva transacción
        $transaction = Transaction::create($request->all());
        return response()->json($transaction, 201);
    }

    public function show($id)
    {
        // Obtener una transacción específica con las relaciones
        $transaction = Transaction::with(['request', 'client', 'professional'])->find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        return response()->json($transaction);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'request_id' => 'sometimes|exists:requests,id',
            'client_id' => 'sometimes|exists:users,id',
            'professional_id' => 'sometimes|exists:users,id',
            'amount' => 'sometimes|numeric|min:0',
            'payment_method' => 'sometimes|string|in:cash,card,online',
            'status' => 'sometimes|string|in:pending,paid,cancelled',
        ]);

        // Actualizar la transacción
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->update($request->all());
        return response()->json($transaction);
    }

    public function destroy($id)
    {
        // Eliminar una transacción
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}
