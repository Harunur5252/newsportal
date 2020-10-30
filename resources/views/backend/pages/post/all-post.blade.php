@extends('layouts.app')

@section('title')
    AllPost
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">AllPost</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">AllPost</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">AllPost Table</h3>
            <a href="{{ route('create') }}" class="btn btn-primary btn-sm float-right">Add post</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Title</th>
                        <th>Thambnail</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td width="15%">{{$post->category_en}}<b>--</b>{{$post->category_bn}}</td>
                        <td width="15%">{{$post->subcategory_en}}<b>--</b>{{$post->subcategory_bn}}</td>
                        <td width="25%">{{$post->title_en}}<b>--</b>{{$post->title_bn}}</td>
                        <td width="25%"><img src="{{ asset($post->image) }}" alt="nothing found" height="200px" width="200px"></td>
                        <td width="12%">{{date('d-F-y'),strtotime($post->post_date)}}</td>
                        <td>
                            <a href="{{route('edit.post',[$post->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.post',[$post->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>Category</th>
                <th>SubCategory</th>
                <th>Title</th>
                <th>Thambnail</th>
                <th>Date</th>
                <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

{{--     category added model--}}

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.category','method'=>'post']) !!}
                        <div class="form-group">
                            <label for="english">Category Name English</label>
                            <input type="text" class="form-control" name="category_en" id="english" aria-describedby="emailHelp" placeholder="category_english">
                            <span class="text-danger">{{$errors->has('category_en')?$errors->first('category_en'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Category Name Bangla</label>
                            <input type="text" class="form-control" name="category_bn" id="bangla" placeholder="category_bangla">
                            <span class="text-danger">{{$errors->has('category_bn')?$errors->first('category_bn'):''}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
