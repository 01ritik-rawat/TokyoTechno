@extends('master')

@section('content')
<?php
$country = env('CONSUMER_COUNTRY', 'india');
//  TODO: ADD CURRENCY IN LOOKUPS
?>
<div class="container-fluid ms-auto">

    <br>
    <div class="d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check me-3" viewBox="0 0 16 16">
            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
        </svg>
        <h1 class="display-5">Purchase Summery</h1>
    </div>

    <br>
    <br>
    <br>


    <div class="container ">
    <table class="table table-striped-columns table-sm">
        <thead>
            <tr class="table-dark">
                <th scope="col">S.No.</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['product']['name'] }}</td>
                <td>{{ $item['count'] }}</td>
                <td>{{ $item['count'] * $item['product']['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>



    <br>
    <br>
    <hr>
    <br>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <h5>Order Summary</h5>
            <hr>
            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal:</span>
                <span>{{$amount}}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Delivery Charges:</span>
                <span> {{$deliveryCharges->$country }}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Tax:</span>
                <span>tax</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span><strong>Total:</strong></span>
                <span><strong>grandTotal</strong></span>
            </div>
            <hr>
            <button class="btn btn-primary w-100">Place Order</button>
        </div>
    </div>

</div>
@endsection