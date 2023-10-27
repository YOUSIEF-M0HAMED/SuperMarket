@extends('layouts.admin_layout')

@section('title')
All Archived Categories
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
                                    <h1 style="margin-bottom:5px">All Archived Categories </h1>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Category_id</th>
                                                <th>Category_name</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                    @forelse ($trashdata as $category)

                                            <tr>
                                                <td>{{ $category->id  }}</td>
                                                <td>{{ $category->category_name }}</td>

                                                <td>
                                                    <form action="{{ route('categories.restore',$category->id) }}"  method='POST'>
                                                @csrf

                                                <input type="submit" class="btn btn-success" value="restore" >
                                                </form>
                                                </td>

                                                <td>
                                                <form action="{{ route('categories.deleteArchive',$category->id) }}"  method='POST'>
                                                @csrf

                                                <input type="submit" class="btn btn-danger" value="delete" >
                                                </form>
                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6"><h3>No Archived categories Available</h3></td>
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
