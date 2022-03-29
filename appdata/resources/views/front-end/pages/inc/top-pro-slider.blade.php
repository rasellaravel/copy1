<div class="product-slider">
	<!-- <div class="heading-part">
		<h2 class="main-title">@lang('home.discount_products')</h2>
		<div class="next-pre">
			<div class="swiper-button-prev top-product-prev"></div>
			<div class="swiper-button-next top-product-next"></div>
		</div>
	</div> -->
	<div class="tlt-part">
		<h2 class="border-tlt">Discount <span>Products</span></h2>
		<div class="next-pre">
			<div class="swiper-button-prev top-product-prev"><i class="fas fa-chevron-left"></i></div>
			<div class="swiper-button-next top-product-next"><i class="fas fa-chevron-right"></i></div>
		</div>
	</div>
	<div class="swiper-container top-product-container">
		<div class="swiper-wrapper">
			@php
			$n = 0;
			@endphp
			@for($i=0;$i<ceil($discount_products->count() / 3);$i++)
			<div class="swiper-slide">
				<div class="product">
					@for($j=0;$j<3;$j++) @if($discount_products->count() > $n)
					<div class="single-product flex-pro">
						<div class="row mar-0">
							<div class="col-4 pad-l-0">
								<div class="product-img sng-i-c">
									<a href="{{url('product-details', $discount_products[$n]->products->id)}}">
										@if($discount_products[$n]->products->product_img)
										<img src="{{ asset('proAltImg/' . $discount_products[$n]->products->product_img)  }}" alt="Left Banner" class="img-responsive product-n">
										<img src="{{ asset('proAltImg/' . $discount_products[$n]->products->product_img)  }}" alt="Left Banner" class="img-responsive product-h d-none">
										@else
										<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="img">
										@endif
									</a>
								</div>
							</div>
							<div class="col-8">
								<div class="product-info">
									<h6 class="product-name"><a href="{{url('product-details', $discount_products[$n]->products->id)}}"><?=$discount_products[$n]->products->{'title_'.app()->getLocale()} ?></a></h6>
									<div class='rating-stars'>
										<ul id='stars'>
											<li class='star' title='Poor' data-value='1'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star' title='Fair' data-value='2'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star' title='Good' data-value='3'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star' title='Excellent' data-value='4'>
												<i class='fa fa-star fa-fw'></i>
											</li>
											<li class='star' title='WOW!!!' data-value='5'>
												<i class='fa fa-star fa-fw'></i>
											</li>
										</ul>
									</div>
									<span class="price">
										<span class="amount"><span class="currencySymbol">$</span>{{$discount_products[$n]->price}}</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					@php $n++ @endphp
					@endif
					@endfor
				</div>
			</div>
			@endfor
		</div>
		<!-- Add Pagination -->
		<!-- Add Arrows -->
	</div>
</div>