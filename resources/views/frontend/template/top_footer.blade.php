	<!-- top-footer-start -->
	<section>
		<div class="container-fluid">
			<div class="top-footer">
				<div class="row">
					<div class="col-md-3 col-sm-4">
						@php
						 $logo   = DB::table('logos')->first();
						@endphp
						<div class="foot-logo">
							<img src="{{asset($logo->logo)}}" style="height: 50px;" />
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						@php
						  $social = DB::table('socials')->first();
						@endphp
						 <div class="social">
                            <ul>
                                <li><a href="{{$social->facebook}}" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$social->twitter}}" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$social->instagram}}" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                
                                <li><a href="{{$social->linkedin}}" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{$social->youtube}}" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
								<li>
								<a href="https://apps.apple.com/us/app/somoy-tv/id1234444890#?platform=iphone" target="_blank">
									<img src="{{asset('/')}}frontendAssets/assets/img/apps-01.png" alt="" />
								</a>
								</li>
								<li>
									<a href="https://play.google.com/store/apps/details?id=com.somoy&hl=en" target="_blank">
										<img src="{{asset('/')}}frontendAssets/assets/img/apps-02.png" alt="" />
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.top-footer-close -->
	