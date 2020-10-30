@extends('layouts.app')

@section('title')
 NoticeSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">NoticeSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">NoticeSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Notice Setting Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Notice Settings</h4>
                    @if($notice->status == 1)
                      <a href="{{ route('notice.deactive',[$notice->id])  }}" class="btn btn-danger float-right">Deactive</a>
                    @else
                      <a href="{{ route('notice.active',[$notice->id])  }}" class="btn btn-success float-right">Active</a>
                    @endif
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.notice.setting','method'=>'post']) !!}
                    <div class="form-group">
                        <label>Notice Bangla</label>
                        <textarea  class="form-control" name="notice" cols="10" rows="10" required placeholder="enter notice_bangla">
                          {{$notice->notice}}
                        </textarea>
                        <span class="text-danger">{{$errors->has('notice')?$errors->first('notice'):''}}</span>
                        <label>Notice English</label>
                        <textarea  class="form-control" name="notice_en" cols="10" rows="10" required placeholder="enter notice_english">
                          {{$notice->notice_en}}
                        </textarea>
                        <span class="text-danger">{{$errors->has('notice_en')?$errors->first('notice_en'):''}}</span>
                        <input type="hidden" class="form-control" name="id"  value="{{$notice->id}}">
                        <br/>
                        @if($notice->status == 1)
                          <small class="text-success">Now notice are Active</small>
                        @else
                          <small class="text-danger">Now notice are Deactive</small>
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
