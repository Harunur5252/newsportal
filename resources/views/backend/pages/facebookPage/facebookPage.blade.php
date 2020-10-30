@extends('layouts.app')

@section('title')
 FacebookPageSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">FacebookPageSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">FacebookPageSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">FacebookPageSetting</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">FacebookPage Settings</h4>
                    @if($facebookPage->status == 1)
                      <a href="{{ route('facebookPage.deactive',[$facebookPage->id])  }}" class="btn btn-danger float-right">Deactive</a>
                    @else
                      <a href="{{ route('facebookPage.active',[$facebookPage->id])  }}" class="btn btn-success float-right">Active</a>
                    @endif
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.facebookpage.setting','method'=>'post']) !!}
                    <div class="form-group">
                        <label>facebookPage Link</label>
                        <input type="text" name="facebookpage_link" class="form-control" required="" value="{{$facebookPage->facebookpage_link}}" placeholder="facebookpage_link">  
                        <span class="text-danger">{{$errors->has('facebookpage_link')?$errors->first('facebookpage_link'):''}}</span>
                        
                        <input type="hidden" class="form-control" name="id"  value="{{$facebookPage->id}}">
                        <br/>
                        @if($facebookPage->status == 1)
                          <small class="text-success">Now facebookpage are Active</small>
                        @else
                          <small class="text-danger">Now facebookpage are Deactive</small>
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
