
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
<section class="loans__table m-5">
    <h1 class="display-2">
        Loan Types
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
            <th scope="col">Tenure (months)</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan )
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$loan->name}}</td>
                <td>{{$loan->principal}}</td>
                <td>{{$loan->interest}}</td>
                <td>{{$loan->payment}}</td>
                <td>{{$loan->tenure}}</td>
                <td>
                    <a href="{{route('loans.edit', $loan)}}" class="btn btn-primary mx-2">Edit</a>
                    <form action="{{route('loans.destroy', $loan)}}" method="post" class="d-inline-block"> 
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary mx-2">Delete</button>
                    </form>
                    <a href="" class="btn btn-primary mx-2">Customers</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{$loans->links()}}
    </div>
</section>


<section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Loan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('loans.store')}}", method="POST"> @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="principal" class="col-form-label">Principal</label>
                        <input type="number" class="form-control" id="principal" name="principal">
                    </div>
                    <div class="mb-3">
                        <label for="interest" class="col-form-label">Interest</label>
                        <input type="number" class="form-control" id="interest" name="interest">
                    </div>
                    <div class="mb-3">
                        <label for="interest" class="col-form-label">Payment</label>
                        <input type="number" class="form-control" id="payment" name="payment">
                    </div>
                    <div class="mb-3">
                        <label for="tenure" class="col-form-label">Tenure</label>
                        <input type="number" class="form-control" id="tenure" name="tenure">
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

