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
        <h3 class="page-title"> Post </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a type="button" href="{{route('admin.post.add')}}" class="btn btn-primary btn-fw mb-2"><i class="mdi mdi-plus"></i> Add New Post</a></h4>
                <a type="button" class="btn btn-outline-light btn-fw " href="{{route("admin.post.archive")}}">Go To Archive</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Post Title </th>
                            <th> Category </th>
                            <th> District </th>
                            <th> Picture </th>
                            <th> Post Date </th>
                            <th> Created By  </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($posts as $post)
                        <tr>
                            <td> {{$i++}} </td>
                            <td> {{$post->title_en}} </td>
                            <td> {{$post->category->category_en}} </td>
                            <td> {{$post->district->district_en}} </td>
                            <td class="text-center"> <img style="height: 50px;width: 50px" src="{{asset($post->image)}}"></td>
                            <td> {{Carbon\Carbon::parse($post->post_date)->diffForHumans()}} </td>
                            <td> {{$post->user->name}}</td>
                            <td>
                                <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.post.delete',$post->id)}}" onclick="return confirm('Are you sure to archive?')" class="btn btn-warning">Archive</a>
                                <a href="{{route('admin.post.destroy',$post->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links('admin.includes.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
@endsection
