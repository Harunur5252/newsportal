@extends('layouts.front')

@section('title')
  @if(Session()->get('lang') == 'english')
   Home
  @else
   হোম 
  @endif
@endsection

@section('content')

@php
 $firstsectionBig    = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
 $firstsectionSmalls = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();

@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- 1st-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>

						<!-- @php
                           $slug =  preg_replace('/\s+/u','-',trim($firstsectionBig->title_bn));
						@endphp -->
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
								<div class="service-img">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$firstsectionBig->id.'/'.$firstsectionBig->slug_en)}}">
										<img src="{{asset($firstsectionBig->image)}}" alt="nothing found">
									</a>
									@else
                                      <a href="{{url('view-post/'.$firstsectionBig->id.'/'.$firstsectionBig->slug_bn)}}">
										<img src="{{asset($firstsectionBig->image)}}" alt="nothing found">
									 </a>
									@endif
								</div>
								<div class="content">
								<h4 class="lead-heading-01">
								@if(Session()->get('lang') == 'english')
								   <a href="{{url('view-post/'.$firstsectionBig->id.'/'.$firstsectionBig->slug_en)}}">
									@if(Session()->get('lang') == 'english')
									  {{$firstsectionBig->title_en}}
									@else
									  {{$firstsectionBig->title_bn}}
									@endif
								</a> 
								@else
                                   <a href="{{url('view-post/'.$firstsectionBig->id.'/'.$firstsectionBig->slug_bn)}}">
									@if(Session()->get('lang') == 'english')
									  {{$firstsectionBig->title_en}}
									@else
									  {{$firstsectionBig->title_bn}}
									@endif
								</a> 

								@endif
							 </h4>
								</div>
							</div>
						</div>
						
					</div>
						<div class="row">
								
						  @foreach($firstsectionSmalls as $firstsectionSmall)
						 
							<div class="col-md-3 col-sm-3" style="border:1px solid green;padding: 3px;">
								<div class="top-news">
                                @if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$firstsectionSmall->id.'/'.$firstsectionSmall->slug_en)}}"><img src="{{asset($firstsectionSmall->image)}}"  alt="nthing found">
									</a>
                                @else
                                <a href="{{url('view-post/'.$firstsectionSmall->id.'/'.$firstsectionSmall->slug_bn)}}"><img src="{{asset($firstsectionSmall->image)}}" alt="কিসুই পাওয়া যায়নি ">
									</a>
                                @endif
									<h4 class="heading-02" style="height: 80px;">
									@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$firstsectionSmall->id.'/'.$firstsectionSmall->slug_en)}}">

										@if(Session()->get('lang') == 'english')
									      {{$firstsectionSmall->title_en}}
									    @else
									      {{$firstsectionSmall->title_bn}}
									    @endif
									@else
                                        <a href="{{url('view-post/'.$firstsectionSmall->id.'/'.$firstsectionSmall->slug_bn)}}">

										@if(Session()->get('lang') == 'english')
									      {{$firstsectionSmall->title_en}}
									    @else
									      {{$firstsectionSmall->title_bn}}
									    @endif

									@endif
									</a> 
								</h4>
								</div>
							</div>
						 @endforeach
					</div>
					<br/>
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							 @php
                                  $horizontal2 = DB::table('ads')->where('type',2)->skip(1)->first();
                             @endphp
							<div class="sidebar-add">
								@if($horizontal2 == null)
								 
								@else
                                  <a href="{{$horizontal2->link}}" target="_blank">
                                  	<img src="{{asset($horizontal2->ads)}}" alt="$horizontal2->link"/>
                                  </a>
								@endif
							</div>
						</div>
					</div><!-- /.add-close -->	
					
					@php
					 $category = DB::table('categories')->first();
					 $categoryPostBig = DB::table('posts')->Where('cat_id',$category->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
					 $categoryPostSmalls = DB::table('posts')->Where('cat_id',$category->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
					@endphp
					<!-- news-start -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
								  @if(Session()->get('lang') == 'english')
										<a href="{{url('post/'.$category->id.'/'.$category->category_en)}}">

										@if(Session()->get('lang') == 'english')
									      {{$category->category_en}}
									    @else
									      {{$category->category_bn}}
									    @endif

										<span>

										@if(Session()->get('lang') == 'english')
									      More
									    @else
									      আরও
									    @endif

											<i class="fa fa-angle-double-right" aria-hidden="true"></i>
										</span>
									  </a>
								  @else
									  <a href="{{url('post/'.$category->id.'/'.$category->category_bn)}}">

										@if(Session()->get('lang') == 'english')
									      {{$category->category_en}}
									    @else
									      {{$category->category_bn}}
									    @endif

										<span>

										@if(Session()->get('lang') == 'english')
									      More
									    @else
									      আরও
									    @endif

											<i class="fa fa-angle-double-right" aria-hidden="true"></i>
										</span>
									  </a>
								  @endif
								</div>

							
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
										@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryPostBig->id.'/'.$categoryPostBig->slug_en)}}">
											 <img src="{{asset($categoryPostBig->image)}}" alt="Notebook">
										    </a>
										   @else
                                             <a href="{{url('view-post/'.$categoryPostBig->id.'/'.$categoryPostBig->slug_bn)}}">
											 <img src="{{asset($categoryPostBig->image)}}" alt="Notebook">
										    </a>

										   @endif
											<h4 class="heading-02">
											 @if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categoryPostBig->id.'/'.$categoryPostBig->slug_en)}}">

												@if(Session()->get('lang') == 'english')
								                   {{$categoryPostBig->title_en}}
								                 @else
								                   {{$categoryPostBig->title_bn}}
								                 @endif
											  </a> 
											@else
                                               <a href="{{url('view-post/'.$categoryPostBig->id.'/'.$categoryPostBig->slug_bn)}}">
												@if(Session()->get('lang') == 'english')
								                   {{$categoryPostBig->title_en}}
								                 @else
								                   {{$categoryPostBig->title_bn}}
								                 @endif
											  </a> 

											@endif
										</h4>
										</div>
									</div>

									@foreach($categoryPostSmalls as $categoryPostSmall)

									<div class="col-md-6 col-sm-6">
										<div class="image-title">
										  @if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryPostSmall->id.'/'.$categoryPostSmall->slug_en)}}">
											 <img src="{{asset($categoryPostSmall->image)}}" alt="Notebook">
											</a>
										  @else
											<a href="{{url('view-post/'.$categoryPostSmall->id.'/'.$categoryPostSmall->slug_bn)}}">
											 <img src="{{asset($categoryPostSmall->image)}}" alt="Notebook">
											</a>
										   @endif
											<h4 class="heading-03">
										   @if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryPostSmall->id.'/'.$categoryPostSmall->slug_en)}}">
												@if(Session()->get('lang') == 'english')
								                   {{$categoryPostSmall->title_en}}
								                 @else
								                   {{$categoryPostSmall->title_bn}}
								                 @endif
											 </a> 
											@else
                                                <a href="{{url('view-post/'.$categoryPostSmall->id.'/'.$categoryPostSmall->slug_bn)}}">
												@if(Session()->get('lang') == 'english')
								                   {{$categoryPostSmall->title_en}}
								                 @else
								                   {{$categoryPostSmall->title_bn}}
								                 @endif
											 </a> 

											@endif
										</h4>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					@php
					 $categorySecond = DB::table('categories')->skip(1)->first();
					 $categorySecondPostBig = DB::table('posts')->Where('cat_id',$categorySecond->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
					 $categorySecondPostSmalls = DB::table('posts')->Where('cat_id',$categorySecond->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
					@endphp
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
								 @if(Session()->get('lang') == 'english')
										<a href="{{url('post/'.$categorySecond->id.'/'.$categorySecond->category_en)}}">

										@if(Session()->get('lang') == 'english')
									      {{$categorySecond->category_en}}
									    @else
									      {{$categorySecond->category_bn}}
									    @endif
										<span>
	                                     @if(Session()->get('lang') == 'english')
									      More
									     @else
									       আরও 
									     @endif
											<i class="fa fa-angle-double-right" aria-hidden="true">
												
											</i>
										</span>
									  </a>
								@else
									<a href="{{url('post/'.$categorySecond->id.'/'.$categorySecond->category_bn)}}">

										@if(Session()->get('lang') == 'english')
									      {{$categorySecond->category_en}}
									    @else
									      {{$categorySecond->category_bn}}
									    @endif
										<span>
	                                     @if(Session()->get('lang') == 'english')
									      More
									     @else
									       আরও 
									     @endif
											<i class="fa fa-angle-double-right" aria-hidden="true">
												
											</i>
										</span>
									  </a>
								@endif
							</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
										  @if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categorySecondPostBig->id.'/'.$categorySecondPostBig->slug_en)}}">
												<img src="{{asset($categorySecondPostBig->image)}}" alt="Notebook">
											</a>
										  @else
											  <a href="{{url('view-post/'.$categorySecondPostBig->id.'/'.$categorySecondPostBig->slug_bn)}}">
													<img src="{{asset($categorySecondPostBig->image)}}" alt="Notebook">
												</a>
										  @endif
											<h4 class="heading-02">
										  @if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categorySecondPostBig->id.'/'.$categorySecondPostBig->slug_en)}}">
												 @if(Session()->get('lang') == 'english')
									               {{$categorySecondPostBig->title_en}}
									             @else
									               {{$categorySecondPostBig->title_bn}}
									             @endif
												</a> 
										 @else
                                             <a href="{{url('view-post/'.$categorySecondPostBig->id.'/'.$categorySecondPostBig->slug_bn)}}">
											 @if(Session()->get('lang') == 'english')
								               {{$categorySecondPostBig->title_en}}
								             @else
								               {{$categorySecondPostBig->title_bn}}
								             @endif
											</a> 
										 @endif
										</h4>
										</div>
									</div>
									@foreach($categorySecondPostSmalls as $categorySecondPostSmall)
									<div class="col-md-6 col-sm-6">
										<div class="image-title">
										 @if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categorySecondPostSmall->id.'/'.$categorySecondPostSmall->slug_en)}}">
												<img src="{{asset($categorySecondPostSmall->image)}}" alt="Notebook">
											</a>
										  @else
											  <a href="{{url('view-post/'.$categorySecondPostSmall->id.'/'.$categorySecondPostSmall->slug_bn)}}">
													<img src="{{asset($categorySecondPostSmall->image)}}" alt="Notebook">
												</a>
										  @endif
											<h4 class="heading-03">
										@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categorySecondPostSmall->id.'/'.$categorySecondPostSmall->slug_en)}}">

											 @if(Session()->get('lang') == 'english')
								               {{$categorySecondPostSmall->title_en}}
								             @else
								               {{$categorySecondPostSmall->title_bn}}
								             @endif
											</a> 
										 @else
										 <a href="{{url('view-post/'.$categorySecondPostSmall->id.'/'.$categorySecondPostSmall->slug_bn)}}">

											 @if(Session()->get('lang') == 'english')
								               {{$categorySecondPostSmall->title_en}}
								             @else
								               {{$categorySecondPostSmall->title_bn}}
								             @endif
											</a> 
										 @endif
										</h4>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						    @php
							 $vertical4 = DB::table('ads')->where('type',1)->skip(3)->first();
							@endphp
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<a href="{{$vertical4->link}}" target="_blank">
								  <img src="{{asset($vertical4->ads)}}" alt="$vertical4->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->	
					
					@php
					 $tv = DB::table('livetv')->first();
					@endphp

					@if($tv->status==1)
						<!-- youtube-live-start -->	
						<div class="cetagory-title-03">
						@if(session()->get('lang')== 'english')
						  Live Tv
						@else
						  লাইভ টিভি 
						@endif
						</div>
						<div class="photo">
							<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
							  {{!! $tv->embed_code !!}}
							</div>
						</div><!-- /.youtube-live-close -->	
					@endif
					<!-- facebook-page-start -->
					<div class="cetagory-title-03">
						@if(session()->get('lang')== 'english')
						  We're on Facebook
						@else
						  ফেসবুকে আমরা
						@endif
				    </div>
					<div class="fb-root">
						@php
						  $facebookpage = DB::table('facebookpages')->first();
						@endphp
						@if($facebookpage->status == 1)
						<div class="fb-page" data-href="{{$facebookpage->facebookpage_link}}" data-tabs="timeline" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{$facebookpage->facebookpage_link}}" class="fb-xfbml-parse-ignore"><a href="{{$facebookpage->facebookpage_link}}">somoynews.tv</a></blockquote></div>
						<div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="sw1qk1RY"></script>

                        <br/>

						<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fsomoynews.tv&width=450&layout=standard&action=like&size=small&share=true&height=35&appId" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
						@endif
					</div><!-- /.facebook-page-close -->	
					<br/>
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
							 $vertical1 = DB::table('ads')->where('type',1)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical1->link}}" target="_blank">
								  <img src="{{asset($vertical1->ads)}}" alt="$vertical1->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->
                     <br/><br/>
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
							 $vertical2 = DB::table('ads')->where('type',1)->skip(1)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical2->link}}" target="_blank">
								  <img src="{{asset($vertical2->ads)}}" alt="$vertical2->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->
                    <br/><br/>
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
							 $vertical3 = DB::table('ads')->where('type',1)->skip(2)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical3->link}}" target="_blank">
								  <img src="{{asset($vertical3->ads)}}" alt="$vertical3->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->	
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

     <br/>                  
	<!-- add-start -->	
	<div class="row">
		<div class="col-md-12 col-sm-12">
			@php
			 $horizontal5 = DB::table('ads')->where('type',2)->skip(5)->first();
			@endphp
			<div class="sidebar-add">
				<a href="{{$horizontal5->link}}" target="_blank">
				  <img src="{{asset($horizontal5->ads)}}" alt="$horizontal5->link" />
				</a>
			</div>
		</div>
	</div><!-- /.add-close -->
    @php
	 $categoryThird = DB::table('categories')->skip(2)->first();
	 $categoryThirdPostBig = DB::table('posts')->Where('cat_id',$categoryThird->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
	 $categoryThirdPostSmalls = DB::table('posts')->Where('cat_id',$categoryThird->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
	@endphp

	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02">
						@if(Session()->get('lang') == 'english')
							
							@if(Session()->get('lang') == 'english')
							    {{$categoryThird->category_en}}
							 @else
								{{$categoryThird->category_bn}}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true">
									
								</i> 
							  <a href="{{url('post/'.$categoryThird->id.'/'.$categoryThird->category_en)}}">
									@if(Session()->get('lang') == 'english')
									    More
									 @else
										আরও
									@endif
								</a>
						  </span>
					    
					   @else
					   
							@if(Session()->get('lang') == 'english')
							    {{$categoryThird->category_en}}
							 @else
								{{$categoryThird->category_bn}}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true">
									
								</i> 
	                            <a href="{{url('post/'.$categoryThird->id.'/'.$categoryThird->category_bn)}}">
									@if(Session()->get('lang') == 'english')
									    More
									 @else
										আরও
									@endif
								</a>
						  </span>
					    
					   @endif
				     </div>

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
								  @if(Session()->get('lang') == 'english')
									  <a href="{{url('view-post/'.$categoryThirdPostBig->id.'/'.$categoryThirdPostBig->slug_en)}}">
										<img src="{{asset($categoryThirdPostBig->image)}}" alt="{{$categoryThird->category_en}}" style="height: 200px;">
									   </a>
									@else
									  <a href="{{url('view-post/'.$categoryThirdPostBig->id.'/'.$categoryThirdPostBig->slug_bn)}}">
										<img src="{{asset($categoryThirdPostBig->image)}}" alt="{{$categoryThird->category_bn}}" style="height: 200px;">
									   </a>
									@endif
									<h4 class="heading-02">
								 @if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categoryThirdPostBig->id.'/'.$categoryThirdPostBig->slug_en)}}">

										@if(Session()->get('lang') == 'english')
								          {{$categoryThirdPostBig->title_en}}
								        @else
									      {{$categoryThirdPostBig->title_bn}}
								        @endif
								    </a> 
								  @else
                                      <a href="{{url('view-post/'.$categoryThirdPostBig->id.'/'.$categoryThirdPostBig->slug_bn)}}">

										@if(Session()->get('lang') == 'english')
								          {{$categoryThirdPostBig->title_en}}
								        @else
									      {{$categoryThirdPostBig->title_bn}}
								        @endif
								    </a> 
								  @endif
							      </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($categoryThirdPostSmalls as $categoryThirdPostSmall)
								<div class="image-title">
								@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categoryThirdPostSmall->id.'/'.$categoryThirdPostSmall->slug_en)}}">
										<img src="{{asset($categoryThirdPostSmall->image)}}" alt="{{$categoryThirdPostSmall->title_en}}">
									</a>
								@else
								<a href="{{url('view-post/'.$categoryThirdPostSmall->id.'/'.$categoryThirdPostSmall->slug_bn)}}">
										<img src="{{asset($categoryThirdPostSmall->image)}}" alt="{{$categoryThirdPostSmall->title_bn}}">
									</a>
								@endif
									<h4 class="heading-03">
									@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$categoryThirdPostSmall->id.'/'.$categoryThirdPostSmall->slug_en)}}">

											@if(Session()->get('lang') == 'english')
									          {{$categoryThirdPostSmall->title_en}}
									        @else
										      {{$categoryThirdPostSmall->title_bn}}
									        @endif
								       </a>
								    @else
								    <a href="{{url('view-post/'.$categoryThirdPostSmall->id.'/'.$categoryThirdPostSmall->slug_bn)}}">
											@if(Session()->get('lang') == 'english')
									          {{$categoryThirdPostSmall->title_en}}
									        @else
										      {{$categoryThirdPostSmall->title_bn}}
									        @endif
								       </a>
								    @endif
								 </h4>
								</div>
								
								@endforeach
							</div>
						</div>
					</div>
				</div>

				 @php
				 $categoryFour = DB::table('categories')->skip(3)->first();
				 $categoryFourdPostBig = DB::table('posts')->Where('cat_id',$categoryFour->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
				 $categoryFourdPostSmalls = DB::table('posts')->Where('cat_id',$categoryFour->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
				@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02">
						@if(Session()->get('lang') == 'english')
							<a href="{{url('post/'.$categoryFour->id.'/'.$categoryFour->category_en)}}">
							@if(Session()->get('lang') == 'english')
							    {{$categoryFour->category_en}}
							 @else
								{{$categoryFour->category_bn}}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true"></i> 
							    @if(Session()->get('lang') == 'english')
							      More
							    @else
								  আরও
							    @endif  
						      </span>
						  </a>
						  @else

						  <a href="{{url('post/'.$categoryFour->id.'/'.$categoryFour->category_bn)}}">
							@if(Session()->get('lang') == 'english')
							    {{$categoryFour->category_en}}
							 @else
								{{$categoryFour->category_bn}}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true"></i> 
							    @if(Session()->get('lang') == 'english')
							      More
							    @else
								  আরও
							    @endif  
						      </span>
						  </a>
						  @endif
							</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categoryFourdPostBig->id.'/'.$categoryFourdPostBig->slug_en)}}">
										<img src="{{asset($categoryFourdPostBig->image)}}" alt="nothing found" style="height: 200px;">
									</a>
									@else
									<a href="{{url('view-post/'.$categoryFourdPostBig->id.'/'.$categoryFourdPostBig->slug_bn)}}">
										<img src="{{asset($categoryFourdPostBig->image)}}" alt="nothing found" style="height: 200px;">
									</a>
									@endif

									<h4 class="heading-02">
										@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$categoryFourdPostBig->id.'/'.$categoryFourdPostBig->slug_en)}}">
										@if(Session()->get('lang') == 'english')
								           {{$categoryFourdPostBig->title_en}}
								        @else
									       {{$categoryFourdPostBig->title_bn}}
								        @endif
								    </a> 
								    @else
								    <a href="{{url('view-post/'.$categoryFourdPostBig->id.'/'.$categoryFourdPostBig->slug_bn)}}">
										@if(Session()->get('lang') == 'english')
								           {{$categoryFourdPostBig->title_en}}
								        @else
									       {{$categoryFourdPostBig->title_bn}}
								        @endif
								    </a> 
								    @endif
							       </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($categoryFourdPostSmalls as $categoryFourdPostSmall)
								<div class="image-title">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categoryFourdPostSmall->id.'/'.$categoryFourdPostSmall->slug_en)}}">
										<img src="{{asset($categoryFourdPostSmall->image)}}" alt="Notebook">
									</a>
									@else
									<a href="{{url('view-post/'.$categoryFourdPostSmall->id.'/'.$categoryFourdPostSmall->slug_bn)}}">
										<img src="{{asset($categoryFourdPostSmall->image)}}" alt="Notebook">
									</a>
									@endif
									<h4 class="heading-03">
										@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$categoryFourdPostSmall->id.'/'.$categoryFourdPostSmall->slug_en)}}">

										@if(Session()->get('lang') == 'english')
								           {{$categoryFourdPostSmall->title_en}}
								        @else
									       {{$categoryFourdPostSmall->title_bn}}
								        @endif
								    </a> 
								    @else
								    <a href="{{url('view-post/'.$categoryFourdPostSmall->id.'/'.$categoryFourdPostSmall->slug_bn)}}">

										@if(Session()->get('lang') == 'english')
								           {{$categoryFourdPostSmall->title_en}}
								        @else
									       {{$categoryFourdPostSmall->title_bn}}
								        @endif
								    </a> 
								    @endif

								 </h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>

			     @php
				 $categoryFive = DB::table('categories')->skip(4)->first();
				 $categoryFivedPostBig = DB::table('posts')->Where('cat_id',$categoryFive->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
				 $categoryFivedPostSmalls = DB::table('posts')->Where('cat_id',$categoryFive->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
				@endphp
			<!-- ******* -->
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02">
							@if(Session()->get('lang') == 'english')
							<a href="{{url('post/'.$categoryFive->id.'/'.$categoryFive->category_en)}}">
							@if(Session()->get('lang') == 'english')
							    {{$categoryFive->category_en}}
							 @else
								{{$categoryFive->category_bn}}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true">
								
							</i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true"></i> 
								@if(Session()->get('lang') == 'english')
							      More
							    @else
								  আরও
							    @endif 
							</span>
						   </a>
						   @else
                           <a href="{{url('post/'.$categoryFive->id.'/'.$categoryFive->category_bn)}}">
							@if(Session()->get('lang') == 'english')
							    {{$categoryFive->category_en}}
							 @else
								{{$categoryFive->category_bn}}
							@endif
							<i class="fa fa-angle-right" aria-hidden="true">
								
							</i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true"></i> 
								@if(Session()->get('lang') == 'english')
							      More
							    @else
								  আরও
							    @endif 
							</span>
						   </a>

						   @endif
					     </div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categoryFivedPostBig->id.'/'.$categoryFivedPostBig->slug_en)}}">
										<img src="{{asset($categoryFivedPostBig->image)}}" alt="nothing found" style="height: 200px;">
									</a>
									@else
									<a href="{{url('view-post/'.$categoryFivedPostBig->id.'/'.$categoryFivedPostBig->slug_bn)}}">
										<img src="{{asset($categoryFivedPostBig->image)}}" alt="nothing found" style="height: 200px;">
									</a>
									@endif
									<h4 class="heading-02">
										@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$categoryFivedPostBig->id.'/'.$categoryFivedPostBig->slug_en)}}">
										@if(Session()->get('lang') == 'english')
								           {{$categoryFivedPostBig->title_en}}
								        @else
									       {{$categoryFivedPostBig->title_bn}}
								        @endif
								     </a> 
								@else
                                     <a href="{{url('view-post/'.$categoryFivedPostBig->id.'/'.$categoryFivedPostBig->slug_bn)}}">
										@if(Session()->get('lang') == 'english')
								           {{$categoryFivedPostBig->title_en}}
								        @else
									       {{$categoryFivedPostBig->title_bn}}
								        @endif
								     </a> 
								@endif
							   </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($categoryFivedPostSmalls as $categoryFivedPostSmall)
								<div class="image-title">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categoryFivedPostSmall->id.'/'.$categoryFivedPostSmall->slug_en)}}">
										<img src="{{asset($categoryFivedPostSmall->image)}}" alt="Notebook">
									</a>
									@else
									<a href="{{url('view-post/'.$categoryFivedPostSmall->id.'/'.$categoryFivedPostSmall->slug_bn)}}">
										<img src="{{asset($categoryFivedPostSmall->image)}}" alt="Notebook">
									</a>
									@endif
									<h4 class="heading-03">
										@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$categoryFivedPostSmall->id.'/'.$categoryFivedPostSmall->slug_en)}}">
										@if(Session()->get('lang') == 'english')
								           {{$categoryFivedPostSmall->title_en}}
								        @else
									       {{$categoryFivedPostSmall->title_bn}}
								        @endif
								   </a> 
								   @else
								   <a href="{{url('view-post/'.$categoryFivedPostSmall->id.'/'.$categoryFivedPostSmall->slug_bn)}}">
										@if(Session()->get('lang') == 'english')
								           {{$categoryFivedPostSmall->title_en}}
								        @else
									       {{$categoryFivedPostSmall->title_bn}}
								        @endif
								   </a> 
								   @endif
							     </h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				@php
				 $categorySix = DB::table('categories')->skip(5)->first();
				 $categorySixPostBig = DB::table('posts')->Where('cat_id',$categorySix->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
				 $categorySixPostSmalls = DB::table('posts')->Where('cat_id',$categorySix->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
				@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02">
							@if(Session()->get('lang') == 'english')
							<a href="{{url('post/'.$categorySix->id.'/'.$categorySix->category_en)}}">
							  @if(Session()->get('lang') == 'english')
							    {{$categorySix->category_en}}
							  @else
								{{$categorySix->category_bn}}
							  @endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								 @if(Session()->get('lang') == 'english')
							      More
							    @else
								  আরও
							    @endif   
							  </span>
						     </a>
						     @else
						     <a href="{{url('post/'.$categorySix->id.'/'.$categorySix->category_bn)}}">
							  @if(Session()->get('lang') == 'english')
							    {{$categorySix->category_en}}
							  @else
								{{$categorySix->category_bn}}
							  @endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> 
							<span>
								<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								 @if(Session()->get('lang') == 'english')
							      More
							    @else
								  আরও
							    @endif   
							  </span>
						     </a>
						     @endif
							</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categorySixPostBig->id.'/'.$categorySixPostBig->slug_en)}}">
										<img src="{{asset($categorySixPostBig->image)}}" alt="nothing found" style="height: 200px;">
									</a>
									@else
									<a href="{{url('view-post/'.$categorySixPostBig->id.'/'.$categorySixPostBig->slug_bn)}}">
										<img src="{{asset($categorySixPostBig->image)}}" alt="nothing found" style="height: 200px;">
									</a>
									@endif
									<h4 class="heading-02">
										@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$categorySixPostBig->id.'/'.$categorySixPostBig->slug_en)}}">
										@if(Session()->get('lang') == 'english')
							              {{$categorySixPostBig->title_en}}
							            @else
								          {{$categorySixPostBig->title_bn}}
							            @endif
									</a> 
									@else
									<a href="{{url('view-post/'.$categorySixPostBig->id.'/'.$categorySixPostBig->slug_bn)}}">
										@if(Session()->get('lang') == 'english')
							              {{$categorySixPostBig->title_en}}
							            @else
								          {{$categorySixPostBig->title_bn}}
							            @endif
									</a> 
									@endif
								   </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach($categorySixPostSmalls as $categorySixPostSmall)
								<div class="image-title">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$categorySixPostSmall->id.'/'.$categorySixPostSmall->slug_en)}}">
										<img src="{{asset($categorySixPostSmall->image)}}" alt="Notebook">
									</a>
									@else
									<a href="{{url('view-post/'.$categorySixPostSmall->id.'/'.$categorySixPostSmall->slug_bn)}}">
										<img src="{{asset($categorySixPostSmall->image)}}" alt="Notebook">
									</a>
									@endif
									<h4 class="heading-03">
										@if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$categorySixPostSmall->id.'/'.$categorySixPostSmall->slug_en)}}">
										@if(Session()->get('lang') == 'english')
							              {{$categorySixPostSmall->title_en}}
							            @else
								          {{$categorySixPostSmall->title_bn}}
							            @endif
									</a> 
									@else
									<a href="{{url('view-post/'.$categorySixPostSmall->id.'/'.$categorySixPostSmall->slug_bn)}}">
										@if(Session()->get('lang') == 'english')
							              {{$categorySixPostSmall->title_en}}
							            @else
								          {{$categorySixPostSmall->title_bn}}
							            @endif
									</a> 
									@endif
								</h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- add-start -->	
			<div class="row">
				<div class="col-md-6 col-sm-6">
					@php
                        $horizontal3 = DB::table('ads')->where('type',2)->skip(2)->first();
                        $horizontal4 = DB::table('ads')->where('type',2)->skip(3)->first();
                    @endphp
					<div class="add">
                        @if($horizontal3 == null)

						@else
						 <a href="{{$horizontal3->link}}" target="_blank">
							<img src="{{asset($horizontal3->ads)}}" alt="{{$horizontal3->link}}"/>
						</a>
						@endif
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="add">
						@if($horizontal3 == null)

						@else
						 <a href="{{$horizontal4->link}}" target="_blank">
							<img src="{{asset($horizontal4->ads)}}" alt="{{$horizontal4->link}}"/>
						</a>
						@endif
					</div>
				</div>
			</div><!-- /.add-close -->	
			
		</div>
	</section><!-- /.2nd-news-section-close -->

	@php
       $AcrossthecountryBig = DB::table('posts')->whereNotNull('dist_id')->orderBy('id','desc')->first();
       $AcrossthecountryBigOnes = DB::table('posts')->whereNotNull('dist_id')->orderBy('id','desc')->skip(1)->limit(3)->get();
       $AcrossthecountryBigTwos = DB::table('posts')->whereNotNull('dist_id')->orderBy('id','desc')->skip(4)->limit(3)->get();
	@endphp
	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02">
						<a href="#">
						@if(Session()->get('lang') == 'english')
						   Across The Country 
						 @else
						   সারাদেশে 
						@endif
						<i class="fa fa-angle-right" aria-hidden="true">
							
						</i> 
						<span>
						<i class="fa fa-plus" aria-hidden="true"></i>
						@if(Session()->get('lang') == 'english')
						   All News 
						 @else
						    সব খবর 
						@endif
						  
						</span>
					  </a>
				     </div>
					
					<div class="row">
                  {!! Form::open(['route'=>'sharadesh.news','method'=>'get']) !!} 
					      <div class="row">
				      	@php
				      	 $districts = DB::table('districts')->get();
				      	@endphp

				      	@if(Session()->get('lang') == 'english')
					     	<div class="col-md-4">
					     		<select class="form-control" name="dist_id" id="dist_id" required="">
					     			<option selected="" disabled="">--choose one--</option>
                                    @foreach($districts as $district)
					     			  <option value="{{$district->id}}">{{$district->district_en}}</option>
					     			@endforeach
					     		</select>
					     		<span class="text-danger">{{$errors->has('dist_id')?$errors->first('dist_id'):''}}</span>
					     	</div>
				     	@else
				     	<div class="col-md-4">
					     		<select class="form-control" name="dist_id" id="dist_id" required="">
					     			<option selected="" disabled="">--একটি  নির্বাচন করুন --</option>
                                    @foreach($districts as $district)
					     			  <option value="{{$district->id}}">{{$district->district_bn}}</option>
					     			@endforeach
					     		</select>
					     		<span class="text-danger">{{$errors->has('dist_id')?$errors->first('dist_id'):''}}</span>
					     	</div>
				     	@endif
					     	<div class="col-md-4">
					     	 @if(Session()->get('lang') == 'english')
					     		<select class="form-control" name="subdist_id" id="subdist_id">
					     			<option selected="" disabled="">--choose one--</option>
					     		</select>
				     		@else
				     		<select class="form-control" name="subdist_id" id="subdist_id">
					     			<option selected="" disabled="">--একটি  নির্বাচন করুন--</option>
					     		</select>
				     		@endif
					     	</div>
					     	<div class="col-md-4">
					     		 @if(Session()->get('lang') == 'english')
								  <input type="submit" class="btn btn-success btn-block" value="Search"> 
								 @else
								    <input type="submit" class="btn btn-success btn-block" value="খুজুন">
								 @endif
					     			
					     	</div>
					     </div>
				    {!! Form::close() !!}
                         <hr/>
						<div class="col-md-4 col-sm-4">
							<div class="top-news">
								@if(Session()->get('lang') == 'english')
								<a href="{{url('view-post/'.$AcrossthecountryBig->id.'/'.$AcrossthecountryBig->slug_en)}}">
									<img src="{{asset($AcrossthecountryBig->image)}}" alt="nothing found" style="height: 200px;">
								</a>
								@else
								<a href="{{url('view-post/'.$AcrossthecountryBig->id.'/'.$AcrossthecountryBig->slug_bn)}}">
									<img src="{{asset($AcrossthecountryBig->image)}}" alt="nothing found" style="height: 200px;">
								</a>
								@endif
								<h4 class="heading-02">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$AcrossthecountryBig->id.'/'.$AcrossthecountryBig->slug_en)}}">
								   @if(Session()->get('lang') == 'english')
								    {{$AcrossthecountryBig->title_en}}
								   @else
								    {{$AcrossthecountryBig->title_bn}}
								   @endif
							     </a> 
							   @else
                                    <a href="{{url('view-post/'.$AcrossthecountryBig->id.'/'.$AcrossthecountryBig->slug_bn)}}">
								   @if(Session()->get('lang') == 'english')
								    {{$AcrossthecountryBig->title_en}}
								   @else
								    {{$AcrossthecountryBig->title_bn}}
								   @endif
							     </a> 
							   @endif
						     </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
                              @foreach($AcrossthecountryBigOnes as $AcrossthecountryBigOne)
							<div class="image-title">
								@if(Session()->get('lang') == 'english')
								<a href="{{url('view-post/'.$AcrossthecountryBigOne->id.'/'.$AcrossthecountryBigOne->slug_en)}}">
									<img src="{{asset($AcrossthecountryBigOne->image)}}" alt="Notebook"></a>
									@else
									<a href="{{url('view-post/'.$AcrossthecountryBigOne->id.'/'.$AcrossthecountryBigOne->slug_bn)}}">
									<img src="{{asset($AcrossthecountryBigOne->image)}}" alt="Notebook"></a>
									@endif
								<h4 class="heading-03">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$AcrossthecountryBigOne->id.'/'.$AcrossthecountryBigOne->slug_en)}}">
								   @if(Session()->get('lang') == 'english')
								    {{$AcrossthecountryBigOne->title_en}}
								   @else
								    {{$AcrossthecountryBigOne->title_bn}}
								   @endif
							    </a> 
							    @else
							    <a href="{{url('view-post/'.$AcrossthecountryBigOne->id.'/'.$AcrossthecountryBigOne->slug_bn)}}">
								   @if(Session()->get('lang') == 'english')
								    {{$AcrossthecountryBigOne->title_en}}
								   @else
								    {{$AcrossthecountryBigOne->title_bn}}
								   @endif
							    </a> 
							    @endif
						</h4>
							</div>
							@endforeach
						</div>
						<div class="col-md-4 col-sm-4">
							@foreach($AcrossthecountryBigTwos as $AcrossthecountryBigTwo)
							<div class="image-title">
								@if(Session()->get('lang') == 'english')
								<a href="{{url('view-post/'.$AcrossthecountryBigTwo->id.'/'.$AcrossthecountryBigTwo->slug_en)}}">
									<img src="{{asset($AcrossthecountryBigTwo->image)}}" alt="Notebook"></a>
									@else
									<a href="{{url('view-post/'.$AcrossthecountryBigTwo->id.'/'.$AcrossthecountryBigTwo->slug_bn)}}">
									<img src="{{asset($AcrossthecountryBigTwo->image)}}" alt="Notebook"></a>
									@endif
								<h4 class="heading-03">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('view-post/'.$AcrossthecountryBigTwo->id.'/'.$AcrossthecountryBigTwo->slug_en)}}">
								   @if(Session()->get('lang') == 'english')
								    {{$AcrossthecountryBigTwo->title_en}}
								   @else
								    {{$AcrossthecountryBigTwo->title_bn}}
								   @endif
							    </a> 
							    @else
							    <a href="{{url('view-post/'.$AcrossthecountryBigTwo->id.'/'.$AcrossthecountryBigTwo->slug_bn)}}">
								   @if(Session()->get('lang') == 'english')
								    {{$AcrossthecountryBigTwo->title_en}}
								   @else
								    {{$AcrossthecountryBigTwo->title_bn}}
								   @endif
							    </a> 
							    @endif
						      </h4>
							</div>
							@endforeach
						</div>
					</div>
					<!-- ******* -->
					<br/>
					


                  	@php
					 $categorySeven = DB::table('categories')->skip(6)->first();
					 $categorySevenPostBig = DB::table('posts')->Where('cat_id',$categorySeven->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
					 $categorySevenPostSmalls = DB::table('posts')->Where('cat_id',$categorySeven->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
					@endphp
					<!-- news-start -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('post/'.$categorySeven->id.'/'.$categorySeven->category_en)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categorySeven->category_en}}
								    @else
								      {{$categorySeven->category_bn}}
								    @endif

									<span>

									@if(Session()->get('lang') == 'english')
								      More
								    @else
								      আরও
								    @endif

										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									</span>
								  </a>
								  @else
                                   <a href="{{url('post/'.$categorySeven->id.'/'.$categorySeven->category_bn)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categorySeven->category_en}}
								    @else
								      {{$categorySeven->category_bn}}
								    @endif

									<span>

									@if(Session()->get('lang') == 'english')
								      More
								    @else
								      আরও
								    @endif

										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									</span>
								  </a>
								  @endif
								</div>

							
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categorySevenPostBig->id.'/'.$categorySevenPostBig->slug_en)}}">
												<img src="{{asset($categorySevenPostBig->image)}}" alt="Notebook"></a>
												@else
												<a href="{{url('view-post/'.$categorySevenPostBig->id.'/'.$categorySevenPostBig->slug_bn)}}">
												<img src="{{asset($categorySevenPostBig->image)}}" alt="Notebook"></a>
												@endif
											<h4 class="heading-02">
												@if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categorySevenPostBig->id.'/'.$categorySevenPostBig->slug_en)}}">

												@if(Session()->get('lang') == 'english')
								                   {{$categorySevenPostBig->title_en}}
								                 @else
								                   {{$categorySevenPostBig->title_bn}}
								                 @endif

											</a> 
											@else
											<a href="{{url('view-post/'.$categorySevenPostBig->id.'/'.$categorySevenPostBig->slug_bn)}}">

												@if(Session()->get('lang') == 'english')
								                   {{$categorySevenPostBig->title_en}}
								                 @else
								                   {{$categorySevenPostBig->title_bn}}
								                 @endif

											</a> 
											@endif
										</h4>
										</div>
									</div>

									@foreach($categorySevenPostSmalls as $categorySevenPostSmall)

									<div class="col-md-6 col-sm-6">
										<div class="image-title">
											@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categorySevenPostSmall->id.'/'.$categorySevenPostSmall->slug_en)}}">
												<img src="{{asset($categorySevenPostSmall->image)}}" alt="Notebook">
											</a>
											@else
											<a href="{{url('view-post/'.$categorySevenPostSmall->id.'/'.$categorySevenPostSmall->slug_bn)}}">
												<img src="{{asset($categorySevenPostSmall->image)}}" alt="Notebook">
											</a>
											@endif
											<h4 class="heading-03">
												@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categorySevenPostSmall->id.'/'.$categorySevenPostSmall->slug_en)}}">
												@if(Session()->get('lang') == 'english')
								                   {{$categorySevenPostSmall->title_en}}
								                 @else
								                   {{$categorySevenPostSmall->title_bn}}
								                 @endif
											 </a> 
											 @else
											 <a href="{{url('view-post/'.$categorySevenPostSmall->id.'/'.$categorySevenPostSmall->slug_bn)}}">
												@if(Session()->get('lang') == 'english')
								                   {{$categorySevenPostSmall->title_en}}
								                 @else
								                   {{$categorySevenPostSmall->title_bn}}
								                 @endif
											 </a> 
											 @endif
										</h4>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					@php
					 $categoryEight = DB::table('categories')->skip(7)->first();
					 $categoryEightPostBig = DB::table('posts')->Where('cat_id',$categoryEight->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
					 $categoryEightPostSmalls = DB::table('posts')->Where('cat_id',$categoryEight->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
					@endphp
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('post/'.$categoryEight->id.'/'.$categoryEight->category_en)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categoryEight->category_en}}
								    @else
								      {{$categoryEight->category_bn}}
								    @endif

									<span>
                                     @if(Session()->get('lang') == 'english')
								      More
								     @else
								       আরও 
								     @endif
										

										<i class="fa fa-angle-double-right" aria-hidden="true">
											
										</i>
									</span>
								</a>
								@else
								 <a href="{{url('post/'.$categoryEight->id.'/'.$categoryEight->category_bn)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categoryEight->category_en}}
								    @else
								      {{$categoryEight->category_bn}}
								    @endif

									<span>
                                     @if(Session()->get('lang') == 'english')
								      More
								     @else
								       আরও 
								     @endif
										

										<i class="fa fa-angle-double-right" aria-hidden="true">
											
										</i>
									</span>
								</a>
								@endif
							</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryEightPostBig->id.'/'.$categoryEightPostBig->slug_en)}}">
												<img src="{{asset($categoryEightPostBig->image)}}" alt="Notebook"></a>
												@else
												<a href="{{url('view-post/'.$categoryEightPostBig->id.'/'.$categoryEightPostBig->slug_bn)}}">
												<img src="{{asset($categoryEightPostBig->image)}}" alt="Notebook"></a>
												@endif
											<h4 class="heading-02">
												@if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categoryEightPostBig->id.'/'.$categoryEightPostBig->slug_en)}}">
												 @if(Session()->get('lang') == 'english')
									               {{$categoryEightPostBig->title_en}}
									             @else
									               {{$categoryEightPostBig->title_bn}}
									             @endif
											   </a> 
											   @else
											   <a href="{{url('view-post/'.$categoryEightPostBig->id.'/'.$categoryEightPostBig->slug_bn)}}">
												 @if(Session()->get('lang') == 'english')
									               {{$categoryEightPostBig->title_en}}
									             @else
									               {{$categoryEightPostBig->title_bn}}
									             @endif
											   </a>
											   @endif
										</h4>
										</div>
									</div>
									@foreach($categoryEightPostSmalls as $categoryEightPostSmall)
									<div class="col-md-6 col-sm-6">
										<div class="image-title">
											@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryEightPostSmall->id.'/'.$categoryEightPostSmall->slug_en)}}">
												<img src="{{asset($categoryEightPostSmall->image)}}" alt="Notebook">
											</a>
											@else
											<a href="{{url('view-post/'.$categoryEightPostSmall->id.'/'.$categoryEightPostSmall->slug_bn)}}">
												<img src="{{asset($categoryEightPostSmall->image)}}" alt="Notebook">
											</a>
											@endif
											<h4 class="heading-03">
												@if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categoryEightPostSmall->id.'/'.$categoryEightPostSmall->slug_en)}}">

												 @if(Session()->get('lang') == 'english')
									               {{$categoryEightPostSmall->title_en}}
									             @else
									               {{$categoryEightPostSmall->title_bn}}
									             @endif

											</a> 
											@else
											<a href="{{url('view-post/'.$categoryEightPostSmall->id.'/'.$categoryEightPostSmall->slug_bn)}}">

												 @if(Session()->get('lang') == 'english')
									               {{$categoryEightPostSmall->title_en}}
									             @else
									               {{$categoryEightPostSmall->title_bn}}
									             @endif

											</a> 
											@endif
										</h4>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>



					@php
					 $categoryNine = DB::table('categories')->skip(8)->first();
					 $categoryNinePostBig = DB::table('posts')->Where('cat_id',$categoryNine->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
					 $categoryNinePostSmalls = DB::table('posts')->Where('cat_id',$categoryNine->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
					@endphp
					<!-- news-start -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('post/'.$categoryNine->id.'/'.$categoryNine->category_en)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categoryNine->category_en}}
								    @else
								      {{$categoryNine->category_bn}}
								    @endif

									<span>

									@if(Session()->get('lang') == 'english')
								      More
								    @else
								      আরও
								    @endif

										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									</span>
								  </a>
								  @else
								  <a href="{{url('post/'.$categoryNine->id.'/'.$categoryNine->category_bn)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categoryNine->category_en}}
								    @else
								      {{$categoryNine->category_bn}}
								    @endif

									<span>

									@if(Session()->get('lang') == 'english')
								      More
								    @else
								      আরও
								    @endif

										<i class="fa fa-angle-double-right" aria-hidden="true"></i>
									</span>
								  </a>
								  @endif
								</div>

							
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryNinePostBig->id.'/'.$categoryNinePostBig->slug_en)}}">
												<img src="{{asset($categoryNinePostBig->image)}}" alt="Notebook"></a>
												@else
												<a href="{{url('view-post/'.$categoryNinePostBig->id.'/'.$categoryNinePostBig->slug_bn)}}">
												<img src="{{asset($categoryNinePostBig->image)}}" alt="Notebook"></a>
												@endif
											<h4 class="heading-02">
												@if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categoryNinePostBig->id.'/'.$categoryNinePostBig->slug_en)}}">

												@if(Session()->get('lang') == 'english')
								                   {{$categoryNinePostBig->title_en}}
								                 @else
								                   {{$categoryNinePostBig->title_bn}}
								                 @endif

											</a>
											@else
											<a href="{{url('view-post/'.$categoryNinePostBig->id.'/'.$categoryNinePostBig->slug_bn)}}">

												@if(Session()->get('lang') == 'english')
								                   {{$categoryNinePostBig->title_en}}
								                 @else
								                   {{$categoryNinePostBig->title_bn}}
								                 @endif

											</a>
											@endif 
										</h4>
										</div>
									</div>

									@foreach($categoryNinePostSmalls as $categoryNinePostSmall)

									<div class="col-md-6 col-sm-6">
										<div class="image-title">
											@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryNinePostSmall->id.'/'.$categoryNinePostSmall->slug_en)}}">
												<img src="{{asset($categoryNinePostSmall->image)}}" alt="Notebook">
											</a>
											@else
											<a href="{{url('view-post/'.$categoryNinePostSmall->id.'/'.$categoryNinePostSmall->slug_bn)}}">
												<img src="{{asset($categoryNinePostSmall->image)}}" alt="Notebook">
											</a>
											@endif
											<h4 class="heading-03">
												@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryNinePostSmall->id.'/'.$categoryNinePostSmall->slug_en)}}">
												@if(Session()->get('lang') == 'english')
								                   {{$categoryNinePostSmall->title_en}}
								                 @else
								                   {{$categoryNinePostSmall->title_bn}}
								                 @endif
											 </a> 
											 @else
											 <a href="{{url('view-post/'.$categoryNinePostSmall->id.'/'.$categoryNinePostSmall->slug_bn)}}">
												@if(Session()->get('lang') == 'english')
								                   {{$categoryNinePostSmall->title_en}}
								                 @else
								                   {{$categoryNinePostSmall->title_bn}}
								                 @endif
											 </a> 
											 @endif
										</h4>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					@php
					 $categoryTen = DB::table('categories')->skip(9)->first();
					 $categoryTenPostBig = DB::table('posts')->Where('cat_id',$categoryTen->id)->where('bigthumbnail',1)->orderBy('id','desc')->first();
					 $categoryTenPostSmalls = DB::table('posts')->Where('cat_id',$categoryTen->id)->where('bigthumbnail',Null)->limit(3)->orderBy('id','desc')->get();
					@endphp
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title">
									@if(Session()->get('lang') == 'english')
									<a href="{{url('post/'.$categoryTen->id.'/'.$categoryTen->category_en)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categoryTen->category_en}}
								    @else
								      {{$categoryTen->category_bn}}
								    @endif

									<span>
                                     @if(Session()->get('lang') == 'english')
								      More
								     @else
								       আরও 
								     @endif
										

										<i class="fa fa-angle-double-right" aria-hidden="true">
											
										</i>
									</span>
								</a>
								@else
								<a href="{{url('post/'.$categoryTen->id.'/'.$categoryTen->category_bn)}}">

									@if(Session()->get('lang') == 'english')
								      {{$categoryTen->category_en}}
								    @else
								      {{$categoryTen->category_bn}}
								    @endif

									<span>
                                     @if(Session()->get('lang') == 'english')
								      More
								     @else
								       আরও 
								     @endif
										

										<i class="fa fa-angle-double-right" aria-hidden="true">
											
										</i>
									</span>
								</a>
								@endif
							</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											 @if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryTenPostBig->id.'/'.$categoryTenPostBig->slug_en)}}">
												<img src="{{asset($categoryTenPostBig->image)}}" alt="Notebook"></a>
												@else
												<a href="{{url('view-post/'.$categoryTenPostBig->id.'/'.$categoryTenPostBig->slug_bn)}}">
												<img src="{{asset($categoryTenPostBig->image)}}" alt="Notebook"></a>
												@endif
											<h4 class="heading-02">
												@if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categoryTenPostBig->id.'/'.$categoryTenPostBig->slug_en)}}">
												 @if(Session()->get('lang') == 'english')
									               {{$categoryTenPostBig->title_en}}
									             @else
									               {{$categoryTenPostBig->title_bn}}
									             @endif
											</a> 
											@else
											<a href="{{url('view-post/'.$categoryTenPostBig->id.'/'.$categoryTenPostBig->slug_bn)}}">
												 @if(Session()->get('lang') == 'english')
									               {{$categoryTenPostBig->title_en}}
									             @else
									               {{$categoryTenPostBig->title_bn}}
									             @endif
											</a> 
											@endif
										</h4>
										</div>
									</div>
									@foreach($categoryTenPostSmalls as $categoryTenPostSmall)
									<div class="col-md-6 col-sm-6">
										<div class="image-title">
											@if(Session()->get('lang') == 'english')
											<a href="{{url('view-post/'.$categoryTenPostSmall->id.'/'.$categoryTenPostSmall->slug_en)}}">
												<img src="{{asset($categoryTenPostSmall->image)}}" alt="Notebook"></a>
												@else
												<a href="{{url('view-post/'.$categoryTenPostSmall->id.'/'.$categoryTenPostSmall->slug_bn)}}">
												<img src="{{asset($categoryTenPostSmall->image)}}" alt="Notebook"></a>
												@endif
											<h4 class="heading-03">
												@if(Session()->get('lang') == 'english')
												<a href="{{url('view-post/'.$categoryTenPostSmall->id.'/'.$categoryTenPostSmall->slug_en)}}">

												 @if(Session()->get('lang') == 'english')
									               {{$categoryTenPostSmall->title_en}}
									             @else
									               {{$categoryTenPostSmall->title_bn}}
									             @endif

											</a> 
											@else
											<a href="{{url('view-post/'.$categoryTenPostSmall->id.'/'.$categoryTenPostSmall->slug_bn)}}">

												 @if(Session()->get('lang') == 'english')
									               {{$categoryTenPostSmall->title_en}}
									             @else
									               {{$categoryTenPostSmall->title_bn}}
									             @endif

											</a>
											@endif
										</h4>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>


					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
	                        $horizontal5 = DB::table('ads')->where('type',2)->skip(4)->first();
	                        
                            @endphp
							<div class="sidebar-add">
							@if($horizontal5 == null)
								
							@else
							  <a href="{{$horizontal5->link}}" target="_blank">
							  	<img src="{{asset($horizontal5->ads)}}" alt="{{$horizontal5->link}}"/>
							  </a>
							@endif
							</div>
						</div>
					</div><!-- /.add-close -->	


				</div>

				@php
				 $latests     = DB::table('posts')->orderBy('id','desc')->limit(8)->get();
				 $popularones = DB::table('posts')->inRandomOrder()->limit(8)->get();
				 $populartwos = DB::table('posts')->inRandomOrder()->orderBy('id','asc')->limit(8)->get();
				@endphp
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
								  @if(Session()->get('lang') == 'english')
					                Latest News
					              @else
					                  সর্বশেষ খবর  
					              @endif
						    </a>
					         </li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
								 @if(Session()->get('lang') == 'english')
					                Popular One
					             @else
					                  জনপ্রিয় এক  
					             @endif
							 
						   </a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
								 @if(Session()->get('lang') == 'english')
					                Popular Two
					             @else
					                  জনপ্রিয় দুই  
					             @endif
							
						  </a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">
									@foreach($latests as $latest)
									<div class="news-title-02">
										<h4 class="heading-03">
									  @if(Session()->get('lang') == 'english')
										<a href="{{url('view-post/'.$latest->id.'/'.$latest->slug_en)}}">
										 @if(Session()->get('lang') == 'english')
							               {{$latest->title_en}}
							             @else
							                  {{$latest->title_bn}}
							             @endif
									   </a> 
									   @else
									   <a href="{{url('view-post/'.$latest->id.'/'.$latest->slug_bn)}}">
										 @if(Session()->get('lang') == 'english')
							               {{$latest->title_en}}
							             @else
							                  {{$latest->title_bn}}
							             @endif
									   </a>
									   @endif
									</h4>
									</div>
									@endforeach
								
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
									@foreach($popularones as $popularone)
									<div class="news-title-02">
										<h4 class="heading-03">
										@if(Session()->get('lang') == 'english')
										 <a href="{{url('view-post/'.$popularone->id.'/'.$popularone->slug_en)}}">
										 @if(Session()->get('lang') == 'english')
							               {{$popularone->title_en}}
							             @else
							                  {{$popularone->title_bn}}
							             @endif
									  </a> 
									  @else
									  <a href="{{url('view-post/'.$popularone->id.'/'.$popularone->slug_bn)}}">
										 @if(Session()->get('lang') == 'english')
							               {{$popularone->title_en}}
							             @else
							                  {{$popularone->title_bn}}
							             @endif
									  </a> 
									  @endif
									</h4>
									</div>
									@endforeach
								</div>                                          
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
									@foreach($populartwos as $populartwo)
									<div class="news-title-02">
										 <h4 class="heading-03">
										 @if(Session()->get('lang') == 'english')
										 	<a href="{{url('view-post/'.$populartwo->id.'/'.$populartwo->slug_en)}}">
										 @if(Session()->get('lang') == 'english')
							               {{$populartwo->title_en}}
							             @else
							                  {{$populartwo->title_bn}}
							             @endif
									   </a>
									   @else
									   <a href="{{url('view-post/'.$populartwo->id.'/'.$populartwo->slug_bn)}}">
										 @if(Session()->get('lang') == 'english')
							               {{$populartwo->title_en}}
							             @else
							                  {{$populartwo->title_bn}}
							             @endif
									   </a>
									   @endif
									    </h4>
									</div>
									@endforeach
								</div>						                                          
							</div>
						</div>
					</div>

					@php 
                      $prayer = DB::table('prayers')->first();
					@endphp
					<!-- Namaj Times -->
					<div class="cetagory-title-03">
					@if(session()->get('lang')== 'english')
					 Prayer Time
					@else
					  নামাজের সময়সূচি 
					@endif
					</div>
					
                    <table class="table table-bordered table-dark">
						<thead>
							<tr>
								<th>
								@if(session()->get('lang')== 'english')
								  Fajar
								@else
								 ফজর 
					            @endif
								</th>
								<th>{{$prayer->fajar}}</th>
							</tr>
							<tr>	
								<th>
								@if(session()->get('lang')== 'english')
								  Johor
								@else
								  জোহর  
					            @endif
								</th>
								<th>{{$prayer->johor}}</th>
							</tr>
							<tr>	
								<th>
								@if(session()->get('lang')== 'english')
								  Asor
								@else
								  আসর    
					            @endif
								</th>
								<th>{{$prayer->asor}}</th>
							</tr>
							<tr>	
								<th>
								@if(session()->get('lang')== 'english')
								  Magrib
								@else
								  মাগরিব   
					            @endif
								</th>
								<th>{{$prayer->magrib}}</th>
							</tr>
							<tr>	
								<th>
								@if(session()->get('lang')== 'english')
								  Esha
								@else
								  এশা  
					            @endif
								</th>
								<th>{{$prayer->esa}}</th>
							</tr>
							<tr>	
								<th>
								@if(session()->get('lang')== 'english')
								  Jummah
								@else
								  জুম্মাহ  
					            @endif
								</th>
								<th>{{$prayer->jummah}}</th>
							</tr>
						</thead>
						
					</table>



					<!-- Namaj Times -->
					<div class="cetagory-title-03">পুরানো সংবাদ  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="খুজুন ">
						</div>
				   </form>
				   @php
                     $websites = DB::table('websites')->get();
				   @endphp
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04">
				   @if(session()->get('lang')== 'english')
				     Important Websites
					@else
					 গুরুত্বপূর্ণ ওয়েবসাইট 
					@endif
					</div>
				   <div class="">
				   @foreach($websites as $website)
				   	<div class="news-title-02">
					   @if(session()->get('lang')== 'english')
				   		 <h4 class="heading-03"><a href="{{Crypt::decryptString($website->website_link)}}" target="_blank"><i class="fa fa-check" aria-hidden="true"></i> {{Crypt::decryptString($website->website_name)}}  </a> </h4>
				   	   @else
						  <h4 class="heading-03"><a href="{{Crypt::decryptString($website->website_link)}}" target="_blank"><i class="fa fa-check" aria-hidden="true"></i> {{Crypt::decryptString($website->website_name_bn)}}  </a> </h4>
					   @endif
					   </div>
				   	@endforeach
				   </div>

				   <div class="cetagory-title-04">
				    @if(session()->get('lang')== 'english')
				      Video Player
					@else
					  ভিডিও প্লেয়ার
					@endif
					</div>

					<div class="fb-root">
						
						<div class="fb-video" data-href="https://www.facebook.com/207329749360110/videos/259739825335872" data-show-text="false" data-width=""><blockquote cite="https://developers.facebook.com/somoynews.tv/videos/259739825335872/" class="fb-xfbml-parse-ignore"><a href="https://developers.facebook.com/somoynews.tv/videos/259739825335872/">বাবা-মা শেখাচ্ছেন নিজেকে সুরক্ষার কৌশল!</a><p>করোনাকালে গণমাধ্যমের চোখ এড়িয়ে এসব থাকে আড়ালে আবডালে। বঙ্গবন্ধু স্টেডিয়াম সাবারিয়া-সাবরিনার ক্লাসরুম। শিক্ষকের ভূমিকায় বাবা খোরশেদ ও মা শিরিন আক্তার।</p>Posted by <a href="https://www.facebook.com/somoynews.tv/">somoynews.tv</a> on Wednesday, 7 October 2020</blockquote></div>
						<div id="fb-root"></div>
                         <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="T6oZg1ye"></script>
						
					</div>
				 @if(session()->get('lang')== 'english')
					<a target="_blank" href="https://www.youtube.com/somoytvnetupdate?sub_confirmation=1">
						<img alt="somoytv subscribe" src="https://www.somoynews.tv/img/subscribe.jpg"><br>
						Subscribe to view all videos of time
					</a>
				 @else
				  <a target="_blank" href="https://www.youtube.com/somoytvnetupdate?sub_confirmation=1">
						<img alt="somoytv subscribe" src="https://www.somoynews.tv/img/subscribe.jpg"><br>
						সময়ের সকল ভিডিও দেখতে সাবস্ক্রাইব করুন
					</a>
				 @endif

				 @if(session()->get('lang')== 'english')
					<a target="_blank" href="https://www.youtube.com/somoytvbulletin?sub_confirmation=1">
					<img alt="somoytv subscribe" src="https://www.somoynews.tv/img/subscribe-bulletin.jpg" src="https://www.somoynews.tv/img/subscribe-bulletin.jpg"><br>
					Subscribe to Bulletin and Editorial
				 </a>
				 @else
				  <a target="_blank" href="https://www.youtube.com/somoytvbulletin?sub_confirmation=1">
					<img alt="somoytv subscribe" src="https://www.somoynews.tv/img/subscribe-bulletin.jpg" src="https://www.somoynews.tv/img/subscribe-bulletin.jpg"><br>
					বুলেটিন ও সম্পাদকীয় দেখতে সাবস্ক্রাইব করুন
				 </a>
				 @endif

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->


	@php

	 $photoBig = DB::table('photos')->where('type',1)->orderBy('id','desc')->first();
	 $photoSmalls = DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(5)->get();
	@endphp
	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> 
					@if(session()->get('lang')== 'english')
					  Photo Gallery 
					@else
                      ফটো  গ্যালারি  
					@endif
				</div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{asset($photoBig->photo)}}"  alt="Avatar">
	                            </div>
	                            @if(session()->get('lang')== 'english')
								  {{$photoBig->title_en}}
								@else
			                      {{$photoBig->title_bn}} 
								@endif
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                            @foreach($photoSmalls as $photoSmall)
	                            <div class="photo_img photo_border active">
	                                <img src="{{asset($photoSmall->photo)}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
			                            @if(session()->get('lang')== 'english')
										  {{$photoSmall->title_en}}
										@else
					                      {{$photoSmall->title_bn}} 
										@endif
	                                </div>
	                            </div>
                               @endforeach
	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->
        @php
          $videoBig = DB::table('videos')->where('type',1)->orderBy('id','desc')->first();
          $videoSmalls = DB::table('videos')->where('type',0)->orderBy('id','desc')->limit(6)->get();
        @endphp

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> 
						@if(session()->get('lang')== 'english')
						  Video Gallery  
						@else
	                      ভিডিও গ্যালারি   
						@endif
					
				</div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$videoBig->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                @if(session()->get('lang')== 'english')
							      {{$videoBig->title_en}}
							    @else
		                          {{$videoBig->title_bn}} 
							    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="gallery_sec owl-carousel">
                                @foreach($videoSmalls as $videoSmall)
                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$videoSmall->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                    <div class="heading-03">
                                        <div class="content_padding">
                                          @if(session()->get('lang')== 'english')
										    {{$videoSmall->title_en}}
										  @else
					                        {{$videoSmall->title_bn}} 
										  @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->

@if(session()->get('lang')== 'english')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="dist_id"]').on('change', function(){
                var dist_id = $(this).val();
                if(dist_id) {
                    $.ajax({
                        url: "{{  url('/get/subdistfrontend/') }}/"+dist_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $("#subdist_id").empty();
                            $.each(data,function(key,value){
                                $("#subdist_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    @else
  <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="dist_id"]').on('change', function(){
                var dist_id = $(this).val();
                if(dist_id) {
                    $.ajax({
                        url: "{{  url('/get/subdistfrontend/') }}/"+dist_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $("#subdist_id").empty();
                            $.each(data,function(key,value){
                                $("#subdist_id").append('<option value="'+value.id+'">'+value.subdistrict_bn+'</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>



    @endif
@endsection