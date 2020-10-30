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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">District Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add District</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>District Name Bangla</th>
                    <th>District Name English</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($districts as $district)
                    <tr>
                        <td>{{$district->district_bn}}</td>
                        <td>{{$district->district_en}}</td>
                        <td>
                            <a href="{{route('edit.district',[$district->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.district',[$district->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>District Name Bangla</th>
                    <th>District Name English</th>
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
                    <h4 class="modal-title">Add New District</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.district','method'=>'post']) !!}
                    <div class="form-group">
                        <label for="english">District Name English</label>
                        <input type="text" class="form-control" name="district_en" id="english" aria-describedby="emailHelp" placeholder="district_english">
                        <span class="text-danger">{{$errors->has('district_en')?$errors->first('district_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">District Name Bangla</label>
                        <input type="text" class="form-control" name="district_bn" id="bangla" placeholder="district_bangla">
                        <span class="text-danger">{{$errors->has('district_bn')?$errors->first('district_bn'):''}}</span>
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
