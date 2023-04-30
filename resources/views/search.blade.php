@extends('master')
@section('content')


<div class="container">
    <h2>Search Results</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-1 g-4">
        @foreach ($products as $item)
        <a href="detail/{{$item['id']}}">
            <div class="col">
                <div class="card h-100">
                    <img src="{{$item['gallery']}}" class="card-img-top img-fluid" alt="Image of {{$item['name']}}">
                    <div class="card-body">
                        <!-- // todo: fix the design here -->
                        <h4 class="card-title">{{$item['name']}}</h4>
                        <a class="card-subtitle">&#8377{{$item['name']}}</a>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>


@endsection