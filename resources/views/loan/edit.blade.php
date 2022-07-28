<x-header></x-header>
<x-menu></x-menu>

<section class="loan__edit container">
    <form action="{{route('loans.update', $loan)}}", method="POST"> @csrf @method('PUT')
            <div class="mb-3">
                <label for="name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$loan->name}}">
            </div>
            <div class="mb-3">
                <label for="name" class="col-form-label">Principal</label>
                <input type="number" class="form-control" id="principal" name="principal" value="{{$loan->principal}}">
            </div>
            <div class="mb-3">
                <label for="name" class="col-form-label">Interest</label>
                <input type="number" class="form-control" id="interest" name="interest" value="{{$loan->interest}}">
            </div>
            <div class="mb-3">
                <label for="name" class="col-form-label">Payment</label>
                <input type="number" class="form-control" id="payment" name="payment" value="{{$loan->payment}}">
            </div>
            <div class="mb-3">
                <label for="tenure" class="col-form-label">Tenure</label>
                <input type="number" class="form-control" id="tenure" name="tenure" value="{{$loan->tenure}}">
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</section>

<x-footer></x-footer>