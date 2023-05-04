<?php


?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/admin">TOKYO<i class="bi bi-peace-fill"></i>TECHNO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/admin">Home</a>
                </li>
                @if ( Session::has('adminUser') )
                    
                                        
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- //TODO::edit profile -->
                            <li>
                                <a class="dropdown-item " href="/admin/get_product">
                                    Edit Product           
                                </a>
                            </li>
                            <!-- TODO:ADD ACTIVE ORDERS -->
                            <li><a class="dropdown-item" href="/admin/add_products_form">Add Products</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item " href="#">Log Out</a></li>
                        </ul>
                    </li>
                    
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>    
                            {{ Session::get('adminUser')->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- //TODO::edit profile -->
                            <li>
                                <a class="dropdown-item " href="#">
                                    <i class="bi bi-person-lines-fill"></i>
                                    Account           
                                </a>
                            </li>
                            <!-- TODO:ADD ACTIVE ORDERS -->
                            <li><a class="dropdown-item" href="#">My Orders</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item " href="#">Log Out</a></li>
                        </ul>
                    </li>
                    
                @else
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="login">Login</a>
                    </li>                    
                @endif
                
            </ul>
            <form action='/search' class="d-flex">
                <input class="form-control me-2 search-box" type="search" placeholder="Search for users" name="query" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
