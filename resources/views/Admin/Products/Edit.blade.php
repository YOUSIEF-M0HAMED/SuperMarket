@extends('layouts.admin_layout')

@section('title')
Edit Product
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

  <form action="{{ route('products.update',$old_prod->id) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
    @csrf
    @method('PUT')



                <div class="form-group">
                    <label for="Pname" class="control-label mb-1">P_Name</label>
                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_prod->name }}">
                </div>

                <div class="form-group">
                    <label for="price" class="control-label mb-1">Price</label>
                    <input id="price" name="price" type="numder" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_prod->price }}">
                </div>

                <div class="form-group">
                    <label for="discount" class="control-label mb-1">Discount</label>
                    <input id="discount" name="discount" type="number" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_prod->discount }}">
                </div>

                <div class="form-group">
                    <label for="quantity" class="control-label mb-1">Quantity</label>
                    <input id="quantity" name="quantity" type="number" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_prod->quantity }}">
                </div>

                <div class="form-group">
                    <label for="brand_id" class="control-label mb-1">Prand_ID</label>
                   <select name='brand_id' id='brand_id'>
                   @foreach($brands as $brand){
                   <option value='{{ $brand->id }}'>{{ $brand->brand_name }} </option>
                   }
                   @endforeach
                   </select>
                </div>

                 <div class="form-group">
                    <label for="category_id" class="control-label mb-1">Category_ID</label>
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

                        <span id="payment-button-amount">Update</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            @endsection
