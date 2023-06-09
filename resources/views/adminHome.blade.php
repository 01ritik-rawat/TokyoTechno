@extends('adminMaster')
@section('content')



    <!-- @if (isSet($message))
    <div class="alert alert-danger" role="alert">
        <h1>
            Login Page
        </h1>
    </div>
    @endif -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @if (isset($message))
<div class="alert-fill">
  <div class="alert alert-success" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <h1>{{$message}}</h1>
  </div>
</div>
@endif

<style>
.alert-fill {
    position: fixed;
    top: 0;
    right: 0;
    width: 320px;
    height: 0;
    padding: 0;
    overflow: hidden;
    transition: height 0.5s ease-out;
    z-index: 9999;
}

.alert-fill.full {
    height: auto;
}

.alert-fill .alert {
    position: relative;
    height: 100%;
    padding: 1rem 1.5rem;
    border-radius: 0;
    box-shadow: none;
    background-color: rgba(40, 167, 69, 0.8);
    border: none;
}

.alert-fill .alert h1 {
    font-size: 18px;
    color: #fff;
    opacity: 0;
    margin: 0;
    transition: opacity 0.5s ease-out;
}

.alert-fill.full .alert h1 {
    opacity: 1;
}

.alert-fill .alert .btn-close {
    position: absolute;
    top: 0.5rem;
    right: 1rem;
    color: #fff;
    opacity: 1;
    transition: opacity 0.5s ease-out;
}

.alert-fill.full .alert .btn-close {
    opacity: 0.8;
}

.alert-fill .alert .btn-close:hover {
    opacity: 1;
}

.alert-fill::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0;
    background-color: #28a745;
    transition: width 5s linear;
}

.alert-fill.full::before {
    width: 100%;
}
</style>

<script>
setTimeout(function() {
    var alertFill = document.querySelector('.alert-fill');
    if (alertFill) {
        alertFill.classList.add('full');
    }
}, 100);

setTimeout(function() {
    var alertFill = document.querySelector('.alert-fill');
    if (alertFill) {
        alertFill.style.display = 'none';
    }
}, 5500);
</script>

<div class="container custom-login">
    <!-- TODO: CONSUMER LIST -->
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


</div>


@endsection