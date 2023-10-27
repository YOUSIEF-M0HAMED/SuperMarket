@extends('layouts.admin_layout')

@section('title')
Add Product
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

  <form action="{{ route('products.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
    @csrf



                <div class="form-group">
                    <label for="name" class="mb-1 control-label">P_Name</label>
                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter P_Name">
                </div>

                <div class="form-group">
                    <label for="price" class="mb-1 control-label">Price</label>
                    <input id="price" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Price">
                </div>

                <div class="form-group">
                    <label for="discount" class="mb-1 control-label">Discount</label>
                    <input id="discount" name="discount" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter discount">
                </div>

                <div class="form-group">
                    <label for="quantity" class="mb-1 control-label">Quantity</label>
                    <input id="quantity" name="quantity" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter quantity">
                </div>

                <div class="form-group">
                    <label for="brand_id" class="mb-1 control-label">Prand_ID</label>
                   <select name='brand_id' id='brand_id'>
                   @foreach($brands as $brand){
                   <option value='{{ $brand->id }}'>{{ $brand->brand_name }} </option>
                   }
                   @endforeach
                   </select>
                </div>

                 <div class="form-group">
                    <label for="category_id" class="mb-1 control-label">Category_ID</label>
                   <select name='category_id' id='category_id'>
                    @foreach($categories as $category){
                        <option value='{{ $category->id }}'>{{ $category->category_name }} </option>
                        }
                        @endforeach
                   </select>
                </div>

                <div class="form-group">
                    <label for="img" class="mb-1 control-label">P_Image</label>
                    <input id="img" name="img" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="Please Chose img">
                </div>

                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        <span id="payment-button-amount">Add New Product</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            @endsection
