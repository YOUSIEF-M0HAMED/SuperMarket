@extends('layouts.admin_layout')

@section('title')
Edit Category
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{ route('categories.update',$old_category->id) }}" method="post" novalidate="novalidate">
    @csrf
    @method('PUT')

                    <div class="form-group">
                        <label for="name" class="mb-1 control-label">C_Name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="{{ $old_category->category_name }}">
                    </div>

                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                        <span id="payment-button-amount">Update</span>
                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
            @endsection
