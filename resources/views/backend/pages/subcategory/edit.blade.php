@extends('layouts.app')

@section('title')
    EditSuCategory
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">EditSuCategory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">EditSuCategory</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">SubCategory Table</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update New SubCategory</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.subcategory','method'=>'post','name'=>'form']) !!}
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
                        <label for="english">Category Name English</label>
                        <input type="text" class="form-control" name="subcategory_en" id="english" value="{{$subcategory->subcategory_en}}" aria-describedby="emailHelp" placeholder="subcategory_english">
                        <input type="hidden" class="form-control" name="id"  value="{{$subcategory->id}}">
                        <span class="text-danger">{{$errors->has('subcategory_en')?$errors->first('subcategory_en'):''}}</span>
                    </div>
                    <div class="form-group">
                        <label for="bangla">Category Name Bangla</label>
                        <input type="text" class="form-control" name="subcategory_bn" id="bangla" value="{{$subcategory->subcategory_bn}}"placeholder="subcategory_bangla">
                        <span class="text-danger">{{$errors->has('subcategory_bn')?$errors->first('subcategory_bn'):''}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

<script>
    document.forms['form'].elements['category_id'].value = '{{$subcategory->category_id}}';
</script>

@endsection
