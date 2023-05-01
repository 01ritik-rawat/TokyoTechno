@extends('master')
@section('content')






<div class="container">
    <h2>Search Results</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">
        @foreach ($products as $item)
        <a href="detail/{{$item['product_id']}}">
            <div class="col">
                <div class="card h-100">
                    <img src="{{$item['product']['gallery']}}" class="card-img-top img-fluid" alt="Image of {{$item['name']}}">
                    <div class="card-body">
                        <!-- // todo: fix the design here -->
                        <h4 class="card-title">{{$item['product']['name']}}</h4>
                        <a class="card-subtitle">&#8377 {{$item['product']['price']}}</a>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>


@endsection