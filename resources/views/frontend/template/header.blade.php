    
	@php
	   $categories = DB::table('categories')->orderBy('id','asc')->get();
	   $social = DB::table('socials')->first();
	   $logo   = DB::table('logos')->first();
	@endphp
	
	
	<!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">			
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo">
						<a href="{{route('/')}}"><img src="{{asset($logo->logo)}}"></a> 
					</div>
				</div>              
				<div class="col-xs-6 col-md-8 col-sm-8">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collection of nav links and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse">
									<ul class="nav navbar-nav">
							           @foreach($categories as $category)
									   @php
	                                       $subcategories = DB::table('subcategories')->where('category_id',$category->id)->get();
	                                   @endphp
										<li class="dropdown">
										@if(Session()->get('lang')=='english')
											<a  href="{{url('post/'.$category->id.'/'.$category->category_en)}}" class="dropdown-toggle" data-toggle="dropdown">
												@if(Session()->get('lang')=='english')
													{{$category->category_en}}
												@else
													{{$category->category_bn}}
												@endif
											</a>
										@else
											<a  href="{{url('post/'.$category->id.'/'.$category->category_bn)}}" class="dropdown-toggle" data-toggle="dropdown">
												@if(Session()->get('lang')=='english')
													{{$category->category_en}}
												@else
													{{$category->category_bn}}
												@endif
											 </a>
										@endif
										
											<ul class="dropdown-menu">
											@foreach($subcategories as $subcategory)
												<li>
												  @if(Session()->get('lang')=='english')
													<a href="{{url('posts/'.$subcategory->id.'/'.$subcategory->subcategory_en)}}">
													@if(Session()->get('lang')=='english')
													{{$subcategory->subcategory_en}}
													@else
													{{$subcategory->subcategory_bn}}
													@endif
												   </a>
												  @else
                                                    <a href="{{url('posts/'.$subcategory->id.'/'.$subcategory->subcategory_bn)}}">
													@if(Session()->get('lang')=='english')
													{{$subcategory->subcategory_en}}
													@else
													{{$subcategory->subcategory_bn}}
													@endif
												   </a>
												  @endif
											</li>
											@endforeach
												<li class="divider"></li>
												                          
											</ul>
										</li>
										@endforeach
									</ul>
								</div>
							</nav>											
						</div>
					</div>					
				</div> 
				<div class="col-xs-12 col-md-2 col-sm-12">
					<div class="header-icon">
						<ul>
							<!-- version-start -->
							@if(Session()->get('lang')=='english')
							   <li class="version"><a href="{{route('language.bangla')}}">বাংলা </a></li>
							@else
							   <li class="version"><a href="{{route('language.english')}}">English</a></li>
							@endif
							<!-- login-start -->
							@if(Auth::user())
                             <li>
								<div class="dropdown">
								  <button class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i></button>
								  @if(Session()->get('lang')=='english')
								  <div class="dropdown-content">
									<a href="{{route('user.logout')}}">Logout </a>
								  </div>
								  @else
								  <div class="dropdown-content">
									<a href="{{route('user.logout')}}">লোগোউট </a>
								  </div>
								  @endif
								</div>
							</li>

                     

                     @else

						@if(Session()->get('lang')=='english')
                             <li>
								<div class="dropdown">
								  <button class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									<a href="{{route('login')}}">Login </a>
									<a href="{{route('register')}}">Register </a>
								  </div>
								</div>
							</li>

                          @else
                            <li>
								<div class="dropdown">
								  <button class="dropbtn"><i class="fa fa-user" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									<a href="{{route('login')}}">লগইন </a>
									<a href="{{route('register')}}">রেজিস্টার </a>
								  </div>
								</div>
							</li>
						@endif
                    @endif

							<!-- search-start -->
							<li><div class="search-large-divice">
								<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
									<div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="custom-search-input">
																<form>
																	<div class="input-group">
																		<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																		<span class="input-group-btn">
																		<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																	</span> </div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></li>
							<!-- social-start -->
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
								  @if(Session()->get('lang')=='english')
									<a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="{{$social->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="{{$social->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
									<a href="{{$social->linkedin}}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></i> Linkedin  </a>
								  @else
								    <a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> ফেইসবুক </a>
									<a href="{{$social->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> টুইটার </a>
									<a href="{{$social->youtube}}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> ইউটুব </a>
									<a href="{{$social->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> ইনস্টাগ্রাম </a>
									<a href="{{$social->linkedin}}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></i> লিঙ্কেডিন  </a>
								  @endif
								  
								  </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>


</section><!-- /.header-close -->