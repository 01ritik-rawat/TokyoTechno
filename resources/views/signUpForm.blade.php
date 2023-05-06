@extends('master')
@section('content')

<div class="container custom-login mt-5 ">



    <form action="/sign_up" method="GET">
        
        
        </h3>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 mx-auto">
                <h1 class="heading">SignUp</h1>
                <br>
                <div>
                    @if (isSet($message))
                    <div class="alert alert-danger" role="alert">
                        <div>
                            <i class="bi bi-patch-exclamation">
                                {{$message}}
                            </i>

                        </div>
                    </div>
                    @endif

                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>

</div>
<div class="text-center">
    <p>already have an account? <a href="/login">Let's Login</a></p>
</div>
</div>

</div>
<br>
<br>
<br>

@endsection