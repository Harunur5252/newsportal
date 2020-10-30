@extends('layouts.app')

@section('title')
     Ads
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ads</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Ads</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ads Table</h3>
            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add Ads</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ads</th>
                        <th>type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ads as $add)
                    <tr>
                        <td>
                             @if($add->type == 2)
                               <img src="{{asset($add->ads)}}" style="height: 70px; width: 300px;">
                            @else
                               <img src="{{asset($add->ads)}}" style="height: 70px; width: 80px;">
                            @endif
                           
                        </td>
                        <td>
                            @if($add->type == 2)
                              <span class="badge badge-primary">Horizontal</span>
                            @else
                              <span class="badge badge-success">Vertical</span>
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{route('edit.ads',[$add->id])}}" class="btn btn-info"><i class="fa fa-edit text-white" title="edit"></i></a>
                            <a href="{{route('delete.ads',[$add->id])}}" class="btn btn-danger" id="delete"><i class="fa fa-trash text-white" title="delete"></i></a>
                        
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Ads</th>
                    <th>type</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adds</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'store.ads','method'=>'post','id'=>'categoryform','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="english">Ads Link</label>
                            <input type="text" class="form-control" name="link" id="english" aria-describedby="emailHelp" required="" placeholder="ads_link">
                            <span class="text-danger">{{$errors->has('link')?$errors->first('link'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label>Ads</label>
                            <input type="file" class="form-control" name="ads" accept="image/*" onchange="readURL(this);">
                            <span class="text-danger">{{$errors->has('ads')?$errors->first('ads'):''}}</span>
                            <br/>
                            <img src="" id="one">
                        </div>
                         <div class="form-group">
                            <label>Type</label>
                            <select class="form-control" name="type">
                                <option selected="" disabled="">--slelct type--</option>
                                <option value="2">Horizontal</option>
                                <option value="1">Vertical</option>
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

  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
