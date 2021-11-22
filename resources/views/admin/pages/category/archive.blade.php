@extends('admin.layouts.master')
@section('title')
    Admin Home
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Category </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.category.index")}}">Back To Categories</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Category English </th>
                            <th> Category Arabic </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td> {{$category->id}} </td>
                            <td> {{$category->category_en}} </td>
                            <td> {{$category->category_ar}}</td>
                            <td>
                                <a href="{{route('admin.category.unDelete',$category->id)}}" onclick="return confirm('Are you sure to Unarchive?')" class="btn btn-warning">Unarchive</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
