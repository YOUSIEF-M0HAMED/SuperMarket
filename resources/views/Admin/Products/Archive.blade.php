@extends('layouts.admin_layout')

@section('title')
All Archived Products
@endsection
@section('content')

                 <div class="main-content">

                    <div class="section__content section__content--p30">
                      <div class="container-fluid">
                         <div class="row">

                            <div class="col-lg-12">

                             <div class="col-lg-13">
                             @if(Session::has('msg'))
                            <div class="alert alert-success">{{ Session::get('msg')}}</div>
                            @endif
                                <div>
                                    <h1 style="margin-bottom:5px">All Archived Products </h1>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>prod_id</th>
                                                <th>name</th>
                                                <th>price</th>
                                                <th>discount</th>
                                                <th>quantity</th>
                                                <th>Prand_Name</th>
                                                <th>Category_Name</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                    @forelse ($trashdata as $product)

                                            <tr>
                                                <td>{{ $product->id  }}</td>
                                                <td>{{ $product->name  }}</td>
                                                <td>{{ $product->price  }}</td>
                                                <td> {{ $product->discount  }}</td>
                                                <td> {{ $product->quantity  }}</td>
                                                <td> {{ $product->brand->brand_name  }}</td>
                                                <td> {{ $product->category->category_name  }}</td>

                                                <td>
                                                    <form action="{{ route('products.restore',$product->id) }}"  method='POST'>
                                                @csrf

                                                <input type="submit" class="btn btn-success" value="restore" >
                                                </form>
                                                </td>

                                                <td>
                                                <form action="{{ route('products.deleteArchive',$product->id) }}"  method='POST'>
                                                @csrf

                                                <input type="submit" class="btn btn-danger" value="delete" >
                                                </form>
                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6"><h3>No Archived Products Available</h3></td>
                                            </tr>
                                                 @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                             </div>


             @endsection
