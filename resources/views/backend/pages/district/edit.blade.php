@extends('layouts.app')

@section('title')
    District
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">District</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">District</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">District Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update New District</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.district','method'=>'post']) !!}
                    <div class="form-group">
                        <label for="english">District Name English</label>
                        <input type="text" class="form-control" name="district_en" id="english" value="{{$district->district_en}}" aria-describedby="emailHelp" placeholder="district__english">
                        <input type="hidden" class="form-control" name="id" id="english" value="{{$district->id}}">
                        <span class="text-danger">{{$errors->has('district_en')?$errors->first('district_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">District Name Bangla</label>
                        <input type="text" class="form-control" name="district_bn" id="bangla" value="{{$district->district_bn}}"placeholder="district_bangla">
                        <span class="text-danger">{{$errors->has('district_bn')?$errors->first('district_bn'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
