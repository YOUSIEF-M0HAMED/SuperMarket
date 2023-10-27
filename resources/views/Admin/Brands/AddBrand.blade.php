@extends('layouts.admin_layout')

@section('title')
Add Brand
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
  <form action="{{ route('brands.store') }}" method="POST" novalidate="novalidate">
    @csrf



                <div class="form-group">
                    <label for="name" class="mb-1 control-label">B_Name</label>
                    <input id="brand_name" name="brand_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Enter Brand_Name">
                </div>


                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        <span id="payment-button-amount">Add New Brand </span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            @endsection
