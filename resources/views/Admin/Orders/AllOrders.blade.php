@extends('layouts.admin_layout')

@section('title')
All Orders
@endsection
@section('content')

                 <div class="main-content">

                    <div class="section__content section__content--p30">
                      <div class="container-fluid">
                         <div class="row">
                            <div class="col-lg-12">
                                @if(Session::has('msg'))
                                <div class="alert alert-success">{{ Session::get('msg')}}</div>
                                @endif
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Order_ID</th>
                                                <th>Customer_ID</th>
                                                <th>Date && Time</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                    @foreach ($orders as $order)

                                            <tr>
                                                <td>{{ $order->order_id  }}</td>
                                                <td>{{ $order->customer_id  }}</td>
                                                <td>{{ $order->created_at  }}</td>

                                                <td> <button type="button" class="btn btn-primary" onclick="window.open('{{ route('orders.show',$order->order_id) }}')">Info</button> </td>
                                                <td> <button type="button" class="btn btn-success" onclick="window.open('{{ route('orders.edit',$order->order_id) }}')">EDit</button> </td>
                                                 <td>
                                             <form action="{{ route('orders.destroy',$order->order_id) }}"  method='POST'>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >Delete</button>
                                            </form>
                                            </td>
                                            </tr>
                                                 @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary"  href="{{ route('orders.archive') }}">Archive</a>
                    </div>
                             </div>


             @endsection
