@extends('layouts.app')

@section('title')
    SeoSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">SeoSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">SeoSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Seo Setting Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Seo Settings</h4>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.seo.setting','method'=>'post']) !!}
                    <div class="form-group">
                        <label>Meta Author</label>
                        <input type="text" class="form-control" name="meta_author"  value="{{$seo->meta_author}}"  placeholder="meta_author">
                        <input type="hidden" class="form-control" name="id"  value="{{$seo->id}}">
                        <span class="text-danger">{{$errors->has('meta_author')?$errors->first('meta_author'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$seo->meta_title}}" placeholder="meta_title">
                        <span class="text-danger">{{$errors->has('meta_title')?$errors->first('meta_title'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description"  value="{{$seo->meta_description}}" placeholder="meta_description">
                        <span class="text-danger">{{$errors->has('meta_description')?$errors->first('meta_description'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Meta Keyword</label>
                        <input type="text" class="form-control" name="meta_keyword"  value="{{$seo->meta_keyword}}" placeholder="meta_keyword">
                        <span class="text-danger">{{$errors->has('meta_keyword')?$errors->first('meta_keyword'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Google Analytic</label>
                        <input type="text" class="form-control" name="google_analytics"  value="{{$seo->google_analytics}}" placeholder="google_analytics">
                        <span class="text-danger">{{$errors->has('google_analytics')?$errors->first('google_analytics'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Google Verification</label>
                        <input type="text" class="form-control" name="google_verification"  value="{{$seo->google_verification}}" placeholder="google_verification">
                        <span class="text-danger">{{$errors->has('google_verification')?$errors->first('google_verification'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Alexa Analytic</label>
                        <input type="text" class="form-control" name="alexa_analytics"  value="{{$seo->alexa_analytics}}" placeholder="alexa_analytics">
                        <span class="text-danger">{{$errors->has('alexa_analytics')?$errors->first('alexa_analytics'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
