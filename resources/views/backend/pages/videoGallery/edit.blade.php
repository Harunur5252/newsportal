@extends('layouts.app')

@section('title')
    UpdateVideoGallery
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">UpdateVideoGallery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">UpdateVideoGallery</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">VideoGallery</h3>
            <!-- <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add VideoGallery</button> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body col-md-6">
           
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update New VideoGallery</h4>
                    <button type="button" class="close text-success btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.video','method'=>'post','name'=>'form']) !!}
                        <div class="form-group">
                            <label for="english">Video</label>
                            <input type="text" class="form-control" name="embed_code" id="" aria-describedby="emailHelp" value="{{$video->embed_code}}" placeholder="embed_code">
                            <span class="text-danger">{{$errors->has('embed_code')?$errors->first('embed_code'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Video Title Bangla</label>
                            <input type="text" class="form-control" name="title_bn" value="{{$video->title_bn}}" placeholder="photo title bangla">
                            <input type="hidden" class="form-control" name="id" value="{{$video->id}}">
                            <span class="text-danger">{{$errors->has('title_bn')?$errors->first('title_bn'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Video Title English</label>
                            <input type="text" class="form-control" name="title_en" alue="{{$video->title_en}}" placeholder="photo title english">
                            <span class="text-danger">{{$errors->has('title_en')?$errors->first('title_en'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Select Type</label>
                            <select name="type" class="form-control" id="">
                              <option selected disabled>--select type--</option>
                              <option value="1">Big Video</option>
                              <option value="0">Small Video</option>
                            </select>
                            <span class="text-danger">{{$errors->has('type')?$errors->first('type'):''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.modal-content -->
        
        </div>
        <!-- /.card-body -->
    </div>
<script type="text/javascript">
	document.forms['form'].elements['type'].value='{{$video->type}}';
</script>
   
@endsection
