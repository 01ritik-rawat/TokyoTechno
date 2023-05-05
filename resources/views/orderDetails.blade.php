@extends('master')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h5 class="card-title ">Invoice # {{$orderDetails->id}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Order Number:</strong> #{{ $orderDetails->id }}</p>
                            <p><strong>Order Date:</strong> {{$orderDetails->created_at->format('d-m-Y') }}</p>
                            <p><strong>Payment Method:</strong> {{$orderDetails->paymentMethod }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p><strong>Shipping Address:</strong> {{$orderDetails->address }}</p>
                            <p class="text-nowrap"><strong>Phone:</strong> {{$orderDetails->phone }}</p>
                            <p><strong>Email:</strong> {{$orderDetails->email }}</p>
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
                                @foreach ($data as $product )
                                    <tr>
                                        <td>{{$product->products->name }}</td>
                                        <td>&#8377 {{ number_format($product->products->price )}}/ per item</td>
                                        <td>{{$product->quantity }}</td>
                                        <td>&#8377 {{number_format($product->products->price * $product->quantity )}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Subtotal</td>
                                    <td>&#8377 {{number_format($orderDetails->sub_total) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Tax ({{$orderDetails->tax_rate}}%)</td>
                                    <td>&#8377 {{number_format($orderDetails->total_tax )}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">Shipping</td>
                                    <td>&#8377 {{number_format($orderDetails->delivery_charges )}}</td>
                                </tr>
                                <tr class="table-active">
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong>&#8377 {{number_format($orderDetails->total_amount) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="alert alert-success" role="alert">
                <p class="mt-3">U can use this invoice to claim your warranty or replacements </p>
                <a class="btn btn-success" href="{{ route('generate_invoice_pdf', ['data' => json_encode(['data'=>$data, 'orderDetails'=>$orderDetails])]) }}"> <i class="bi bi-download"></i> Download Invoice</a>


            </div>




            <!-- TODO: SUB DATE FUNCTION HERE -->
        </div>

    </div>



</div>


<script>
@endsection