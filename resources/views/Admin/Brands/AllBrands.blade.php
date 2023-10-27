@extends('layouts.admin_layout')

@section('title')
All Brands
@endsection
@section('content')

                 <div class="main-content">

                    <div class="section__content section__content--p30">
                      <div class="container-fluid">
                         <div class="row">
                            <div class="col-lg-9">
                                @if(Session::has('msg'))
                                <div class="alert alert-success">{{ Session::get('msg')}}</div>
                                @endif
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Brand_ID</th>
                                                <th>Brand_Name</th>
                                                <th></th>
                                                <th></th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                    @foreach ($brands as $brand)

                                            <tr>
                                                <td>{{ $brand->id  }}</td>
                                                <td>{{ $brand->brand_name  }}</td>

                                                <td> <button type="button" class="btn btn-success" onclick="window.open('{{ route('brands.edit',$brand->id) }}')">EDit</button> </td>
                                                 <td>
                                             <form action="{{ route('brands.destroy',$brand->id) }}"  method='POST'>
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
                    <a class="btn btn-primary"  href="{{ route('brands.archive') }}">Archive</a>
                             </div>

             @endsection
