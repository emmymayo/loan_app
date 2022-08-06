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

    <div class="container d-flex justify-content-center min-vh-100 align-items-center">
        <form action="{{route('user.profile.update')}}" method="post" class="my-4 row"> @csrf
            <h3 class="display-4">Update Profile</h3>
            <div class="form-group my-4 ">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group my-4 ">
                <label for="">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group my-4">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group my-4">
                <label for="">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password" class="form-control">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

<x-footer></x-footer>