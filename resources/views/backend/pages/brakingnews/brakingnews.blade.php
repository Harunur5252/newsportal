@extends('layouts.app')

@section('title')
 BrakingnewsSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">BrakingnewsSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('homadmin.dashboarde')}}">Home</a></li>
                <li class="breadcrumb-item active">BrakingnewsSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Beakingnews Setting Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Beakingnews Settings</h4>
                    @if($brakingnews->status == 1)
                      <a href="{{ route('brakingnews.deactive',[$brakingnews->id])  }}" class="btn btn-danger float-right">Deactive</a>
                    @else
                      <a href="{{ route('brakingnews.active',[$brakingnews->id])  }}" class="btn btn-success float-right">Active</a>
                    @endif
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.brakingnews.setting','method'=>'post']) !!}
                    <div class="form-group">
                        <label>Brakingnews English</label>
                        <textarea  class="form-control" name="news_en" cols="10" rows="10" required placeholder="enter brakingnews_en">
                          {{$brakingnews->news_en}}
                        </textarea>
                        <span class="text-danger">{{$errors->has('news_en')?$errors->first('news_en'):''}}</span>
                        <label>Brakingnews Bangla</label>
                        <textarea  class="form-control" name="news_bn" cols="10" rows="10" required placeholder="enter brakingnews_bn">
                          {{$brakingnews->news_bn}}
                        </textarea>
                        <span class="text-danger">{{$errors->has('news_bn')?$errors->first('news_bn'):''}}</span>
                        <input type="hidden" class="form-control" name="id"  value="{{$brakingnews->id}}">
                        <br/>
                        @if($brakingnews->status == 1)
                          <small class="text-success">Now brakingnews are Active</small>
                        @else
                          <small class="text-danger">Now brakingnews are Deactive</small>
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
