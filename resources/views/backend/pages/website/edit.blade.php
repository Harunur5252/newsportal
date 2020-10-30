@extends('layouts.app')

@section('title')
    Update ImportantWesite
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update ImportantWesite</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Update ImportantWesite</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">ImportantWesite Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update New ImportantWesite</h4>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.website','method'=>'post']) !!}
                    <div class="form-group">
                        <label for="english">Webaite Name English</label>
                        <input type="text" class="form-control" name="website_name" id="english" value="{{Crypt::decryptString($website->website_name)}}" aria-describedby="emailHelp" placeholder="website_name_en">
                        <input type="hidden" class="form-control" name="id" id="english" value="{{Crypt::encryptString($website->id)}}">
                        <span class="text-danger">{{$errors->has('website_name')?$errors->first('website_name'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="english">Webaite Name Bangla</label>
                        <input type="text" class="form-control" name="website_name_bn" id="english" value="{{Crypt::decryptString($website->website_name_bn)}}" aria-describedby="emailHelp" placeholder="website_name_bn">
                        <span class="text-danger">{{$errors->has('website_name_bn')?$errors->first('website_name_bn'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Website Link</label>
                        <input type="text" class="form-control" name="website_link" id="bangla" value="{{Crypt::decryptString($website->website_link)}}"placeholder="website_link">
                        <span class="text-danger">{{$errors->has('website_link')?$errors->first('website_link'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
