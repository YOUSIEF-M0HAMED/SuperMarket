@extends('layouts.admin_layout')

@section('title')
All Archived Brands
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
                                    <h1 style="margin-bottom:5px">All Archived Brands </h1>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Brands_id</th>
                                                <th>Brands_name</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                    @forelse ($trashdata as $brand)

                                            <tr>
                                                <td>{{ $brand->id  }}</td>
                                                <td>{{ $brand->brand_name }}</td>

                                                <td>
                                                    <form action="{{ route('brands.restore',$brand->id) }}"  method='POST'>
                                                @csrf

                                                <input type="submit" class="btn btn-success" value="restore" >
                                                </form>
                                                </td>

                                                <td>
                                                <form action="{{ route('brands.deleteArchive',$brand->id) }}"  method='POST'>
                                                @csrf

                                                <input type="submit" class="btn btn-danger" value="delete" >
                                                </form>
                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6"><h3>No Archived Brands Available</h3></td>
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
