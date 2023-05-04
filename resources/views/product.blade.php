@extends('master')
@section('content')


<div class="container custom-product">
    <div class="row">
    

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <!-- slide indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>

            <!-- slides -->
            <div class="carousel-inner">
                @foreach ($banner as $item )
                <div class="carousel-item {{$item['id']==1 ? 'active' : '' }}">
                    <a href="detail/{{$item['id']}}">
                        <img src="{{$item['gallery']}}" class="d-block w-100 img-fluid carousel-image" alt="Images of Products">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$item['name']}}</h5>
                            <p>{{$item['description']}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <!-- navigation button -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</div>

<div class="container">
    <h1>Trending products</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($products as $item)
        <a href="detail/{{$item['id']}}">
            <div class="col">
                <div  class="card h-100">
                    <img src="{{$item['gallery']}}" class="card-img-top img-fluid" alt="Image of {{$item['name']}}">
                    <div class="card-body">
                        <h5  class="card-title">{{$item['name']}} -></h5>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>


@endsection