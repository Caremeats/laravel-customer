<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // GET /api/customers
    public function getAllCustomers()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    // GET /api/customers/{id}
    public function getCustomerById($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    // POST /api/customers
    public function create(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'contact_number' => 'required|string|max:15',
        ]);

        $customer = Customer::create($validated);
        return response()->json($customer, 201);
    }

    // PUT /api/customers/{id}
    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'contact_number' => 'required|string|max:15',
        ]);

        $customer->update($validated);
        return response()->json($customer);
    }

    // DELETE /api/customers/{id}
    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
