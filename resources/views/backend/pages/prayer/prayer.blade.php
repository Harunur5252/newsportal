@extends('layouts.app')

@section('title')
    PrayerSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">PrayerSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">PrayerSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Prayer Setting Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Prayer Settings</h4>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.prayertime.setting','method'=>'post']) !!}
                    <div class="form-group">
                        <label>Fajar Namaz</label>
                        <input type="text" class="form-control" name="fajar"  value="{{$prayer->fajar}}"  placeholder="fajar time">
                        <input type="hidden" class="form-control" name="id"  value="{{$prayer->id}}">
                        <span class="text-danger">{{$errors->has('fajar')?$errors->first('fajar'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Johor Namaz</label>
                        <input type="text" class="form-control" name="johor" value="{{$prayer->johor}}" placeholder="johor time">
                        <span class="text-danger">{{$errors->has('johor')?$errors->first('johor'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Asor Namaz</label>
                        <input type="text" class="form-control" name="asor"  value="{{$prayer->asor}}" placeholder="asor time">
                        <span class="text-danger">{{$errors->has('asor')?$errors->first('asor'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Magrib Namaz</label>
                        <input type="text" class="form-control" name="magrib"  value="{{$prayer->magrib}}" placeholder="magrib time">
                        <span class="text-danger">{{$errors->has('magrib')?$errors->first('magrib'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Esa Namaz</label>
                        <input type="text" class="form-control" name="esa"  value="{{$prayer->esa}}" placeholder="esa time">
                        <span class="text-danger">{{$errors->has('esa')?$errors->first('esa'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Jummah Namaz</label>
                        <input type="text" class="form-control" name="jummah"  value="{{$prayer->jummah}}" placeholder="jummah time">
                        <span class="text-danger">{{$errors->has('jummah')?$errors->first('jummah'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
