@extends('admin.layouts.master')
@section('title')
    Admin | subcategory archives
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Category </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.subcategory.index")}}">Back To SubCategories</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> SubCategory English </th>
                            <th> SubCategory Arabic </th>
                            <th> Category </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($subcategories as $subcategory)
                        <tr>
                            <td> {{$i ++}} </td>
                            <td> {{$subcategory->subcategory_en}} </td>
                            <td> {{$subcategory->subcategory_ar}}</td>
                            <td> {{$subcategory->category->category_en}}</td>
                            <td>
                                <a href="{{route('admin.subcategory.unDelete',$subcategory->id)}}" onclick="return confirm('Are you sure to Unarchive?')" class="btn btn-warning">Unarchive</a>
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
