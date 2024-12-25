<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Obtener todos los clientes con información de usuario
        $customers = Customer::with('user')->get();
        return response()->json($customers);
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Crear un nuevo cliente
        $customer = Customer::create($request->all());
        return response()->json($customer, 201);
    }

    public function show($id)
    {
        // Obtener un cliente específico
        $customer = Customer::with('user')->find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'address' => 'sometimes|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Actualizar el cliente
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->update($request->all());
        return response()->json($customer);
    }

    public function destroy($id)
    {
        // Eliminar un cliente
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
