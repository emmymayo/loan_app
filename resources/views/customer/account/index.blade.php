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
        Customer Account
    </h1>
    <hr>
    <h3 class="display-4"> {{$customer->name}}</h3>
    <h6 class="font-weight-bold h4">Balance: &#8358;{{$balance}}</h6>
    <button type="button" class="btn btn-primary my-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add New</button>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">(&#8358;) Amount</th>
            <th scope="col">Type </th>
            <th scope="col">Date </th>
            <th scope="col">Remark </th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account )
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$account->amount}}</td>
                <td>{{$accountTypeMapping[$account->type]}}</td>
                <td>{{\Carbon\Carbon::create($account->created_at)->format('d F, Y')}}</td>
                <td>{{$account->remark}}</td>
                <td>
                    <a href="/customers/{{$account->customer_id}}/accounts/{{$account->id}}/edit" class="btn btn-primary mx-2">Edit</a>
                    <form action="/customers/{{$account->customer_id}}/accounts/{{$account->id}}" method="post" class="d-inline-block"> 
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{$accounts->links()}}
    </div>

</section>


<section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Credit / Debit Account</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/customers/{{$customer->id}}/accounts", method="POST"> @csrf
                <div class="modal-body">
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount">
                    </div>
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Remark</label>
                    <input type="text" class="form-control" id="remark" name="remark">
                    </div>
                    <div class="mb-3">
                    <label for="message-text" class="col-form-label">Type</label>
                    <select name="type" id="type"  class="form-control">
                        @foreach ($accountTypeMapping as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
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