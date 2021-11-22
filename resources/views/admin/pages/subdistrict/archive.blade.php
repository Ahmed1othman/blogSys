@extends('admin.layouts.master')
@section('title')
    Admin | subdistrict archives
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> District </h3>
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
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.subdistrict.index")}}">Back To SubCategories</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> SubDistrict English </th>
                            <th> SubDistrict Arabic </th>
                            <th> District </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($subcategories as $subdistrict)
                        <tr>
                            <td> {{$i ++}} </td>
                            <td> {{$subdistrict->subdistrict_en}} </td>
                            <td> {{$subdistrict->subdistrict_ar}}</td>
                            <td> {{$subdistrict->district->district_en}}</td>
                            <td>
                                <a href="{{route('admin.subdistrict.unDelete',$subdistrict->id)}}" onclick="return confirm('Are you sure to Unarchive?')" class="btn btn-warning">Unarchive</a>
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
