<x-header></x-header>


    <div class="container d-flex justify-content-center min-vh-100 align-items-center">
        <form action="{{route('auth.login')}}" method="post" class="my-4 row"> @csrf
            <h3 class="display-4">Login to proceed</h3>
            <div class="form-group my-4 ">
                <label for="">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group my-4">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </div>


<x-footer></x-footer>