<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerLoan;
use App\Models\Customer;
use App\Models\Loan;


class CustomerLoanController extends Controller
{
    public function index()
    {
        // Validate required Customer id
        $customer_loans = DB::table('customer_loan')
                            ->join('customers', 'customers.id', '=', 'customer_loan.customer_id')
                            ->join('loans', 'loans.id', '=', 'customer_loan.loan_id')
                            ->select('customer_loan.*', 'customer_loan.start_date', 'customers.name as customer_name', 
                                    'loans.principal', 'loans.interest', 'loans.tenure', 'loans.tenure', 'loans.payment', 'loans.name' )
                            ->where('customer_loan.customer_id', request('customer_id'))
                            ->latest()
                            ->paginate();

        return view('customer.loans', 
            ['customer_loans' => $customer_loans, 
             'loans' => Loan::all(),
             'customer_id' => request('customer_id')
            ]
        );

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'loan_id'   => ['required', 'exists:loans,id'],
            'customer_id'   => ['required', 'exists:customers,id'],
            'start_date'    => ['required', 'date']
        ]);

        CustomerLoan::create($data);

        return back()->with('success', 'Saved Successfully');
    }

    public function update(Request $request, CustomerLoan $customers_loan)
    {
        $data = $request->validate([
            'loan_id'   => ['required', 'exists:loans,id'],
            'customer_id'   => ['required', 'exists:customers,id'],
            'start_date'    => ['required', 'date']
        ]);

        $customers_loan->update($data);

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy(CustomerLoan $customers_loan)
    {
        $customers_loan->delete();
        
        return back()->with('success', 'Deleted Successfully');
    }


}
