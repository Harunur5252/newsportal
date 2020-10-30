@extends('layouts.app')

@section('title')
    SocialSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">SocialSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">SocialSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Social Setting Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Social Settings</h4>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.social.setting','method'=>'post']) !!}
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook"  value="{{$social->facebook}}"  placeholder="facebook link">
                        <input type="hidden" class="form-control" name="id"  value="{{$social->id}}">
                        <span class="text-danger">{{$errors->has('facebook')?$errors->first('facebook'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Youtube</label>
                        <input type="text" class="form-control" name="youtube" value="{{$social->youtube}}" placeholder="youtube link">
                        <span class="text-danger">{{$errors->has('youtube')?$errors->first('youtube'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Instagram</label>
                        <input type="text" class="form-control" name="instagram"  value="{{$social->instagram}}" placeholder="instagram link">
                        <span class="text-danger">{{$errors->has('instagram')?$errors->first('instagram'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Twitter</label>
                        <input type="text" class="form-control" name="twitter"  value="{{$social->twitter}}" placeholder="twitter link">
                        <span class="text-danger">{{$errors->has('twitter')?$errors->first('twitter'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Linkedin</label>
                        <input type="text" class="form-control" name="linkedin"  value="{{$social->linkedin}}" placeholder="linkedin link">
                        <span class="text-danger">{{$errors->has('linkedin')?$errors->first('linkedin'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
