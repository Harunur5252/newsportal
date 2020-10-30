    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add">
					@if($horizontal1 == null)
						
					@else
                      <a href="{{$horizontal1->link}}" target="_blank">
                      	<img src="{{asset($horizontal1->ads)}}" alt="{{$horizontal1->link}}"/>
                      </a>
					@endif
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->