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
                <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Category</h4>
            <form class="forms-sample" action="{{route('admin.category.update',$category->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Category English</label>
                    <input type="text" class="form-control" name="category_en"  placeholder="Enter arabic category name .." value="{{$category->category_en}}">
                </div>

                <div class="form-group">
                    <label for="exampleInputUsername2">Category Arabic</label>
                    <input type="text" class="form-control" name="category_ar" placeholder="Enter arabic category name .. " value="{{$category->category_ar}}">
                </div>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-dark" href="{{route('admin.category.index')}}">Cancel</a>
            </form>
        </div>
    </div>

@endsection
