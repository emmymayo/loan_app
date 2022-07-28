<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index()
    {
        return view('loan.index', ['loans' => Loan::latest()->paginate()]);
    }

    public function create()
    {
        return view('loan.create');
    }

    public function edit(Loan $loan)
    {
        return view('loan.edit', ['loan' => $loan]);
    }

    public function show(Loan $loan)
    {
        return view('loan.show', ['loan' => $loan]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'principal'     => ['required', 'numeric'],
            'interest'      => ['required', 'numeric'],
            'payment'      => ['sometimes', 'numeric'],
            'interest_type' => ['sometimes', 'integer'],
            'tenure'        => ['required', 'integer'],
        ]);

        Loan::create($data);

        return back()->with('success', 'Saved Successfully');
    }

    public function update(Request $request, Loan $loan)
    {
        $data = $request->validate([
            'name'          => ['sometimes', 'string', 'max:255'],
            'principal'     => ['sometimes', 'numeric'],
            'interest'      => ['sometimes', 'numeric'],
            'payment'      => ['sometimes', 'numeric'],
            'interest_type' => ['sometimes', 'integer'],
            'tenure'        => ['sometimes', 'integer'],
        ]);

        $loan->update($data);

        return redirect()->route('loans.index')->with('success', 'Updated Successfully');
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
