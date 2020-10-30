@extends('layouts.app')

@section('title')
    EditSuDistrict
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">EditSuDistrict</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">EditSuDistrict</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">SubDistrict Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update New SubDistrict</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.subdistrict','method'=>'post','name'=>'form']) !!}
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
                        <input type="text" class="form-control" name="subdistrict_en" id="english" value="{{$subdistrict->subdistrict_en}}" aria-describedby="emailHelp" placeholder="subdistrict_english">
                        <input type="hidden" class="form-control" name="id"  value="{{$subdistrict->id}}">
                        <span class="text-danger">{{$errors->has('subdistrict_en')?$errors->first('subdistrict_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">SubDistrict Name Bangla</label>
                        <input type="text" class="form-control" name="subdistrict_bn" id="bangla" value="{{$subdistrict->subdistrict_bn}}"placeholder="subdistrict_bangla">
                        <span class="text-danger">{{$errors->has('subdistrict_bn')?$errors->first('subdistrict_bn'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        document.forms['form'].elements['district_id'].value = '{{$subdistrict->district_id}}';
    </script>

@endsection
