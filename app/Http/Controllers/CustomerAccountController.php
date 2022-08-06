<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Account;

class CustomerAccountController extends Controller
{
    public function index(Customer $customer)
    {
        // get accounts
        // calc balance
        $debit_sum = Account::where(['customer_id' => $customer->id, 'type' => Account::ACCOUNT_TYPE_DEBIT])
                            ->sum('amount'); 
        $credit_sum = Account::where(['customer_id' => $customer->id, 'type' => Account::ACCOUNT_TYPE_CREDIT])
                            ->sum('amount'); 

        $balance = $credit_sum - $debit_sum;

        return view('customer.account.index', [
            'customer'  => $customer,
            'accounts'  => $customer->accounts()->latest()->paginate(30),
            'balance'   => $balance,
            'accountTypeMapping' => Account::AccountTypeMapping()
        ]);
    }

    public function store(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'amount'    => ['required', 'numeric'],
            'remark'    => ['sometimes', 'string', 'max:255'],
            'type'      => ['required']
        ]);

        $account = new Account;
        $account->customer_id = $customer->id;
        $account->amount = $data['amount'];
        $account->remark = isset($data['remark']) ? $data['remark'] : '';
        $account->type = $data['type'];

        $account->save();

        return back()->with('success', 'Saved Successfully');
    }

    public function update(Request $request, Customer $customer, Account $account)
    {
        $data = $request->validate([
            'amount'    => ['sometimes', 'numeric'],
            'remark'    => ['sometimes', 'string', 'max:255'],
            'type'      => ['sometimes', 'integer']
        ]);

       $account->update($data);


        return redirect("customers/{$customer->id}/accounts")->with('success', 'Saved Successfully');
    }

    public function edit(Customer $customer, Account $account)
    {
        return view('customer.account.edit', [
            'customer' => $customer, 
            'account'   => $account,
            'accountTypeMapping' => Account::AccountTypeMapping()
        ]);
    }

    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }

    public function destroy(Request $request, Customer $customer, Account $account)
    {
        $account->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
