@extends('layouts.app')

@section('title')
    VideoGallery
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">VideoGallery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">VideoGallery</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">VideoGallery Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add VideoGallery</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                       <th width="40%">Video Title Bangla</th>
                       <th width="40%">Video Title English</th>
                       <th width="40%">Embed Code</th>
                       <th width="40%">Type</th>
                       <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td>{{$video->title_bn}}</td>
                        <td>{{$video->title_en}}</td>
                        <td>{{$video->embed_code}}</td>
        
                        <td>
                         @if($video->type == 1)
                          <span class="badge badge-success">Big video</span>
                         @else
                          <span class="badge badge-primary">Small video</span>
                         @endif
                        </td>
                        <td>
                            <a href="{{route('edit.video',[$video->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.video',[$video->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th width="40%">Video Title Bangla</th>
                   <th width="40%">Video Title English</th>
                   <th width="40%">Embed Code</th>
                   <th width="40%">Type</th>
                   <th width="20%">Action</th>
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
                    <h4 class="modal-title">Add New VideoGallery</h4>
                    <button type="button" class="close text-success btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.video','method'=>'post']) !!}
                        <div class="form-group">
                            <label for="english">Video</label>
                            <input type="text" class="form-control" name="embed_code" id="" aria-describedby="emailHelp"  placeholder="embed_code">
                            <span class="text-danger">{{$errors->has('embed_code')?$errors->first('embed_code'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Video Title Bangla</label>
                            <input type="text" class="form-control" name="title_bn"  placeholder="photo title bangla">
                            <span class="text-danger">{{$errors->has('title_bn')?$errors->first('title_bn'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Video Title English</label>
                            <input type="text" class="form-control" name="title_en"  placeholder="photo title english">
                            <span class="text-danger">{{$errors->has('title_en')?$errors->first('title_en'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Select Type</label>
                            <select name="type" class="form-control" id="">
                              <option selected disabled>--select type--</option>
                              <option value="1">Big Video</option>
                              <option value="0">Small Video</option>
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
