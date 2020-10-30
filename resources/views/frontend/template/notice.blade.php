	<!-- notice-start -->
	 @php
       $headlines = DB::table('posts')
	   
	   ->where('headline',1)->orderBy('id','desc')->limit(10)->get();

     $notice = DB::table('notices')->first();
     $brakingnews = DB::table('brakingnews')->first();
     @endphp

     <section>
			<div class="container-fluid">
				<div class="row scroll">
					<div class="col-md-2 col-sm-3 scroll_01" style="background-color:red;">
					@if(session()->get('lang')== 'english')
					  Brakingnews :
					@else
					ব্রেকিংনিউজ :
					@endif
				
					</div>
					<div class="col-md-10 col-sm-9 scroll_02" style="background-color:#9999FF;">
						<marquee>
						
						  @if(session()->get('lang')== 'english')
					        *  {{$brakingnews->news_en}}
					      @else
						    *  {{$brakingnews->news_bn}}
					      @endif
						
						</marquee>
					</div>
				</div>
			</div>
		</section> 

		<section>
			<div class="container-fluid">
				<div class="row scroll">
					<div class="col-md-2 col-sm-3 scroll_01 ">
					@if(session()->get('lang')== 'english')
					  Headline :
					@else
					শিরোনাম :
					@endif
				
					</div>
					<div class="col-md-10 col-sm-9 scroll_02">
						<marquee>
						@foreach($headlines as $headline)
						  @if(session()->get('lang')== 'english')
					      * {{$headline->title_en}}
					      @else
						   * {{$headline->title_bn}}
					      @endif
						@endforeach
						</marquee>
					</div>
				</div>
			</div>
		</section>  

     @if($notice->status == 1)
		<section>
			<div class="container-fluid">
				<div class="row scroll">
					<div class="col-md-2 col-sm-3 scroll_01 " style="background-color:green;">
					@if(Session()->get('lang')== 'english')
					  Notice :
					@else
					
                     নোটিশ :
					@endif
				
					</div>
					<div class="col-md-10 col-sm-9 scroll_02" style="background-color:#808080;">
						<marquee>
						
						  @if(Session()->get('lang')== 'english')
					      * {{$notice->notice_en}}
					      @else
						   * {{$notice->notice}}
					      @endif
					
						</marquee>
					</div>
				</div>
			</div>
		</section>  
		@endif
