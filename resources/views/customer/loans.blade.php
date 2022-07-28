
<x-header></x-header>
<x-menu></x-menu>

<section class="notifications">
    @if (session('success'))
    <div class="alert alert-success">
            {{session('success')}}
    </div>
        @endif
    @if (session('error'))
    <div class="alert alert-danger">
            {{session('error')}}
    </div>
    @endif
</section>
<section class="customer-loans__table m-5">
    <h1 class="display-2">
        Customer Loans
    </h1>
    <button type="button" class="btn btn-primary my-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add New</button>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Principal</th>
            <th scope="col">Interest</th>
            <th scope="col">Payment</th>
            <th scope="col">Tenure</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer_loans as $customer_loan )
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$customer_loan->name}}</td>
                <td>{{$customer_loan->principal}}</td>
                <td>{{$customer_loan->interest}}</td>
                <td>{{$customer_loan->payment}}</td>
                <td>{{$customer_loan->tenure}}</td>
                <td>{{$customer_loan->start_date}}</td>
                <td>
                    <a target="_blank" href="{{"/payment-schedule?customer_loan_id=$customer_loan->id"}}" class="btn btn-primary mx-2">Payment Schedule</a>
                    <form action="{{"/customers-loans/$customer_loan->id"}}" method="post" class="d-inline-block"> 
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary mx-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{$customer_loans->links()}}
    </div>

</section>


<section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Customer Loan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('customers-loans.store')}}", method="POST"> @csrf
                <div class="modal-body">
                    <input type="hidden" name="customer_id" value="{{$customer_id}}">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Loan</label>
                        <select name="loan_id" id="loan_id" class="form-control">
                            <option value="">--Select Loan--</option>
                            @foreach ($loans as $loan )
                                <option value="{{$loan->id}}">{{$loan->name}} ({{$loan->principal}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
          </div>
        </div>
      </div>
</section>


<x-footer></x-footer>

