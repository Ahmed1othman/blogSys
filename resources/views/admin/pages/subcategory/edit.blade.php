@extends('admin.layouts.master')
@section('title')
    Admin Category - Add
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit Category </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.subcategory.index')}}">SubCategory</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit SubCategory</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit SubCategory</h4>
            <form class="forms-sample" action="{{route('admin.subcategory.update',$subcategory->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">SubCategory English</label>
                    <input type="text" class="form-control" name="subcategory_en"  placeholder="Enter arabic subcategory name .." value="{{$subcategory->subcategory_en}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername2">SubCategory Arabic</label>
                    <input type="text" class="form-control" name="subcategory_ar" placeholder="Enter arabic subcategory name .. " value="{{$subcategory->subcategory_ar}}">
                </div>

                <div class="form-group">
                    <select class="js-example-basic-single form-control" name="category_id">
                        <option disabled selected value="{{$subcategory->category->category_id}}">{{$subcategory->category->category_en}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_en}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-dark" href="{{route('admin.subcategory.index')}}">Cancel</a>
            </form>
        </div>
    </div>

@endsection
