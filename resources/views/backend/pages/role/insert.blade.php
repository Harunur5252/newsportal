@extends('layouts.app')

@section('title')
    All Role
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Role</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">All Role</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Role Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name_en}}|{{$role->name_bn}}</td>
                        <td>
                        	@if($role->category == 1)
                        	  <span class="badge badge-success">Category</span>
                        	@else
                        	@endif

                        	@if($role->subcategory == 1)
                        	  <span class="badge badge-success">SubCategory</span>
                        	@else
                        	@endif

                        	@if($role->district == 1)
                        	  <span class="badge badge-success">Dsitrict</span>
                        	@else
                        	@endif

                        	@if($role->subdistrict == 1)
                        	  <span class="badge badge-success">SubDsitrict</span>
                        	@else
                        	@endif

                        	@if($role->post == 1)
                        	  <span class="badge badge-success">Post</span>
                        	@else
                        	@endif

                        	@if($role->logo == 1)
                        	  <span class="badge badge-success">Logo</span>
                        	@else
                        	@endif

                        	@if($role->social == 1)
                        	  <span class="badge badge-success">Social</span>
                        	@else
                        	@endif

                        	@if($role->facebook == 1)
                        	  <span class="badge badge-success">Facebook Page</span>
                        	@else
                        	@endif

                        	@if($role->seo == 1)
                        	  <span class="badge badge-success">Seo</span>
                        	@else
                        	@endif

                        	@if($role->prayer == 1)
                        	  <span class="badge badge-success">Prayer Time</span>
                        	@else
                        	@endif

                        	@if($role->livetv == 1)
                        	  <span class="badge badge-success">Livetv</span>
                        	@else
                        	@endif

                        	@if($role->breakingnews == 1)
                        	  <span class="badge badge-success">Breakingnews</span>
                        	@else
                        	@endif

                        	@if($role->ads == 1)
                        	  <span class="badge badge-success">Ads</span>
                        	@else
                        	@endif

                        	@if($role->notice == 1)
                        	  <span class="badge badge-success">Notice</span>
                        	@else
                        	@endif

                        	@if($role->contactaddress == 1)
                        	  <span class="badge badge-success">ContactAddress</span>
                        	@else
                        	@endif

                        	@if($role->importantwebsite == 1)
                        	  <span class="badge badge-success">ImportantWebsite</span>
                        	@else
                        	@endif

                        	@if($role->photogallery == 1)
                        	  <span class="badge badge-success">PhotoGallery</span>
                        	@else
                        	@endif

                        	@if($role->videogallery == 1)
                        	  <span class="badge badge-success">VideoGallery</span>
                        	@else
                        	@endif

                        	@if($role->contactinformation == 1)
                        	  <span class="badge badge-success">ContactInformation</span>
                        	@else
                        	@endif

                        	@if($role->role == 1)
                        	  <span class="badge badge-success">Role</span>
                        	@else
                        	@endif

                            @if($role->newslatter == 1)
                              <span class="badge badge-success">Newslatter</span>
                            @else
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{route('edit.role',[$role->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.role',[$role->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


    
@endsection
