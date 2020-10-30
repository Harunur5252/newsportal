@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('title')
    Post Create
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post Create</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Post</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Post Create</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::open(['route' => 'store.post','method'=>'post','enctype'=>'multipart/form-data']) !!}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Title Bangla</label>
                                        <input type="text" class="form-control" id="" name="title_bn" required placeholder="Enter title bangla">
                                        <span class="text-danger">{{$errors->has('title_bn')?$errors->first('title_bn'):''}}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Title English</label>
                                        <input type="text" class="form-control" id="" name="title_en"required placeholder="Enter title english">
                                        <span class="text-danger">{{$errors->has('title_en')?$errors->first('title_en'):''}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Category</label>
                                        <select name="cat_id" class="form-control" id="" required>
                                            <option disabled selected>--select category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_en}}|{{$category->category_bn}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('cat_id')?$errors->first('cat_id'):''}}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Subcategory</label>
                                        <select name="subcat_id" class="form-control" id="subcat_id">
                                            <option disabled selected>--select subcategory--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>District</label>
                                        <select name="dist_id" class="form-control" id="" required>
                                            <option disabled selected>--select district--</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">{{$district->district_en}}|{{$district->district_bn}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">{{$errors->has('dist_id')?$errors->first('dist_id'):''}}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Subdistrict</label>
                                        <select name="subdist_id" class="form-control" id="subdist_id">
                                            <option disabled selected>--select Subdistrict--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Image Upload</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="" required onchange="readURL(this);" accept="image/*">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                        <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                                    </div>
                                </div>
                                <img src="#" id="one">
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tags Bangla</label>
                                        <input type="text" class="form-control" id="" name="tags_bn" required placeholder="Enter tags bangla">
                                        <span class="text-danger">{{$errors->has('tags_bn')?$errors->first('tags_bn'):''}}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputPassword1">Tags English</label>
                                        <input type="text" class="form-control" id="" name="tags_en" required placeholder="Enter tags english">
                                        <span class="text-danger">{{$errors->has('tags_en')?$errors->first('tags_en'):''}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Details Bangla</label>
                                        <textarea class="textarea" name="details_bn" required placeholder="Place some text here"style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                                        </textarea>
                                        <span class="text-danger">{{$errors->has('details_bn')?$errors->first('details_bn'):''}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Details English</label>
                                        <textarea class="textarea"name="details_en" required placeholder="Place some text here"style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                                        </textarea>
                                        <span class="text-danger">{{$errors->has('details_en')?$errors->first('details_en'):''}}</span>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="text-center text-primary">Extra Option</h4>
                                <div class="row">
                                    <div class="form-check col-md-3">
                                        <input type="checkbox" class="form-check-input" id="" name="headline" value="1">
                                        <label class="form-check-label" for="">Headline</label>
                                    </div>
                                    <div class="form-check col-md-3">
                                        <input type="checkbox" class="form-check-input" id="" name="first_section" value="1">
                                        <label class="form-check-label" for="">FirstSection</label>
                                    </div>
                                    <div class="form-check col-md-3">
                                        <input type="checkbox" class="form-check-input" id="" name="first_section_thumbnail" value="1">
                                        <label class="form-check-label" for="">FirstSection Big Thumbnail</label>
                                    </div>
                                    <div class="form-check col-md-3">
                                        <input type="checkbox" class="form-check-input" id="" name="bigthumbnail" value="1">
                                        <label class="form-check-label" for="">General BigThumbnail</label>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="cat_id"]').on('change', function(){
                var cat_id = $(this).val();
                if(cat_id) {
                    $.ajax({
                        url: "{{  url('/get/subcat/') }}/"+cat_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                             $("#subcat_id").empty();
                            $.each(data,function(key,value){
                                $("#subcat_id").append('<option value="'+value.id+'">'+value.subcategory_en+'|'+value.subcategory_bn+'</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="dist_id"]').on('change', function(){
                var dist_id = $(this).val();
                if(dist_id) {
                    $.ajax({
                        url: "{{  url('/get/subdist/') }}/"+dist_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $("#subdist_id").empty();
                            $.each(data,function(key,value){
                                $("#subdist_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'|'+value.subdistrict_bn+'</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
