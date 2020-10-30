	<!-- bottom-footer-start -->	
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copyright">	
					@if(session()->get('lang')== 'english')					
						© All rights are reserved by Somoy Media Limited :: {{date('Y')}}
					@else
					© সর্বস্বত্ব সময় মিডিয়া লিমিটেড দ্বারা সংরক্ষিত :: {{date('Y')}}
					@endif
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							@if(session()->get('lang')== 'english')
								<li><a href="{{route('about.us')}}">About US</a></li>
								<li><a href="{{route('contact.us')}}">Contact US</a></li>
							@else
							<li><a href="{{route('about.us')}}">আমাদের সম্পর্কে</a></li>
								<li><a href="{{route('contact.us')}}">আমাদের সাথে যোগাযোগ করুন</a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>