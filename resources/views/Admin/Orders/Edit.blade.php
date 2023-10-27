@extends('layouts.admin_layout')

@section('title')
Edit Order
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

  <form action="{{ route('orders.update',$old_order->order_id) }}" method="post" novalidate="novalidate">
    @csrf
    @method('PUT')

                    <div class="form-group">
                        <label for="customer_id" class="mb-1 control-label">Customer_ID</label>
                    <select name='customer_id' id='customer_id'>
                        @foreach($customers as $customer){
                            <option value='{{ $customer->id }}'>{{ $customer->fname.$customer->lname }} </option>
                            }
                            @endforeach
                    </select>
                    </div>

                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        <span id="payment-button-amount">Update</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            @endsection
