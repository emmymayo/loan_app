<x-header></x-header>


<section class="container-fluid">
    <div class="my-3">
        <h4 class="text-center display-6 capitalize">Payment Schedule for {{$customer->name}} Starting at {{\Carbon\Carbon::create($start_date)->toFormattedDateString()}}. </h4>

        <ul class="list-group">
            <li class="list-group-item capitalize">Loan Amount: &#8358;{{$loan->principal}}</li>
            <li class="list-group-item capitalize">Loan Interest: {{$loan->interest}}%</li>
            <li class="list-group-item capitalize">Tenure: {{$loan->tenure}}</li>
            <li class="list-group-item capitalize">Monthly Payment: &#8358;{{$loan->payment}}</li>
          
            
        </ul>
       
    </div>
    <table class="table table-hover table-striped my-4">
        <tr>
            <td>#</td>
            <td>Payment Date</td>
            <td>Payment</td>
            <td>Payment Left</td>
        </tr>

        @for ($month = 1; $month <= $loan->tenure; $month++)
            <tr>
                <td>{{$month}}</td>
                <td>{{\Carbon\Carbon::create($start_date)->addMonth($month)->toFormattedDateString()}}</td>
                <td>&#8358;{{$loan->payment}}</td>
                <td>&#8358;{{ ($loan->principal + ($loan->interest * 0.01 * $loan->principal)) - $month * $loan->payment}}</td>
            </tr>
        @endfor
    </table>
</section>

<span onclick="print()" class="btn btn-outline-success" style="position: fixed; bottom: 10px; right: 10px">
Print
</span>

<x-footer></x-footer>