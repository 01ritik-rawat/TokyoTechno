@extends('master')
@section('content')



<div class="container custom-login mt-5 ">
    <h1 class="heading">
        Login Page
    </h1>


    @if (isSet($message))
    <div class="alert alert-danger" role="alert">
        <a>{{ $message }}</a>
    </div>
    @endif


    </h3>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 mx-auto">
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>

                <!-- remember me check box -->
                <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Log <Inp></Inp></button>
            </form>

        </div>
        <div class="text-center">
            <p>Don't have an account? <a href="/signup_form">Let's sign up</a></p>
        </div>


    </div>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


@endsection