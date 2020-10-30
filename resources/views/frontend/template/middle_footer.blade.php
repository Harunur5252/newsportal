	<!-- middle-footer-start -->	
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					@php
					 $contactaddress = DB::table('contact_address')->first();
					@endphp
					<div class="editor-one">
						@if(session()->get('lang')== 'english')
						  <p><b>Address : </b>{{$contactaddress->address_en}}</p>
						  <p><b>Email : </b>{{$contactaddress->email}}</p>
						  <p><b>Phone Number : </b>{{$contactaddress->phone_en}}</p>
						  <p><b>Telephone Number : </b>{{$contactaddress->telephone_en}}</p>
						  <p><b>Fax Number : </b>{{$contactaddress->fax_en}}</p>
						@else
						  <p><b>ঠিকানা :</b> {{$contactaddress->address_bn}}</p>
						  <p><b>ইমেল : </b>{{$contactaddress->email}}</p>
						  <p><b>ফোন নম্বর :</b> {{$contactaddress->phone_bn}}</p>
						  <p><b>টেলিফোন নম্বর : </b>{{$contactaddress->telephone_bn}}</p>
						  <p><b>ফ্যাক্স নম্বর : </b>{{$contactaddress->fax_bn}}</p>
						@endif
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
				   @php
	                  $categories = DB::table('categories')->orderBy('id','asc')->get();
	   
	               @endphp
	               @if(session()->get('lang')== 'english')
					<div class="editor-two">
						
					 @foreach($categories as $category)
                       <a href="{{url('post/'.$category->id.'/'.$category->category_en)}}">
                       	<span>{{$category->category_en}}</span><br/>
                       </a>
                     @endforeach
					</div>
				  @else
				  <div class="editor-two">
						
					 @foreach($categories as $category)
                       <a href="{{url('post/'.$category->id.'/'.$category->category_bn)}}">
                       	<span>{{$category->category_bn}}</span><br/>
                       </a>
                     @endforeach
					</div>
				  @endif
				</div>

				<div class="col-md-3 col-sm-3">
					@php
					 $contactaddress = DB::table('contact_address')->first();
					@endphp
					<div class="editor-one">
						@if(session()->get('lang')== 'english')
						  <a href="{{route('privacy.policy')}}">
						  	<p>Privacy & Policy</p>
						  </a>
						  <a href="{{route('terms.condition')}}">
						  	<p>Terms & Condition</p>
						  </a>
						@else
						 <a href="{{route('privacy.policy')}}">
						  	<p>গোপনীয়তা ও নীতি</p>
						  </a>
						  <a href="{{route('terms.condition')}}">
						  	<p>শর্তাবলী</p>
						  </a>
						@endif
					</div>
				</div>

				<div class="col-md-3 col-sm-3">
					<div class="editor-three">
					 @if(session()->get('lang')== 'english')
						<p>Our Newsletter</p> 
						<p align="justify">To stay on top of the ever-changing world of business, subscribe now to our newsletters.</p> 

						{!! Form::open(['route' => 'store.newslatter','method'=>'post','class'=>'form-group']) !!}
						  <div class="form-group mx-sm-3 mb-2">
						    
						    <input type="email" name="email1" class="form-control" id="inputPassword2" placeholder="Your Email Address" required="">
						     <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
						     <br/>
						    <small>* We hate spam as much as you do</small>
						  </div>
						  <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
						{!! Form::close() !!}
					@else

					<p>আমাদের নিউজলেটার</p> 
						<p align="justify">ব্যবসার সর্বদা পরিবর্তনশীল বিশ্বের শীর্ষে থাকতে, এখনই আমাদের নিউজলেটারে সাবস্ক্রাইব করুন।</p> 
                         {!! Form::open(['route' => 'store.newslatter','method'=>'post','class'=>'form-group']) !!}
						
						  <div class="form-group mx-sm-3 mb-2">
						    
						    <input type="email" name="email1" class="form-control" id="inputPassword2" placeholder="আপনার ইমেইল ঠিকানা" required="">
						     <span class="text-danger">{{$errors->has('email')?$errors->first('email'):''}}</span>
						     <br/>
						    <small>* আমরা স্প্যামকে যতটা ঘৃণা করি</small>
						  </div>
						  <button type="submit" class="btn btn-primary mb-2">সাবস্ক্রাইব </button>
						{!! Form::close() !!}
					@endif
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.middle-footer-close -->

