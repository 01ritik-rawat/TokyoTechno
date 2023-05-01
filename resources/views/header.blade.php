<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

//fetching data for cart
$cartCount = 0;

if( Session::has('user') ){
    $cartCount = ProductController::cartItem();
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">E-Comm</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @if ( Session::has('user') )
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="/cart_list">Cart({{$cartCount}})</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Session::get('user')->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- //todo::edit profile -->
                        <li><a class="dropdown-item" href="#">Account</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                    </ul>
                </li>
                    
                @else
                    
                @endif
                
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria>Disabled</a>
                </li>
            </ul>
            <form action='/search' class="d-flex">
                <input class="form-control me-2 search-box" type="search" placeholder="Search" name="query" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
