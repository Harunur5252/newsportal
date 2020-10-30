@extends('layouts.app')

@section('title')
    PhotoGallery
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">PhotoGallery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">PhotoGallery</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">PhotoGallery Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add PhotoGallery</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New PhotoGallery</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.photo','method'=>'post','enctype'=>'multipart/form-data','name'=>'form']) !!}
                        <div class="row">
                        
                         <div class="form-group">
                            <label for="english">Photo</label>
                            <input type="file" class="form-control" name="photo" onchange="readURL(this);" aria-describedby="emailHelp">
                            <input type="hidden" class="form-control" name="id" value="{{ $photo->id }}" >
                            <span class="text-danger">{{$errors->has('photo')?$errors->first('photo'):''}}</span>
                            <br/>
                           <img id="one">
                        </div>
                        <div class="form-group">
                    
                            <label>Old photo</label>
                            <br/>
                            <img src="{{ asset($photo->photo) }}" width="80px" height="80px">

                        </div>
                        </div>
                       
                        <div class="form-group">
                            <label for="bangla">Photo Title Bangla</label>
                            <input type="text" class="form-control" name="title_bn"  value="{{ $photo->title_bn }}"placeholder="photo title bangla">
                            <span class="text-danger">{{$errors->has('title_bn')?$errors->first('title_bn'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Photo Title English</label>
                            <input type="text" class="form-control" name="title_en"  value="{{ $photo->title_en }}"placeholder="photo title english">
                            <span class="text-danger">{{$errors->has('title_en')?$errors->first('title_en'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Select Type</label>
                            <select name="type" class="form-control" id="">
                              <option selected disabled>--select type--</option>
                              <option value="1">Big Photo</option>
                              <option value="0">Small photo</option>
                            </select>
                            <span class="text-danger">{{$errors->has('type')?$errors->first('type'):''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

<script>
 document.forms['form'].elements['type'].value='{{ $photo->type}}';
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
