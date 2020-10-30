@extends('layouts.app')

@section('title')
    Update User Role
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update User Role</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Update User Role</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Update User Role</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update User Role</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'update.role','method'=>'post','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        <label for="english">Name English</label>
                        <input type="text" class="form-control" name="name_en"  aria-describedby="emailHelp" placeholder="name_en" value="{{$role->name_en}}">
                        <span class="text-danger">{{$errors->has('name_en')?$errors->first('name_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="english">Name Bangla</label>
                        <input type="text" class="form-control" name="name_bn"  aria-describedby="emailHelp" placeholder="name_bn" value="{{$role->name_bn}}">
                        <span class="text-danger">{{$errors->has('name_bn')?$errors->first('name_bn'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Email</label>
                        <input type="email" class="form-control" name="email"  placeholder="email" value="{{$role->email}}">
                        <input type="hidden" class="form-control" name="id"   value="{{$role->id}}">
                    </div>
                    <div class="row">
                       <div class="form-group">
                          <label for="bangla">Photo</label>
                          <input type="file" class="form-control" name="image" onchange="readURL(this);">
                          <br/>
                          <img src="" id="one">
                       </div>
                       <div class="form-group">
                           <br/>
                           <label for="bangla">Old Photo</label>
                           <img src="{{asset($role->image)}}" style="height: 60px; width: 60px;">
                       </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Category</label>
                            <input type="checkbox" class="form-control" name="category" value="1" {{$role->category==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">SubCategory</label>
                            <input type="checkbox" class="form-control" name="subcategory" value="1" {{$role->subcategory==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">District</label>
                            <input type="checkbox" class="form-control" name="district" value="1" {{$role->district==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">SubDistrict</label>
                            <input type="checkbox" class="form-control" name="subdistrict" value="1" {{$role->subdistrict==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Post</label>
                            <input type="checkbox" class="form-control" name="post" value="1" {{$role->post==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Logo</label>
                            <input type="checkbox" class="form-control" name="logo" value="1" {{$role->logo==1?'checked':''}}>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Social</label>
                            <input type="checkbox" class="form-control" name="social" value="1" {{$role->social==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Facebook</label>
                            <input type="checkbox" class="form-control" name="facebook" value="1" {{$role->facebook==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Seo</label>
                            <input type="checkbox" class="form-control" name="seo" value="1" {{$role->seo==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Prayer Time</label>
                            <input type="checkbox" class="form-control" name="prayer" value="1" {{$role->prayer==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Live Tv</label>
                            <input type="checkbox" class="form-control" name="livetv" value="1" {{$role->livetv==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Notice</label>
                            <input type="checkbox" class="form-control" name="notice" value="1" {{$role->notice==1?'checked':''}}>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Breakingnews</label>
                            <input type="checkbox" class="form-control" name="breakingnews" value="1" {{$role->breakingnews==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Ads</label>
                            <input type="checkbox" class="form-control" name="ads" value="1" {{$role->ads==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Contact</label>
                            <input type="checkbox" class="form-control" name="contactaddress" value="1" {{$role->contactaddress==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Imp_website</label>
                            <input type="checkbox" class="form-control" name="importantwebsite" value="1" {{$role->importantwebsite==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Photogallery</label>
                            <input type="checkbox" class="form-control" name="photogallery" value="1" {{$role->photogallery==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Videogallery</label>
                            <input type="checkbox" class="form-control" name="videogallery" value="1" {{$role->videogallery==1?'checked':''}}>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Contact_info</label>
                            <input type="checkbox" class="form-control" name="contactinformation" value="1" {{$role->contactinformation==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Role</label>
                            <input type="checkbox" class="form-control" name="role" value="1" {{$role->role==1?'checked':''}}>
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Newslatter</label>
                            <input type="checkbox" class="form-control" name="newslatter" value="1" {{$role->newslatter==1?'checked':''}}>
                        </div>
                    </div>
                    <br/><hr/>
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
                  .width(60)
                  .height(60);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
