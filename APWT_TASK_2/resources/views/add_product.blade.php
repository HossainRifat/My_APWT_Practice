@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <div>
    @section('content')
    <h2>Add Product</h2>
    <form action="/showProduct" method="post" style="max-width: 500px">
        {{csrf_field()}}
        Name: <input type="text" name="ProductName" class="form-control">
        Size: <input type="text" name="ProductSize" class="form-control">
        <input type="submit" class="btn btn-success">
    </form>
    @endsection
    </div>
    
</body>
</html>