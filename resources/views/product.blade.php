@extends('master')
@section('content')


<div class="container custom-product">
    <div class="row">


        <div id="carouselExampleCaptions" class="carousel slide">
            <!-- slide indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <!-- slides -->
            <div class="carousel-inner">
                @foreach ($products as $item )
                
                    <div class="carousel-item {{$item['id']==1 ? 'active' : '' }}">
                        <img src="{{$item['gallery']}}" class="d-block w-100" alt="Images of Products">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$item['name']}}</h5>
                            <p>{{$item['description']}}</p>
                        </div>
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

@endsection