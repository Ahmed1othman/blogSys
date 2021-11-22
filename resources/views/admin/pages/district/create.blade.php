@extends('admin.layouts.master')
@section('title')
    Admin Category - Add
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Add Category </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Districts</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.district.index')}}">District</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add District</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add District</h4>
            <form class="forms-sample" action="{{route('admin.district.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">District English</label>
                    <input type="text" class="form-control" name="district_en"  placeholder="Enter arabic district name ..">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername2">District Arabic</label>
                    <input type="text" class="form-control" name="district_ar" placeholder="Enter arabic district name .. ">
                </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-dark" href="{{route('admin.district.index')}}">Cancel</a>
            </form>
        </div>
    </div>


@endsection
