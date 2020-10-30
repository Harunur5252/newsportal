@extends('layouts.app')

@section('title')
    User Role
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Role</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">User Role</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">User Role</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Role</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'store.role','method'=>'post','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        <label for="english">Name English</label>
                        <input type="text" class="form-control" name="name_en"  aria-describedby="emailHelp" placeholder="name_en">
                        <span class="text-danger">{{$errors->has('name_en')?$errors->first('name_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="english">Name Bangla</label>
                        <input type="text" class="form-control" name="name_bn"  aria-describedby="emailHelp" placeholder="name_bn">
                        <span class="text-danger">{{$errors->has('name_bn')?$errors->first('name_bn'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Email</label>
                        <input type="email" class="form-control" name="email"  placeholder="email">
                        <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="password">
                        <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Photo</label>
                        <input type="file" class="form-control" name="image" onchange="readURL(this);">
                        <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                        <br/>
                        <img src="" id="one">
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Category</label>
                            <input type="checkbox" class="form-control" name="category" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">SubCategory</label>
                            <input type="checkbox" class="form-control" name="subcategory" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">District</label>
                            <input type="checkbox" class="form-control" name="district" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">SubDistrict</label>
                            <input type="checkbox" class="form-control" name="subdistrict" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Post</label>
                            <input type="checkbox" class="form-control" name="post" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Logo</label>
                            <input type="checkbox" class="form-control" name="logo" value="1">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Social</label>
                            <input type="checkbox" class="form-control" name="social" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Facebook</label>
                            <input type="checkbox" class="form-control" name="facebook" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Seo</label>
                            <input type="checkbox" class="form-control" name="seo" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Prayer Time</label>
                            <input type="checkbox" class="form-control" name="prayer" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Live Tv</label>
                            <input type="checkbox" class="form-control" name="livetv" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Notice</label>
                            <input type="checkbox" class="form-control" name="notice" value="1">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Breakingnews</label>
                            <input type="checkbox" class="form-control" name="breakingnews" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Ads</label>
                            <input type="checkbox" class="form-control" name="ads" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Contact</label>
                            <input type="checkbox" class="form-control" name="contactaddress" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Imp_website</label>
                            <input type="checkbox" class="form-control" name="importantwebsite" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Photogallery</label>
                            <input type="checkbox" class="form-control" name="photogallery" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Videogallery</label>
                            <input type="checkbox" class="form-control" name="videogallery" value="1">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="bangla">Contact_info</label>
                            <input type="checkbox" class="form-control" name="contactinformation" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Role</label>
                            <input type="checkbox" checked="" class="form-control" name="role" value="1">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="bangla">Newslater</label>
                            <input type="checkbox" class="form-control" name="newslatter" value="1">
                        </div>
                    </div>
                    <br/><hr/>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
