
@extends('layouts.front')

@section('title')
  @if(Session()->get('lang') == 'english')
   User Registration
  @else
    ইউসার  রেজিস্ট্রেশন  
  @endif
@endsection

@section('content')

 <div class="container">
     <div class="row">
         <h2>User Registration</h2>
         <br/>
         <div class="offset-3 col-md-6">
             {!! Form::open(['route' => 'user.register','method'=>'post']) !!}
                  <div class="form-group">
                    <label >User Name English</label>
                    <input type="text" class="form-control" name="name_en"  aria-describedby="emailHelp" placeholder="enter name english">
                    <span class="text-danger">{{$errors->has('name_en')?$errors->first('name_en'):''}}</span>
                  </div>
                  <div class="form-group">
                    <label >User Name Bangla</label>
                    <input type="text" name="name_bn" class="form-control"  placeholder="enter name bangla">
                    <span class="text-danger">{{$errors->has('name_bn')?$errors->first('name_bn'):''}}</span>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="enter email">
                    <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="enter password">
                    <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="enter confirm password">
                    <span class="text-danger">{{$errors->has('password_confirmation')?$errors->first('password_confirmation'):''}}</span>
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm btn-block">Register</button>
             {!! Form::close() !!}
         </div>
     </div>
 </div>
@endsection