@extends('master')
@section('content')

<!-- 
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="" src="{{$product['gallery']}}">

        </div>
    </div> -->


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{$urls->image_1}}}" alt="Product Image" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h1>{{$product['name']}}</h1>
            <p class="price">&#8377  {{$product['price']}}</p>
            <button class="btn btn-primary buy-now">Buy Now</button>

            <form action="/add_to_cart" method="POST">
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                @csrf
                <button class="btn btn-success add-to-cart">Add to Cart</button>
            </form>
        </div>
    </div>
</div>


</div>


@endsection