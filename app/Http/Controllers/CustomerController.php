<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index', ['customers' => Customer::latest()->paginate()]);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'customer' => $customer, 
            'statusMappings' => Customer::statusMapping()
        ]);
    }

    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'account_info'  => ['sometimes', 'string', 'max:255'],
            'status'        => ['sometimes', 'integer']
        ]);

        Customer::create($data);

        return back()->with('success', 'Saved Successfully');
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'          => ['sometimes', 'string', 'max:255'],
            'account_info'  => ['sometimes', 'string', 'max:255'],
            'status'        => ['sometimes', 'integer']
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Updated Successfully');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
