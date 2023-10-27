@extends('layouts.admin_layout')

@section('title')
All Categories
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
                                                <th>Category_id</th>
                                                <th>Category_name</th>
                                                <th></th>
                                                <th></th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                    @foreach ($categories as $category)

                                            <tr>
                                                <td>{{ $category->id  }}</td>
                                                <td>{{ $category->category_name  }}</td>

                                                <td> <button type="button" class="btn btn-success" onclick="window.open('{{ route('categories.edit',$category->id) }}')">EDit</button> </td>
                                                 <td>
                                             <form action="{{ route('categories.destroy',$category->id) }}"  method='POST'>
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
                        <a class="btn btn-primary"  href="{{ route('categories.archive') }}">Archive</a>
                    </div>
                             </div>


             @endsection
