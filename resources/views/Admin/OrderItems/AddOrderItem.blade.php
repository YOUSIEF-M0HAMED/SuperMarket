@extends('layouts.admin_layout')

@section('title')
Add Category
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(Session::has('msg'))
<div class="alert alert-success">{{ Session::get('msg')}}</div>
@endif

  <form action="{{ route('orderitems.store') }}" method="POST" novalidate="novalidate">
    @csrf

                <div class="form-group">
                    <label for="customer_id" class="mb-1 control-label">Order_ID</label>
                  <select name='order_id' id='customer_id'>
                    @foreach($orders as $order){
                        <option value='{{ $order->order_id }}'>{{ $order->order_id }} </option>
                        }
                        @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="product_id" class="mb-1 control-label">Product_ID</label>
                    <select name='product_id' id='product_id'>
                    @foreach($products as $product){
                        <option value='{{ $product->id }}'>{{ $product->name }} </option>
                        }
                        @endforeach
                </select>
                </div>

                <div class="form-group">
                    <label for="id" class="mb-1 control-label">Quantity</label>
                    <input id="quantity" name="quantity" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Quantity">
                </div>



                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        <span id="payment-button-amount">Add New OrderItem </span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            @endsection
