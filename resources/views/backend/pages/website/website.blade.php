@extends('layouts.app')

@section('title')
    ImportantWebsite
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ImportantWebsite</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">ImportantWebsite</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ImportantWebsite Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add ImportantWebsite</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Website Name English</th>
                        <th>Website Name Bangla</th>
                        <th>Website Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($websites as $website)
                    <tr>
                        <td>{{Crypt::decryptString($website->website_name)}}</td>
                        <td>{{Crypt::decryptString($website->website_name_bn)}}</td>
                        <td>{{Crypt::decryptString($website->website_link)}}</td>
                        <td>
                            <a href="{{route('edit.website',(Crypt::encryptString($website->id)))}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.website',(Crypt::encryptString($website->id)))}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>Website Name English</th>
                <th>Website Name Bangla</th>
                <th>Website Link</th>
                <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

{{--     Website added model--}}

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Website</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.website','method'=>'post']) !!}
                        <div class="form-group">
                            <label for="english">Website Name English</label>
                            <input type="text" class="form-control" name="website_name" id="english" aria-describedby="emailHelp" placeholder="website_name_en">
                            <span class="text-danger">{{$errors->has('website_name')?$errors->first('website_name'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="english">Website Name Bangla</label>
                            <input type="text" class="form-control" name="website_name_bn" id="english" aria-describedby="emailHelp" placeholder="website_name_bn">
                            <span class="text-danger">{{$errors->has('website_name_bn')?$errors->first('website_name_bn'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="bangla">Website Link</label>
                            <input type="text" class="form-control" name="website_link" id="bangla" placeholder="website_link">
                            <span class="text-danger">{{$errors->has('website_link')?$errors->first('website_link'):''}}</span>
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
