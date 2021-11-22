@extends('admin.layouts.master')
@section('title')
    Admin Home
@endsection

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
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.district.index")}}">Back To Districts</a>
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
                                <a href="{{route('admin.district.unDelete',$district->id)}}" onclick="return confirm('Are you sure to Unarchive?')" class="btn btn-warning">Unarchive</a>
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
