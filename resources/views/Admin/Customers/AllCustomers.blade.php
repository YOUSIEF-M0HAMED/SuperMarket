@extends('layouts.admin_layout')

@section('title')
All Customers
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
                                    <h1 style="margin-bottom:5px">All Customers </h1>
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Customer_id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Age</th>
                                                <th>Address</th>

                                                <th></th>
                                                <th></th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                    @forelse ($customers as $customer)

                                            <tr>
                                                <td>{{ $customer->id  }}</td>
                                                <td>{{ $customer->fname ." ".  $customer->lname }}</td>
                                                <td>{{ $customer->email  }}</td>
                                                <td> {{ $customer->gender  }}</td>
                                                <td> {{ $customer->phone  }}</td>
                                                <td> {{ $customer->age  }}</td>
                                                <td> {{ $customer->address  }}</td>

                                                <td> <a class="btn btn-primary" href="{{ route('customers.edit', $customer->id)  }}">Edit</a>

                                                </td>

                                                <td>
                                                <form action="{{ route('customers.destroy',$customer->id) }}"  method='POST'>
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="delete" >
                                                </form>
                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6"><h3>No Customers Available</h3></td>
                                            </tr>
                                                 @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary"  href="{{ route('customers.archive') }}">Archive</a>
                             </div>



             @endsection
