@extends('layouts.app')

@section('title')
    PhotoGallery
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">PhotoGallery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">PhotoGallery</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">PhotoGallery Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add PhotoGallery</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                       <th width="30%">Photo Title Bangla</th>
                       <th width="30%">Photo Title English</th>
                       <th width="30%">Photo</th>
                       <th width="30%">Type</th>
                       <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{$photo->title_bn}}</td>
                        <td>{{$photo->title_en}}</td>
                        <td><img src="{{ asset($photo->photo) }}" alt="nothing found" height="100" width="100"></td>
                        <td>
                         @if($photo->type == 1)
                          <span class="badge badge-success">Big Photo</span>
                         @else
                          <span class="badge badge-primary">Small Photo</span>
                         @endif
                        </td>
                        <td>
                            <a href="{{route('edit.photo',[$photo->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.photo',[$photo->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th width="30%">Photo Title Bangla</th>
                   <th width="30%">Photo Title English</th>
                   <th width="30%">Photo</th>
                   <th width="30%">Type</th>
                   <th width="10%">Action</th>
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
                    <h4 class="modal-title">Add New PhotoGallery</h4>
                    <button type="button" class="close text-success btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.photo','method'=>'post','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="english">Photo</label>
                            <input type="file" class="form-control" name="photo" id="" aria-describedby="emailHelp">
                            <span class="text-danger">{{$errors->has('photo')?$errors->first('photo'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Photo Title Bangla</label>
                            <input type="text" class="form-control" name="title_bn"  placeholder="photo title bangla">
                            <span class="text-danger">{{$errors->has('title_bn')?$errors->first('title_bn'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Photo Title English</label>
                            <input type="text" class="form-control" name="title_en"  placeholder="photo title english">
                            <span class="text-danger">{{$errors->has('title_en')?$errors->first('title_en'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Select Type</label>
                            <select name="type" class="form-control" id="">
                              <option selected disabled>--select type--</option>
                              <option value="1">Big Photo</option>
                              <option value="0">Small photo</option>
                            </select>
                            <span class="text-danger">{{$errors->has('type')?$errors->first('type'):''}}</span>
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
