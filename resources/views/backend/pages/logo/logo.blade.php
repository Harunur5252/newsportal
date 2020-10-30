@extends('layouts.app')

@section('title')
 Logo
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Logo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Logo</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Logo</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Logo</h4>
                    
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'logo.update','method'=>'post','enctype'=>'multipart/form-data']) !!}
                    <div class="row">
                      <div class="form-group">
                        <label>Logo Upload</label>
                        <input type="file" class="form-control" name="logo" onchange="readURL(this);" accept="image/*">
                    
                        <input type="hidden" class="form-control" name="id" value="{{$logo->id}}" >
                        <span class="text-danger">{{$errors->has('logo')?$errors->first('logo'):''}}</span>
                        <br>
                        <img id="one">
                     </div>
                         
                     <div class="form-group">
                        <br>
                          <label>Old Logo</label>
                          <img src="{{asset($logo->logo)}}" style="height: 50px;width: 50px;">
                     </div>

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
@endsection
