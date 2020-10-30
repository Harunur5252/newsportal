@extends('layouts.front')

 <!-- for social share -->

@section('meta')

@if(Session()->get('lang') == 'english')
  <meta property="og:url" content="{{Request::fullUrl()}}"/>
  <meta property="og:type" content="website"/>
  <meta property="og:title" content="{{$post->title_en}}"/>
  <meta property="og:description" content="{{$post->details_en}}"/>
  <meta property="og:image" content="{{asset($post->image)}}"/>
 @else
  <meta property="og:url" content="{{Request::fullUrl()}}"/>
  <meta property="og:type" content="ওয়েবসাইট"/>
  <meta property="og:title" content="{{$post->title_bn}}"/>
  <meta property="og:description" content="{{$post->details_bn}}"/>
  <meta property="og:image" content="{{asset($post->image)}}"/>
 @endif

@endsection

@section('title')

  @if(Session()->get('lang') == 'english')
   SinglePostView
  @else
   এককপোস্টভিউ 
  @endif

@endsection

@section('content')

	

	<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="{{route('/')}}"><i class="fa fa-home"></i></a></li>					   
						<li><a href="#">
							@if(Session()->get('lang') == 'english')
							  {{$post->category_en}}
							@else
							   {{$post->category_bn}}
							@endif
						</a></li>
						<li><a href="#">
							@if(Session()->get('lang') == 'english')
							  {{$post->subcategory_en}}
							@else
							   {{$post->subcategory_bn}}
							@endif
						</a></li>
						<li><a href="#">
							@if(Session()->get('lang') == 'english')
							  {{$post->district_en}}
							@else
							   {{$post->district_bn}}
							@endif
						</a></li>
						<li><a href="#">
							@if(Session()->get('lang') == 'english')
							  {{$post->subdistrict_en}}
							@else
							   {{$post->subdistrict_bn}}
							@endif
						</a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
						    @if(Session()->get('lang') == 'english')
							  {{$post->title_en}}
							@else
							   {{$post->title_bn}}
							@endif
					</h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
						 
						 
						 <li>
						 	@if(Session()->get('lang') == 'english')
							  {{$post->name_en}}
							@else
							   {{$post->name_bn}}
							@endif
						 </li>     <li><i class="fa fa-clock-o"></i> {{$post->post_date}}</li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
							<ul class="social-nav">
								

							</ul>						   
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>

         <!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
							 $horizontal6 = DB::table('ads')->where('type',2)->skip(6)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$horizontal6->link}}" target="_blank">
								  <img src="{{asset($horizontal6->ads)}}" alt="$horizontal6->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{asset($post->image)}}" style="height: 400px;" alt="{{$post->title_bn}}" />
					<h4 class="caption"> 
						@if(Session()->get('lang') == 'english')
							{{$post->title_en}}
						@else
							{{$post->title_bn}}
						@endif 

					</h4>
                     <br/>
					<!--  for social share -->
					<div class="sharethis-inline-share-buttons" data-href="{{Request::url()}}"></div>
					<br/><br/>
					
					<p>
						@if(Session()->get('lang') == 'english')
							{!! $post->details_en !!}
						@else
							{!! $post->details_bn !!}
						@endif 
					</p>

				</div>
				
           <!--  facebook comment -->
				<div class="comment-section " style="width: 100%;"> 
           <!-- Begin .title-style01 -->
	           <div class=" comment-title title-style01 ">
	             <h4> Comments</h4>
	           </div>
	           <!-- End .title-style01 -->
	           <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5">
	           </div>
	         </div><hr>


				<!-- ********* -->
				<div class="row">
					<div class="col-md-12"><h2 class="heading">
						@if(Session()->get('lang') == 'english')
							More News
						@else
							আরো সংবাদ
						@endif 
					
				 </h2>

				 @php 
                   $morenews = DB::table('posts')->where('cat_id',$post->cat_id)->orderBy('id','desc')->limit(6)->get();
				 @endphp
				</div> 

				 @foreach($morenews as $morenew)
					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm">
							@if(Session()->get('lang') == 'english')
							<a href="{{url('view-post/'.$morenew->id.'/'.$morenew->slug_en)}}">
								<img src="{{asset($morenew->image)}}" alt="{{$morenew->title_en}}">
							</a>
							@else
							<a href="{{url('view-post/'.$morenew->id.'/'.$morenew->slug_bn)}}">
								<img src="{{asset($morenew->image)}}" alt="{{$morenew->title_bn}}">
							</a>
							@endif
							<h4 class="heading-02" style="height: 80px;">
                          @if(Session()->get('lang') == 'english')
							<a href="{{url('view-post/'.$morenew->id.'/'.$morenew->slug_en)}}">
								@if(Session()->get('lang') == 'english')
								  {{$morenew->title_en}}
							    @else
								  {{$morenew->title_bn}}
							    @endif 
						   </a> 
						   @else
                               <a href="{{url('view-post/'.$morenew->id.'/'.$morenew->slug_bn)}}">
								@if(Session()->get('lang') == 'english')
								  {{$morenew->title_en}}
							    @else
								  {{$morenew->title_bn}}
							    @endif 
						     </a> 

						   @endif
					     </h4>
						</div>
					</div>
					@endforeach
				</div>

			</div>
			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
							 $vertical7 = DB::table('ads')->where('type',1)->skip(7)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical7->link}}" target="_blank">
								  <img src="{{asset($vertical7->ads)}}" alt="$vertical7->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->

					@php
					 $latests = DB::table('posts')->orderBy('id','desc')->limit(8)->get(); 
					 $popularones = DB::table('posts')->inRandomOrder()->limit(8)->get();
					 $populartwos = DB::table('posts')->inRandomOrder()->orderBy('id','asc')->limit(8)->get();
				    @endphp
				
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
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
							 $vertical8 = DB::table('ads')->where('type',1)->skip(8)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical8->link}}" target="_blank">
								  <img src="{{asset($vertical8->ads)}}" alt="$vertical8->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->
					<br/><br/>
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							@php
							 $vertical9 = DB::table('ads')->where('type',1)->skip(9)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical9->link}}" target="_blank">
								  <img src="{{asset($vertical9->ads)}}" alt="$vertical9->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->

			</div>
		  </div>
		</div>
	</section>

<!-- for facebook comment -->
<div id="fb-root"></div>

<script>
	(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/bn_IN/sdk.js#xfbml=1&version=v3.2&appId=157325511530244&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<!-- for share post -->
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f8cacbefbf397001368c0f0&product=inline-share-buttons" data-href="{{Request::url()}}"async="async">	
</script>

@endsection

