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
                <li class="breadcrumb-item"><a href="{{route('admin.subdistrict.index')}}">SubDistrict</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit SubDistrict</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit SubDistrict</h4>
            <form class="forms-sample" action="{{route('admin.subdistrict.update',$subdistrict->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">SubDistrict English</label>
                    <input type="text" class="form-control" name="subdistrict_en"  placeholder="Enter arabic subdistrict name .." value="{{$subdistrict->subdistrict_en}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername2">SubDistrict Arabic</label>
                    <input type="text" class="form-control" name="subdistrict_ar" placeholder="Enter arabic subdistrict name .. " value="{{$subdistrict->subdistrict_ar}}">
                </div>

                <div class="form-group">
                    <select class="js-example-basic-single form-control" name="district_id">
                        <option disabled selected value="{{$subdistrict->district->district_id}}">{{$subdistrict->district->district_en}}</option>
                        @foreach($categories as $district)
                            <option value="{{$district->id}}">{{$district->district_en}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-dark" href="{{route('admin.subdistrict.index')}}">Cancel</a>
            </form>
        </div>
    </div>

@endsection
