@extends('master')
@section('content')


<?php
?>



<div class="container">
    
    @if (isset($products[0]))

        <div class="d-flex align-items-center">
            <h1 class="display-2"><i class="bi bi-cart"></i> Your Cart</h1>
        </div>
        
            <h2>Cart Items</h2>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($products as $item)
            <div class="col">
                <div class="card h-100">
                    <img src="{{$item['product']['gallery']}}" class="card-img-top img-fluid" alt="Image of {{$item['name']}}" style=" height: 150px;"  >
                    <div class="card-body">
                        <div class="d-flex">
                            <h5 class="card-title">{{$item['product']['name']}}</h5>
                            <p class="card-text ms-auto">&#8377 {{$item['product']['price']}}</p>
                        </div>
                        <div class="d-flex">
                            <!-- TODO::add + - to the card -->
                            <a href="#" class="btn btn-standard   ">-</a>
                            <a href="#" class="btn btn-standard   ">({{$item['count']}})</a>
                            <a href="#" class="btn btn-standard   ">+</a>

                            <a href="remove_from_cart/{{$item['product_id']}}" class="btn btn-danger   ms-auto">Remove</a>  
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <br>
        <br>
        <br>
        <a href="order_now" class="button">Buy Now</a>  
    @endif


    <div class="container ">
        
        @if (!isset($item))
            <div class="d-flex align-items-center">
                <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
            </svg>
            <h1 class="display-2"><i class="bi bi-cart"></i> Your cart is Empty. lets go shopping first!</h1>
        </div>      
        <a class=".btn-light" style="text-decoration: none;" href="/"><h3>Let's Shop !</h3></a>            
        @else

        @endif

    </div>

</div>
<br>
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <br><br>
        <br>
        <br>
        <br>

@endsection