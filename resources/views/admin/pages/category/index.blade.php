@extends('admin.layouts.master')
@section('title')
    Admin Home
@endsection
<style type="text/css">
    .my-active span{
        background-color: #5cb85c !important;
        color: white !important;
        border-color: #5cb85c !important;
    }
</style>
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
                <h4 class="card-title"><a type="button" href="{{route('admin.category.add')}}" class="btn btn-primary btn-fw mb-2"><i class="mdi mdi-plus"></i> Add New Category</a></h4>
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.category.archive")}}">Go To Archive</a>
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
                                <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.category.delete',$category->id)}}" onclick="return confirm('Are you sure to archive?')" class="btn btn-warning">Archive</a>
                                <a href="{{route('admin.category.destroy',$category->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links('admin.includes.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
@endsection
