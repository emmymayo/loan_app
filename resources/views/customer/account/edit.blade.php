<x-header></x-header>
<x-menu></x-menu>
<section class="errors">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</section>

<section class="customer-account__edit container">
    <form action="/customers/{{$customer->id}}/accounts/{{$account->id}}", method="POST"> @csrf @method('PUT')
        <div class="modal-body">
            <input type="hidden" name="customer_id" value="{{$customer->id}}">
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{$account->amount}}">
            </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Remark</label>
            <input type="text" class="form-control" id="remark" name="remark" value="{{$account->remark}}">
            </div>
            <div class="mb-3">
            <label for="message-text" class="col-form-label">Type</label>
            <select name="type" id="type" class="form-control">
                @foreach ($accountTypeMapping as $key => $value)
                    <option {{$account->type == $key ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</section>

<x-footer></x-footer>