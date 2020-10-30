@extends('layouts.app')

@section('title')
     Profile Change
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile Change</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Profile Change</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>SuperAdmin</strong> Profile change</div>

                <div class="card-body">
                	{!! Form::open(['route' =>'admin.profile.update','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group row">
                            <label for="name_en" class="col-md-4 col-form-label text-md-right">{{ __('Name English') }}</label>
                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control" name="name_en" value="{{$user->name_en}}" required autofocus>
                                <input type="hidden" name="id" value="{{$user->id}}">
                               <span class="text-danger">{{$errors->has('name_en')?$errors->first('name_en'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_bn" class="col-md-4 col-form-label text-md-right">{{ __('Name Bangla') }}</label>

                            <div class="col-md-6">
                                <input id="name_bn" type="text" class="form-control" name="name_bn" value="{{$user->name_bn}}" required>
                                <span class="text-danger">{{$errors->has('name_bn')?$errors->first('name_bn'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required value="{{$user->email}}">
                                <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="Photo" type="file" class="form-control" name="image">
                                <span class="text-danger">{{$errors->has('image')?$errors->first('image'):''}}</span>
                                <br/>
                                <img src="{{asset($user->image)}}" style="height: 60px;width: 60px;">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection