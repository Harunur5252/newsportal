@extends('layouts.app')

@section('title')
 LiveTvSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">LiveTvSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">LiveTvSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">LiveTv Setting Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">LiveTv Settings</h4>
                    @if($livetv->status == 1)
                      <a href="{{ route('livetv.deactive',[$livetv->id])  }}" class="btn btn-danger float-right">Deactive</a>
                    @else
                      <a href="{{ route('livetv.active',[$livetv->id])  }}" class="btn btn-success float-right">Active</a>
                    @endif
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.livetv.setting','method'=>'post']) !!}
                    <div class="form-group">
                        <label>Embed Code</label>
                        <textarea  class="form-control" name="embed_code" required placeholder="embed_code">
                          {{$livetv->embed_code}}
                        </textarea>
                        <input type="hidden" class="form-control" name="id"  value="{{$livetv->id}}">
                        <span class="text-danger">{{$errors->has('embed_code')?$errors->first('embed_code'):''}}</span>
                        <br/>
                        @if($livetv->status == 1)
                          <small class="text-success">Now LiveTv are Active</small>
                        @else
                          <small class="text-danger">Now LiveTv are Deactive</small>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
