
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    @stack('css')
    @push('css')
    <link rel="stylesheet" href="/resources/css/app.css">
@endpush

    <title></title>
</head>
<body>
    
    <!-- <div>
        <a href="{{url('/home')}}">Home</a>
        <a href="{{url('/about')}}">About Us</a>
        <a href="{{url('/products')}}">Products</a>
        <a href="{{url('/add')}}">Add Product</a>
    </div> -->
    @include('inc.topnav')
    <div>
        @yield('content')
    </div>
    <div>
        <hr>
        All right preserved to this page.
    </div>
</body>
</html>