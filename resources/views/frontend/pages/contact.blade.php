@extends('layouts.front')

@section('title')
  @if(Session()->get('lang') == 'english')
   Contact Us
  @else
   আমাদের সাথে যোগাযোগ করুন
  @endif
@endsection

@section('content')
		<div class="container">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-5 col-sm-5">
						@php
						 $logo   = DB::table('logos')->first();
						@endphp
						<div class="foot-logo">
							<img src="{{asset($logo->logo)}}" style="height: 80px; width: 150px;" />
						</div>
						<br/>
						@if(session()->get('lang')== 'english')
						<h3><b>Contact Address</b></h3>
						
						@else
						<h3><b>যোগাযোগের ঠিকানা</b></h3>
						
						@endif
					@php
					 $contactaddress = DB::table('contact_address')->first();
					@endphp
					<div class="editor-one">
						@if(session()->get('lang')== 'english')
						  <span>{{$contactaddress->address_en}}.</span><br/>
						  <span>Fax:+{{$contactaddress->fax_en}},</span>
						  <span>Phone:{{$contactaddress->phone_en}}</span><br/>
						  <span>Email:{{$contactaddress->email}}</span>
						  
						@else
						  <span>{{$contactaddress->address_bn}}.</span><br/>
						  <span>ফ্যাক্স:+{{$contactaddress->fax_bn}},</span>
						  <span>ফোন:{{$contactaddress->phone_bn}}</span><br/>
						  <span>ইমেল:{{$contactaddress->email}}</span>
						@endif
					</div>
					</div>
				 @if(session()->get('lang')== 'english')
					<div class="col-md-7 col-sm-7">
						{!! Form::open(['route' => 'store.information','method'=>'post']) !!}
						  <div class="form-group">
						    <label for="exampleInputName">Your Name</label>
						    <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby="Name" placeholder="enter your name" required="">
						    <span class="text-danger"> {{$errors->has('name')?$errors->first('name'):''}}</span>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="enter your email" required="">
						    <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPhone">Phone Number</label>
						    <input type="number" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="Phone" placeholder="enter phone number" required="">
						    <span class="text-danger">{{$errors->has('phone')?$errors->first('phone'):''}}</span>
						  </div>
						  <div class="form-group">
						    <label for="exampleInput">What to know or want to know</label>
						    <textarea class="form-control" cols="5" rows="5" name="message" placeholder="write your message" required="">
						    	
						    </textarea>
						    <span class="text-danger">{{$errors->has('message')?$errors->first('message'):''}}</span>
						  </div>
						  <div class="form-group">
						  	<button type="submit" class="btn btn-success btn-sm btn-block">Submit</button>
						  </div>
						  
					{!! Form::close() !!}
					</div>
				 @else
				 	 <div class="col-md-7 col-sm-7">
						{!! Form::open(['route' => 'store.information','method'=>'post']) !!}
						  <div class="form-group">
						    <label for="exampleInputName">আপনার নাম</label>
						    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="Name" placeholder="আপনার নাম প্রবেশ করান" required="">
						    <span class="text-danger">{{$errors->has('name')?$errors->first('name'):''}}</span>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">ইমেইল</label>
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="আপনার ইমেইল প্রবেশ করান" required="">
						    <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPhone">মোবাইল নম্বর</label>
						    <input type="number" name="phone" class="form-control" id="exampleInputPhone" aria-describedby="Phone" placeholder="মোবাইল নম্বর প্রবেশ করান" required="">
						    <span class="text-danger">{{$errors->has('phone')?$errors->first('phone'):''}}</span>
						  </div>
						  <div class="form-group">
						    <label for="exampleInput">কি জানতে চান বা জানাতে চান</label>
						    <textarea class="textarea" name="message" placeholder="আপনার বার্তা লিখুন" required="" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
						    	
						    </textarea>
						    <span class="text-danger">{{$errors->has('message')?$errors->first('message'):''}}</span>
						  </div>
						  <div class="form-group">
						  	<button type="submit" class="btn btn-success btn-sm btn-block">প্রেরন করুন</button>
						  </div> 
					{!! Form::close() !!}
					</div>
				 @endif
				</div>
			</div>
		</div>

@endsection