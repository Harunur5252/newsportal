@extends('layouts.front')

@section('title')
  @if(Session()->get('lang') == 'english')
   All News
  @else
   সকল খবর 
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
							  All News
							@else
							   সকল খবর 
							@endif
						</a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 										
		 
		 <div class="article-info margin-bottom-20">

		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="row">
				 <div class="col-md-12"><h2 class="heading">
						
				 </h2>

				</div> 

				 @foreach($allposts as $allpost)
					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm">
							@if(Session()->get('lang') == 'english')
								<a href="{{url('view-post/'.$allpost->id.'/'.$allpost->slug_en)}}">
									<img src="{{asset($allpost->image)}}" alt="{{$allpost->title_en}}">
								</a>
							@else
								<a href="{{url('view-post/'.$allpost->id.'/'.$allpost->slug_bn)}}">
									<img src="{{asset($allpost->image)}}" alt="{{$allpost->title_bn}}">
								</a>
							@endif
							<h4 class="heading-02" style="height: 80px;">
                          @if(Session()->get('lang') == 'english')
							<a href="{{url('view-post/'.$allpost->id.'/'.$allpost->slug_en)}}">
								@if(Session()->get('lang') == 'english')
								  {{$allpost->title_en}}
							    @else
								  {{$allpost->title_bn}}
							    @endif 
						   </a> 
						   @else
                               <a href="{{url('view-post/'.$allpost->id.'/'.$allpost->slug_bn)}}">
								@if(Session()->get('lang') == 'english')
								  {{$allpost->title_en}}
							    @else
								  {{$allpost->title_bn}}
							    @endif 
						     </a> 

						   @endif
					     </h4>
						</div>
					</div>
					@endforeach
				</div>

				{{$allposts->links()}}

			</div>
			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							 @php
							 $vertical5 = DB::table('ads')->where('type',1)->skip(4)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical5->link}}" target="_blank">
								  <img src="{{asset($vertical5->ads)}}" alt="$vertical5->link" />
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
							 $vertical6 = DB::table('ads')->where('type',1)->skip(6)->first();
							@endphp
							<div class="sidebar-add">
								<a href="{{$vertical6->link}}" target="_blank">
								  <img src="{{asset($vertical6->ads)}}" alt="$vertical6->link" />
								</a>
							</div>
						</div>
					</div><!-- /.add-close -->
			</div>
		  </div>
		</div>
	</section>

@endsection