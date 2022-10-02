@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    @section('content')
     <h3>Product Added</h3>
     <h1>New Product List</h1>
     @foreach($productList as $product)
     Product Name: {{$product->name}} <br>
     Product Size: {{$product->size}} <br><br>
     @endforeach
    @endsection
</body>
</html>