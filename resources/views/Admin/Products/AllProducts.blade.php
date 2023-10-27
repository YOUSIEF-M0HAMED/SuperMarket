@extends('layouts.admin_layout')

@section('title')
All Products
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
                                    <table class="table table-borderless table-striped table-earning"   >
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

                                    @foreach ($products as $product)

                                            <tr>
                                                <td>{{ $product->id  }}</td>
                                                <td>{{ $product->name  }}</td>
                                                <td>{{ $product->price  }}</td>
                                                <td> {{ $product->discount  }}</td>
                                                <td> {{ $product->quantity  }}</td>
                                                <td> {{ $product->brand->brand_name  }}</td>
                                                <td> {{ $product->category->category_name  }}</td>

                                                <td> <button type="button" class="btn btn-success" onclick="window.open('{{ route('products.edit',$product->id) }}')">EDit</button> </td>
                                                <td>
                                             <form action="{{ route('products.destroy',$product->id) }}"  method='POST'>
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
                        <a class="btn btn-primary"  href="{{ route('products.archive') }}">Archive</a>
                    </div>
                             </div>


             @endsection
