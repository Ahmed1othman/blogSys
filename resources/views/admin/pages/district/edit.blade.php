@extends('admin.layouts.master')
@section('title')
    Admin District - Add
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit District </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.district.index')}}">District</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit District</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit District</h4>
            <form class="forms-sample" action="{{route('admin.district.update',$district->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">District English</label>
                    <input type="text" class="form-control" name="district_en"  placeholder="Enter arabic district name .." value="{{$district->district_en}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername2">District Arabic</label>
                    <input type="text" class="form-control" name="district_ar" placeholder="Enter arabic district name .. " value="{{$district->district_ar}}">
                </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-dark" href="{{route('admin.district.index')}}">Cancel</a>
            </form>
        </div>
    </div>

@endsection
