@extends('master')
@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>OTP Input Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }

        .title {
            color: #222222;
        }
    </style>
</head>

<body>
    <h1>userId== > {{$userId}}</h1>
    <div class="container mt-5">
        <!-- <h1 class="title">Enter OTP</h1> -->
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
        <form action="/signup_otp_verify" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="OTP" aria-label="OTP" aria-describedby="otp-addon" name="otp" >
                        <input type="hidden" name="userId" value="{{$userId}}">

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>


@endsection