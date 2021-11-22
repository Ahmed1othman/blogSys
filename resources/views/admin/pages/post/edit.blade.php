@extends('admin.layouts.master')
@section('title')
    Admin Post - Edit
@endsection

@section('content')
    <div class="page-header">
        <h3 class="page-title"> Edit Post </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Categories</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
            </ol>
        </nav>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Post</h4>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <form class="forms-sample" action="{{route('admin.post.update',$posts->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                {{-- title row --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Post Title English</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Title English" name="title_en" value="{{$posts->title_en}}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Post Title Arabic</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Title Arabic" name="title_ar" value="{{$posts->title_en}}">
                                    </div>
                                </div>
                                {{--end of row--}}

                                {{-- category & subcategory row --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">category</label>
                                        <select id="category_id" class="form-control" name="category_id">
                                            <option value="{{$posts->category_id}}" selected>{{$posts->category->category_en   }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_en}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">SubCategory</label>
                                        <select id="#subcategory_id" class="form-control" name="subcategory_id">
                                            @if(isset($posts->subcategory))
                                            <option selected value="{{$posts->subcategory_id}}">{{$posts->subcategory->subcategory_en}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                {{--end of row--}}


                                {{-- district & subdistrict row --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">District</label>
                                        <select id="district_id" class="form-control" name="district_id">
                                            <option value="{{$posts->district_id}}" selected>{{$posts->district->district_en}}</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->district_en}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">SubDistrict</label>
                                        <select id="district_id" class="form-control" name="subdistrict_id">
                                            @if(isset($posts->subdistrict))
                                            <option value="{{$posts->subdistrict_id}}" selected>{{$posts->subdistrict->subdistrict_en}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                {{--end of row--}}


                                {{--Image Row--}}
                                <div class="form-group row col-md-12">
                                    <label>Image upload</label>
                                    <img src="{{asset($posts->image)}}" width="70px" height="50px">
                                    <input type="file" name="image" class="file-upload-default">
                                    <input type="hidden" name="old_image" value="{{$posts->image}}">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Post Image">
                                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                                    </div>
                                </div>
                                {{--end of row--}}


                                {{-- Tags row --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Tags English</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tags English" name="tags_en" value="{{$posts->tags_en}}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Tags Arabic</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tags Arabic" name="tags_ar" value="{{$posts->tags_ar}}">
                                    </div>
                                </div>
                                {{--end of row--}}


                                {{-- Details row --}}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleTextarea1">Details English</label>
                                        <textarea name="details_en" class="form-control" id="summernote" rows="4" value="">{{$posts->details_en}}</textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleTextarea1">Details Arabic</label>
                                        <textarea name="details_ar" class="form-control" id="summernote1" rows="4" value="">{{$posts->details_ar}}</textarea>
                                    </div>
                                </div>
                                {{-- end of row --}}


                                <hr>
                                {{-- headline, first section, bigthumbnl and big first section row --}}
                                <h2 class="text-center">Extra Options</h2>
                                <div class="row col-md-12">
                                    <div class="form-check col-3">
                                        <label class="form-check-label">
                                            <input name="headline" value="1" type="checkbox" class="form-check-input" @if($posts->headline!= null) checked  @endif>Headline <i class="input-helper"></i>
                                        </label>
                                    </div>

                                    <div class="form-check col-3">
                                        <label class="form-check-label">
                                            <input name="first_section" value="1" type="checkbox" class="form-check-input" @if($posts->first_section!= null) checked  @endif> First Section <i class="input-helper"></i>
                                        </label>
                                    </div>

                                    <div class="form-check col-3">
                                        <label class="form-check-label">
                                            <input name="first_section_thumbnail" value="1" type="checkbox" class="form-check-input" @if($posts->first_section_thumbnail!= null) checked  @endif> First Section Thumbnail <i class="input-helper"></i>
                                        </label>
                                    </div>

                                    <div class="form-check col-3">
                                        <label class="form-check-label">
                                            <input name="bigthumbnail" value="1" type="checkbox" class="form-check-input" @if($posts->bigthumbnail!= null) checked  @endif> Big Thumbnail <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </div>
                                {{-- end of row --}}

                                <hr>


                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-dark" href="{{route('admin.post.index')}}">Cancel</a>
                            </form>
        </div>
    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('select[name="category_id"]').on('change', function () {

                                var category_id = $(this).val();
                                if (category_id) {
                                    $.ajax({
                                        url: "{{url('/subcategory/get/')}}/" + category_id,
                                        type: "GET",
                                        dataType: "json",
                                        success: function (data) {
                                            $('select[name="subcategory_id"]').empty();
                                            $.each(data, function (key, value) {
                                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_en + '</option>');
                                            });
                                        }
                                    })
                                } else {
                                    alert('danger');
                                }
                            });
                        });
                    </script >
                    <script type="text/javascript">
                        $(document).ready(function (){
                            $('select[name="district_id"]').on('change',function (){
                                var district_id = $(this).val();
                                if(district_id){
                                    $.ajax({
                                        url: "{{url('/subdistrict/get/')}}/"+district_id,
                                        type: "GET",
                                        dataType:"json",
                                        success:function (data){
                                            if (data){
                                                $('select[name="subdistrict_id"]').empty();
                                                $.each(data ,function (key, value) {
                                                    $('select[name="subdistrict_id"]').append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                                                });
                                            }
                                        }

                                    })
                                }else {
                                    alert('danger');
                                }
                            });
                        });
                    </script>

@endsection
