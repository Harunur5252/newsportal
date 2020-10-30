@extends('layouts.app')

@section('title')
 ContactAddressSetting
@endsection

@section('content_1')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">ContactAddressSetting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">ContactAddressSetting</li>
            </ol>
        </div><!-- /.col -->
    </div>
@endsection

@section('main_content')

    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">ContactAddressSetting</h3></div>
        <!-- /.card-header -->
        <div class="card-body col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ContactAddress Settings</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'update.ContactAddress','method'=>'post']) !!}
                    <div class="form-group">
                        <label>Contact Address English</label>
                        <textarea name="address_en" class="textarea" required="" placeholder="enter address english" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        	{{$contactaddress->address_en}}
                        </textarea> 
                        <span class="text-danger">{{$errors->has('address_en')?$errors->first('address_en'):''}}</span><br>

                        <label>Contact Address Bangla</label>
                        <textarea name="address_bn" class="textarea" required="" placeholder="enter address bangla" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {{$contactaddress->address_bn}}
                        </textarea> 
                        <span class="text-danger">{{$errors->has('address_bn')?$errors->first('address_bn'):''}}</span><br>

                        <label>Email</label>
                        <input type="text" class="form-control" name="email" required="" value="{{$contactaddress->email}}" placeholder="enter your email">
                        <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                        <input type="hidden" class="form-control" name="id"  value="{{$contactaddress->id}}">
                        <br>
                        <label>Phone English</label>
                        <input type="text" class="form-control" name="phone_en" placeholder="enter your phone english" value="{{$contactaddress->phone_en}}">
                        <span class="text-danger">{{$errors->has('phone_en')?$errors->first('phone_en'):''}}</span>
                        <br/>
                        <label>Phone Bangla</label>
                        <input type="text" class="form-control" name="phone_bn" placeholder="enter your phone bangla" value="{{$contactaddress->phone_bn}}">
                        <span class="text-danger">{{$errors->has('phone_bn')?$errors->first('phone_bn'):''}}</span>
                        <br/>

                        <label>Telephone English</label>
                        <input type="number" class="form-control" name="telephone_en" placeholder="enter your telephone english" value="{{$contactaddress->telephone_en}}">
                        <span class="text-danger">{{$errors->has('telephone_en')?$errors->first('telephone_en'):''}}</span>
                        <br/>

                        <label>Telephone Bangla</label>
                        <input type="text" class="form-control" name="telephone_bn" placeholder="enter your telephone bangla" value="{{$contactaddress->telephone_bn}}">
                        <span class="text-danger">{{$errors->has('telephone_bn')?$errors->first('telephone_bn'):''}}</span>
                        <br/>

                        <label>Fax English</label>
                        <input type="number" class="form-control" name="fax_en" placeholder="enter your fax english" value="{{$contactaddress->fax_en}}">
                        <span class="text-danger">{{$errors->has('fax_en')?$errors->first('fax_en'):''}}</span>
                        <br/>

                        <label>Fax Bangla</label>
                        <input type="text" class="form-control" name="fax_bn" placeholder="enter your fax bangla" value="{{$contactaddress->fax_bn}}">
                        <span class="text-danger">{{$errors->has('fax_bn')?$errors->first('fax_bn'):''}}</span>
                        <br/>
                        
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
