
	
	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>  
							@if(Session()->get('lang')== 'english')
							  Dhaka 
							@else
							  ঢাকা 
							@endif
							
							 </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i> 
							@if(Session()->get('lang')== 'english')
							  {{date('d M Y, l, h:i:s a')}}  
							@else
							  {{ bn_date(date('d M Y, l, h:i:s a'))}}  
							@endif
							
							</li>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i> 
							
							@if(Session()->get('lang')== 'english')
							  Updated 5 minutes ago
							@else
						      আপডেট ৫ মিনিট আগে
							@endif
							
							</li>
						</ul>
						
					</div>
				</div>
    		</div>
    	</div>
    	
    </section><!-- /.date-close -->  