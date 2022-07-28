<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerLoan;
use App\Models\Loan;

class PaymentScheduleController extends Controller
{
    public function index()
    {
        $customer_loan = CustomerLoan::find(request('customer_loan_id'));
        $customer = Customer::find($customer_loan->customer_id);
        $loan = Loan::find($customer_loan->loan_id);

        return view('payment-schedule', [
            'customer'  => $customer,
            'loan'      => $loan,
            'start_date'=> $customer_loan->start_date
        ]);
    }
}
