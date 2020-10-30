@extends('layouts.app')

@section('title')
    SubDistrict
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">SubDistrict</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">SubDistrict</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">SubDistrict Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add SubDistrict</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>SubDistrict</th>
                    <th>SubDistrict Name Bangla</th>
                    <th>SubDistrict Name English</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subdistricts as $subdistrict)
                    <tr>
                        <td>{{$subdistrict->district_en}}|{{$subdistrict->district_bn}}</td>
                        <td>{{$subdistrict->subdistrict_bn}}</td>
                        <td>{{$subdistrict->subdistrict_en}}</td>
                        <td>
                            <a href="{{route('edit.subdistrict',[$subdistrict->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.subdistrict',[$subdistrict->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>SubDistrict</th>
                    <th>SubDistrict Name Bangla</th>
                    <th>SubDistrict Name English</th>
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
                    <h4 class="modal-title">Add New SubDistrict</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.subdistrict','method'=>'post']) !!}
                    <div class="form-group">
                        <label for="select">Choose District</label>
                        <select class="form-control" name="district_id" id="select" required>
                            <option disabled selected>--select district--</option>
                            @foreach($districts as $district)
                                <option value="{{$district->id}}">{{$district->district_en}}|{{$district->district_bn}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('district_id')?$errors->first('district_id'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="english">SubDistrict Name English</label>
                        <input type="text" class="form-control" name="subdistrict_en" id="english" aria-describedby="emailHelp" required placeholder="subdistrict_english">
                        <span class="text-danger">{{$errors->has('subdistrict_en')?$errors->first('subdistrict_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">SubDistrict Name Bangla</label>
                        <input type="text" class="form-control" name="subdistrict_bn" id="bangla" required placeholder="subdistrict_bangla">
                        <span class="text-danger">{{$errors->has('subdistrict_bn')?$errors->first('subdistrict_bn'):''}}</span>
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
