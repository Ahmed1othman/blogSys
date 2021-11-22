@extends('admin.layouts.master')
@section('title')
    Admin Category - Add
@endsection


@section('content')
    <div class="page-header">
        <h3 class="page-title"> Add New Post </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create New Post</li>
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
            <h4 class="card-title">Add Post</h4>
            <form class="forms-sample" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                @csrf



                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample">

                                {{-- title row --}}
                                <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputName1">Post Title English</label>
                                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Title English" name="title_en">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="exampleInputName1">Post Title Arabic</label>
                                            <input type="text" class="form-control" id="exampleInputName1" placeholder="Title Arabic" name="title_ar">
                                        </div>
                                </div>
                                {{--end of row--}}

                                {{-- category & subcategory row --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Category</label>
                                            <select id="category_id" class="form-control" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->category_en}}</option>
                                                @endforeach
                                            </select>
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">SubCategory</label>
                                            <select id="#subcategory_id" class="form-control" name="subcategory_id">
                                                <option disabled selected>-- select subcategory</option>
                                            </select>
                                    </div>
                                </div>
                                {{--end of row--}}


                                {{-- district & subdistrict row --}}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">District</label>
                                        <select id="district_id" class="form-control" name="district_id">
                                            <option disabled selected>-- select category</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->district_en}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">SubDistrict</label>
                                        <select id="district_id" class="form-control" name="subdistrict_id">
                                            <option disabled selected>-- select subdistrict</option>
                                        </select>
                                    </div>
                                </div>
                                {{--end of row--}}


                                {{--Image Row--}}
                                <div class="form-group row col-md-12">
                                    <label>Image upload</label>
                                    <input type="file" name="image" class="file-upload-default">
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
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tags English" name="tags_en">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName1">Tags Arabic</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Tags Arabic" name="tags_ar">
                                    </div>
                                </div>
                                {{--end of row--}}


                                {{-- Details row --}}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleTextarea1">Details English</label>
                                        <textarea name="details_en" class="form-control" id="summernote" rows="4"></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleTextarea1">Details Arabic</label>
                                        <textarea name="details_ar" class="form-control" id="summernote1" rows="4"></textarea>
                                    </div>
                                </div>
                                {{-- end of row --}}


                                <hr>
                                <h2 class="text-center">Extra Options</h2>
                                <div class="row col-md-12">
                                        <div class="form-check col-3">
                                            <label class="form-check-label">
                                                <input name="headline" value="1" type="checkbox" class="form-check-input">Headline <i class="input-helper"></i>
                                            </label>
                                        </div>

                                        <div class="form-check col-3">
                                            <label class="form-check-label">
                                                <input name="first_section" value="1" type="checkbox" class="form-check-input"> First Section <i class="input-helper"></i>
                                            </label>
                                        </div>

                                        <div class="form-check col-3">
                                            <label class="form-check-label">
                                                <input name="first_section_thumbnail" value="1" type="checkbox" class="form-check-input"> First Section Thumbnail <i class="input-helper"></i>
                                            </label>
                                        </div>

                                        <div class="form-check col-3">
                                            <label class="form-check-label">
                                                <input name="bigthumbnail" value="1" type="checkbox" class="form-check-input"> Big Thumbnail <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>


                                <hr>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>


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
