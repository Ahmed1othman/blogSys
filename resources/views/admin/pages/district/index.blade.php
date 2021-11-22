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
        <h3 class="page-title"> District </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Districts</a></li>
                <li class="breadcrumb-item active" aria-current="page">District</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a type="button" href="{{route('admin.district.add')}}" class="btn btn-primary btn-fw mb-2"><i class="mdi mdi-plus"></i> Add New District</a></h4>
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.district.archive")}}">Go To Archive</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> District English </th>
                            <th> District Arabic </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($districts as $district)
                        <tr>
                            <td> {{$district->id}} </td>
                            <td> {{$district->district_en}} </td>
                            <td> {{$district->district_ar}}</td>
                            <td>
                                <a href="{{route('admin.district.edit',$district->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.district.delete',$district->id)}}" onclick="return confirm('Are you sure to archive?')" class="btn btn-warning">Archive</a>
                                <a href="{{route('admin.district.destroy',$district->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $districts->links('admin.includes.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
@endsection
