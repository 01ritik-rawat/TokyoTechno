
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <!-- JQuery minified -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!-- bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



</head>
<body>

    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}

    
</body>
<script>
    // $(document).ready(function(){
    //     $("button").click(function(){
    //         alert("all set!");
    //     })
    // })
</script>

<style>
    .slider-nav{
        color: black;
    }
    .carousel-image {
     height: 500px; /* to fix the uneven height of banner */
    }
    .trending-wrapper{
        margin: 20px;

    }
    .trending-img{
        height: 100px;

    }
    .trending-item{
        float:left;
        width: 20%;

    }
    .search-box{
        width: 500px !important;
    }
    .card-title, .card-subtitle {
    text-decoration: none;
}


    

</style>

</html>