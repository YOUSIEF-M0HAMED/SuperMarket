@extends('layouts.admin_layout')

@section('title')
All Order Items
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
                                                <th>Order_id</th>
                                                <th>product_id</th>
                                                <th>Quantity</th>
                                                <th>Date && Time</th>
                                                <th></th>
                                                <th></th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                    @foreach ($order_items as $order_item)

                                            <tr>
                                                <td>{{ $order_item->order_id  }}</td>
                                                <td>{{ $order_item->product_id  }}</td>
                                                <td>{{ $order_item->quantity  }}</td>
                                                <td>{{ $order_item->created_at  }}</td>

                                                <td> <button type="button" class="btn btn-success" onclick="window.open('{{ route('orderitems.edit',$order_item->order_id.",".$order_item->product_id) }}')">EDit</button> </td>
                                                 <td>
                                             <form action="{{ route('orderitems.destroy',$order_item->order_id.",".$order_item->product_id) }}"  method='POST'>
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
                    </div>
                             </div>


             @endsection
