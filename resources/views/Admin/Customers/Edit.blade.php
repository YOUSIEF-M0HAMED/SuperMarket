@extends('layouts.admin_layout')

@section('title')
Edit
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
  <form action="{{ route('customers.update',$old_cust->id) }}" method="post" novalidate="novalidate">
    @csrf 
    @method('put')



                <div class="form-group">
                    <label for="Pname" class="control-label mb-1">First Name</label>
                    <input id="fname" name="fname" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_cust->fname }}">
                </div>

                <div class="form-group">
                    <label for="price" class="control-label mb-1">Last Name</label>
                    <input id="price" name="lname" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_cust->lname }}">
                </div>
                <div class="form-group">
                    <label for="gender" class="control-label mb-1">Gender</label>
                    <input type="radio"  name="gender" value="m" 
                    @if($old_cust->gender=='m') 
                    checked
                    @endif
                    > Male
                    <input type="radio"  name="gender" value="f" 
                    @if($old_cust->gender=='f') 
                    checked
                    @endif
                    > Female
                </div>

                <div class="form-group">
                    <label for="discount" class="control-label mb-1">Email</label>
                    <input id="discount" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_cust->email }}">
                </div>
                <div class="form-group">
                    <label for="discount" class="control-label mb-1">Password</label>
                    <input id="discount" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" value="">
                </div>

                <div class="form-group">
                    <label for="quantity" class="control-label mb-1">Phone</label>
                    <input id="quantity" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_cust->phone }}">
                </div>
                <div class="form-group">
                    <label for="age" class="control-label mb-1">Age</label>
                    <input id="quantity" name="age" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_cust->age }}">
                </div>

                <div class="form-group">
                    <label for="brand_id" class="control-label mb-1">address</label>
                    <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ $old_cust->address }}">
                </div>

                 

                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        <span id="payment-button-amount">Update</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            
            @endsection
