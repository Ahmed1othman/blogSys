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
        <h3 class="page-title"> subdistrict </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">SubDistrict</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a type="button" href="{{route('admin.subdistrict.add')}}" class="btn btn-primary btn-fw mb-2"><i class="mdi mdi-plus"></i> Add New SubDistrict</a></h4>
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.subdistrict.archive")}}">Go To Archive</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> SubDistrict English </th>
                            <th> SubDistrict Arabic </th>
                            <th> District Name </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $subdistrict)
                        <tr>
                            <td> {{$subdistrict->id}} </td>
                            <td> {{$subdistrict->subdistrict_en}} </td>
                            <td> {{$subdistrict->subdistrict_ar}}</td>
                            <td> {{$subdistrict->district->district_en}}</td>
                            <td>
                                <a href="{{route('admin.subdistrict.edit',$subdistrict->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.subdistrict.delete',$subdistrict->id)}}" onclick="return confirm('Are you sure to archive?')" class="btn btn-warning">Archive</a>
                                <a href="{{route('admin.subdistrict.destroy',$subdistrict->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $subcategories->links('admin.includes.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
@endsection
