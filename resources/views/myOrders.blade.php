@extends('master')
@section('content')


<?php
// print($orders);
?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Order #</th>
      <th>Date</th>
      <th>Status</th>
      <th>Total</th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <td><i class="bi bi-cart"></i> #{{ $order->id }}</td>
      <td><i class="bi bi-calendar"></i> {{ $order->created_at->format('d-m-Y') }}</td>
      <td>
        @if ($order->order_status == 'completed')
          <span class="badge bg-success"><i class="bi bi-check"></i> Completed</span>
        @elseif ($order->order_status == 'in_progress')
          <span class="badge bg-warning"><i class="bi bi-clock"></i> Pending</span>
        @elseif ($order->order_status == 'failed')
          <span class="badge bg-danger"><i class="bi bi-x"></i> Failed</span>
        @endif
      </td>
        <!-- TODO: : paginate -->
      <td>${{ number_format($order->total_amount) }}</td>
      <td><a href='get_order_by_id/{{$order->id }}'>  <i class="bi bi-eye-fill" > </i></a></td>

    </tr>
    @endforeach
  </tbody>
</table>





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