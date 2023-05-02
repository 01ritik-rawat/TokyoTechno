@extends('master')

@section('content')
<?php
$country = env('CONSUMER_COUNTRY', 'india');
//  TODO: ADD CURRENCY IN LOOKUPS

if (isset($amount) && isset($tax)) {
    $grandTotal = ($amount * ($tax->$country / 100)) + $amount + $deliveryCharges->$country;
    // do something with $total
}
if (isset($grandTotal)) {
    $finalOrderData = ['products' => $products, 'country' => $country, 'grandTotal' => $grandTotal];
}
?>
<div class="container-fluid col-sm-7">

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

    <!-- //order table -->
    <div class="container col ">
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
                    <td>{{ number_format($item['count']) }}</td>
                    <td>{{ number_format($item['count'] * $item['product']['price']) }}</td>
                </tr>
                @endforeach
                <tr class="table-secondary">
                    <td colspan="3" class="text-end"><strong>Sub Total</strong></td>
                    <td><strong>{{number_format($amount)}}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>



    <br>
    <br>
    <hr>
    <br>
    <div class="row mt-4">

        <!-- delivery details -->
        <div class="col-md-6">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 offset-xxl-2">
                        <h5>Order Details</h5>
                        <form action="purchase/order-details" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea type="text" class="form-control" rows="3" id="address" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="notes">Instructions for Logistics:</label>
                                <input class="form-control" id="notes" name="notes" placeholder="Enter any special instructions or notes">
                                <!-- TODO:STORE THE SPECIAL INSTRUCTIONS IN DB TOO  -->
                            </div>
                            <input type="hidden" name="paymentMethod" value="RAZER_PAY">
                            <input type="hidden" name="orderData" value="{{json_encode($finalOrderData)}}" required>
                            <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>






        </div>

        <!-- order Summary -->
        <div class="col-md-6">
            <h4>Order Summary</h4>
            <hr>
            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal:</span>
                <span>&#8377 {{number_format($amount)}}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Delivery Charges:</span>
                <span>&#8377 {{number_format($deliveryCharges->$country )}}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Tax:</span>
                <span>{{number_format($tax->$country)}}%</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span><strong>Grand Total:</strong></span>
                <span><strong>&#8377 {{number_format($grandTotal)}}</strong></span>
            </div>
            <hr>
            <button type="submit" onclick="document.getElementById('submit-btn').click();" class="btn btn-primary w-100">Place Order</button>
        </div>
    </div>
    <hr>

</div>
@endsection