@extends('layouts.app')

@section('title')
     Update Ads
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Ads</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"> Update Ads</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Update Ads</h3>
           
        </div>
        <!-- /.card-header -->
        <div class="card-body col-sm-6">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Ads</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.ads','method'=>'post','id'=>'form','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="english">Ads Link</label>
                            <input type="text" class="form-control" name="link" id="english" aria-describedby="emailHelp" value="{{$ads->link}}" required="" placeholder="ads_link">
                            <input type="hidden" class="form-control" name="id"  value="{{$ads->id}}">
                            <span class="text-danger">{{$errors->has('link')?$errors->first('link'):''}}</span>
                        </div>
                        <div class="row">
                        	<div class="form-group">
                            <label>Ads</label>
                            <input type="file" class="form-control" name="ads" accept="image/*" onchange="readURL(this);">
                            <span class="text-danger">{{$errors->has('ads')?$errors->first('ads'):''}}</span>
                            <br/>
                            <img src="" id="one">
                        </div>
                        <div class="form-group">
                        	<br/>                        	
                        	<label>Ads</label>               	
                        	<img src="{{asset($ads->ads)}}" style="height: 80px; width: 80px;">
                        </div>
                        </div>
                        
                         <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="type">
                                <option selected="" disabled="">--slelct type--</option>
                                <option value="2">Horizontal</option>
                                <option value="1">Vertical</option>
                            </select>
                            <span class="text-danger">{{$errors->has('type')?$errors->first('type'):''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

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
<script type="text/javascript">
	document.forms['form'].elements['type'].value='{{$ads->type}}';
</script>
    
@endsection
