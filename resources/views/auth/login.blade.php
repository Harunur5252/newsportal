
@extends('layouts.front')

@section('title')
  @if(Session()->get('lang') == 'english')
   User Login
  @else
    ইউসার  লগইন 
  @endif
@endsection

@section('content')

 <div class="container">
     <div class="row">
         <div class="offset-3 col-md-6">
            <h2 class="text-center">User Login</h2>
            {!! Form::open(['route' => 'login','method'=>'post']) !!}
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="enter email">
                    <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="enter password">
                    <span class="text-danger">{{$errors->has('password')?$errors->first('password'):''}}</span>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1" >
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                  </div>
                  <!-- <div class="form-group form-check">
                    <a href="{{route('password.request')}}">Forget Your Password?</a>
                  </div> -->
                  
                  <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>

              {!! Form::close() !!}
         </div>
         
     </div>
 </div>
@endsection



