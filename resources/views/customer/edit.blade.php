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

<section class="customer__edit container">
    <form action="{{route('customers.update', $customer)}}", method="POST"> @csrf @method('PUT')
            <div class="mb-3">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Account Information</label>
                <input type="text" class="form-control" id="account_info" name="account_info" value="{{$customer->account_info}}">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Status</label>
                <select name="status" id="status" class="form-control">
                @foreach ($statusMappings as $key => $status)
                    <option {{$key == $customer->status ? 'selected' : ''}} value="{{$key}}">{{$status}}</option>
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>

<x-footer></x-footer>