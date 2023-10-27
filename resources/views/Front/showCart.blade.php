<!DOCTYPE html>
<html>
<head>


<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{  asset('Admin/css/font-face.css')}}" rel="stylesheet" media="all ">
    <link href="{{  asset('Admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{  asset('Admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{  asset('Admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{  asset('Admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{  asset('Admin/css/theme.css')}}" rel="stylesheet" media="all">


<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Your Cart</h2>

@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success')}}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table table-borderless table-striped table-earning">
    <thead>
        <tr>
            <th>Name</th>
            <th>phone</th>
            <th>address</th>
            <th>Product_name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Created At</th>
            <th></th>

        </tr>
    </thead>
    <tbody>

@foreach ($carts as $cart)

        <tr>
            <td>{{ $cart->name  }}</td>
            <td>{{ $cart->phone  }}</td>
            <td>{{ $cart->address  }}</td>
            <td>{{ $cart->product_name  }}</td>
            <td>{{ $cart->quantity  }}</td>
            <td>{{ $cart->price  }}</td>
            <td>{{ $cart->created_at  }}</td>

             <td>
         <form action="{{ route('cart.delete',$cart->id) }}"  method='POST'>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" >Delete</button>
        </form>
        </td>
        </tr>
             @endforeach

    </tbody>
  </table>
<center style="margin-top: 70px; ">
    @if($carts->count() > 0)
            <form action="{{ route('cart.confirm') }}"  method='POST' >
                @csrf
                <button type="submit" class="btn btn-success"  style="width:30%;">Confirm All</button>
            </form>
        @else
                <h3>There Are No Items IN Your Cart</h3>

@endif
        </center>
</body>
</html>

