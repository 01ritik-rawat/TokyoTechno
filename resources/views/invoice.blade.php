@extends('master')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Thank you for your purchase!</h4>
                <p>Your payment has been successfully processed.</p>
            </div>

            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h5 class="card-title ">Invoice</h5>
                </div>
                <div class="card-body">
                <div class="row">
                        <div class="col-md-6">
                            <p><strong>Order Number:</strong> #{{ $order->id }}</p>
                            <p><strong>Order Date:</strong> {{$order->created_at->format('d-m-Y') }}</p>
                            <p><strong>Payment Method:</strong> {{$order->payment_method }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p><strong>Shipping Address:</strong> {{$order->address }}</p>
                            <p class="text-nowrap"><strong>Phone:</strong> {{$order->phone }}</p>
                            <p><strong>Email:</strong> {{$order->email }}</p>
                        </div>
                    </div>

                    <hr>
                    <h6 class="card-subtitle mb-2 text-muted">Order Summary</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderData as $product )
                                    <tr>
                                        <td>{{$product->product->name }}</td>
                                        <td>&#8377 {{ number_format($product->product->price )}}/ per item</td>
                                        <td>{{$product->count }}</td>
                                        <td>&#8377 {{number_format($product->product->price * $product->count )}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Subtotal</td>
                                    <td>&#8377 {{number_format($subTotal) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tax ({{$taxRate}}%)</td>
                                    <td>&#8377 {{number_format($totalTax )}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Shipping</td>
                                    <td>&#8377 {{number_format($deliveryCharges )}}</td>
                                </tr>
                                <tr class="table-active">
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong>&#8377 {{number_format($grandTotal) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <p class="mt-3">You will receive your order within 6 working days.</p>
        </div>
    </div>
</div>
<?php

use App\Http\Controllers\ProductController;

$deleteCart =new ProductController;
$deleteCart->emptyCart();
?>




@endsection