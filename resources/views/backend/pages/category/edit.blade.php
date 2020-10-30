@extends('layouts.app')

@section('title')
    Category
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Category Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update New Category</h4>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.category','method'=>'post']) !!}
                    <div class="form-group">
                        <label for="english">Category Name English</label>
                        <input type="text" class="form-control" name="category_en" id="english" value="{{$category->category_en}}" aria-describedby="emailHelp" placeholder="category_english">
                        <input type="hidden" class="form-control" name="id" id="english" value="{{$category->id}}">
                        <span class="text-danger">{{$errors->has('category_en')?$errors->first('category_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Category Name Bangla</label>
                        <input type="text" class="form-control" name="category_bn" id="bangla" value="{{$category->category_bn}}"placeholder="category_bangla">
                        <span class="text-danger">{{$errors->has('category_bn')?$errors->first('category_bn'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
