@extends('layouts.admin_layout')

@section('title')
Show Order
@endsection
@section('content')

  <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">

                                        <thead>
                                            <tr>
                                                <th>Product id</th>
                                                <th>quantity</th>
                                                <th>Date && Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($order_items as $one )
                                            <tr>
                                                <td>{{ $one->product_id  }}</td>
                                                <td>{{ $one->quantity  }}</td>
                                                <td>{{ $one->created_at  }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                             </div>
                              </div>
                               </div>
                                </div>

             @endsection
