
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
<section class="customers__table m-5">
    <h1 class="display-2">
        Customers
    </h1>
    <button type="button" class="btn btn-primary my-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add New</button>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Account Information</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer )
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->account_info}}</td>
                <td>
                    <a href="{{route('customers.edit', $customer)}}" class="btn btn-primary mx-2">Edit</a>
                    <form action="{{route('customers.destroy', $customer)}}" method="post" class="d-inline-block"> 
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-2">Delete</button>
                    </form>
                    <a href="{{route('customers-loans.index', ['customer_id' => $customer->id])}}" class="btn btn-primary mx-2">Loans</a>
                    <a href="{{route('customers-loans.index', ['customer_id' => $customer->id])}}" class="btn btn-success mx-2">Savings</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{$customers->links()}}
    </div>

</section>


<section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('customers.store')}}", method="POST"> @csrf
                <div class="modal-body">
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                    <label for="message-text" class="col-form-label">Account Information:</label>
                    <input type="text" class="form-control" id="account_info" name="account_info">
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

