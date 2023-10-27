@extends('layouts.admin_layout')

@section('title')
Add Order
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

  <form action="{{ route('orders.store') }}" method="POST" novalidate="novalidate">
    @csrf

                <div class="form-group">
                    <label for="customer_id" class="mb-1 control-label">Customer_ID</label>
                   <select name='customer_id' id='customer_id'>
                    @foreach($customers as $customer){
                        <option value='{{ $customer->id }}'>{{ $customer->fname.$customer->lname }} </option>
                        }
                        @endforeach
                   </select>
                </div>



                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        <span id="payment-button-amount">Add New Order </span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            @endsection
