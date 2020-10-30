@extends('layouts.app')

@section('title')
    SubCategory
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">SubCategory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">SubCategory</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">SubCategory Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add SubCategory</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>SubCategory Name Bangla</th>
                    <th>SubCategory Name English</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Subcategories as $Subcategory)
                    <tr>
                        <td>{{$Subcategory->category_en}}|{{$Subcategory->category_bn}}</td>
                        <td>{{$Subcategory->subcategory_bn}}</td>
                        <td>{{$Subcategory->subcategory_en}}</td>
                        <td>
                            <a href="{{route('edit.subcategory',[$Subcategory->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.subcategory',[$Subcategory->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Category</th>
                    <th>SubCategory Name Bangla</th>
                    <th>SubCategory Name English</th>
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
                    <h4 class="modal-title">Add New SubCategory</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.subcategory','method'=>'post']) !!}
                    <div class="form-group">
                        <label for="select">Choose Category</label>
                        <select class="form-control" name="category_id" id="select" required>
                            <option disabled selected>--select category--</option>
                             @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_en}}|{{$category->category_bn}}</option>
                             @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('category_id')?$errors->first('category_id'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="english">SubCategory Name English</label>
                        <input type="text" class="form-control" name="subcategory_en" id="english" aria-describedby="emailHelp" required placeholder="subcategory_english">
                        <span class="text-danger">{{$errors->has('subcategory_en')?$errors->first('subcategory_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">SubCategory Name Bangla</label>
                        <input type="text" class="form-control" name="subcategory_bn" id="bangla" required placeholder="subcategory_bangla">
                        <span class="text-danger">{{$errors->has('subcategory_bn')?$errors->first('subcategory_bn'):''}}</span>
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
