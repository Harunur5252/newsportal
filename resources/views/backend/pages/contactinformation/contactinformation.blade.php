@extends('layouts.app')

@section('title')
    ManageContact
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ManageContact</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">ManageContact</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ManageContact Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User phone</th>
                        <th>User Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contactinformations as $contactinformation)
                    <tr>
                        <td width="25%">{{$contactinformation->name}}</td>
                        <td width="25%">{{$contactinformation->email}}</td>
                        <td width="25%">{{$contactinformation->phone}}</td>
                        <td width="25%">{{$contactinformation->message}}</td>
                        
                        <td>
                            <a href="{{route('delete.contactinformation',[$contactinformation->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User phone</th>
                    <th>User Message</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    
@endsection
