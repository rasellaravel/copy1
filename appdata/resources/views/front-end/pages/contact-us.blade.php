 @extends('front-end.app')
 @section('style')
 @endsection
 @section('content')
 <div class="main-wrapper-m">
 	<section class="contact-section section">
 		<div class="row">
 			<div class="col-12 col-md-4 col-lg-3 d-none d-md-block">
 				<div class="sidebar">
 					@include('front-end.pages.inc.top-pro-slider')
 				</div>
 			</div>
 			<div class="col-12 col-md-8 col-lg-9">
 				<div class="row">
 					<div class="col-12">
 						<div class="banner-menu">
 							<div class="menu-ul">
 								<span class="menu-li"><a href="{{url('/')}}">@lang('home.home')</a><i class="fas fa-chevron-left"></i></span>
 								<span class="menu-li">@lang('home.contact_us')</span>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-lg-4 ">
 						<div class="contact-info">
 							<div class="location">
 								<h5 class="capitalize">@lang('home.our_location')</h5>
 								<div class="address">
 									<span class="font-weight-bold">@lang('home.office_address'):</span>
 									<br> 124,Lorem Ipsum has been
 									<br> text ever since the 1500
 								</div>
 								<div class="call"><i class="fa fa-phone" aria-hidden="true"></i>+91-9987-654-321</div>
 							</div>
 							<div class="career mt-20">
 								<h5 class="capitalize">@lang('home.careers')</h5>
 								<div class="address">dummy text ever since the 1500s, simply dummy text of the typesetting industry. </div>
 								<div class="email"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:careers@yourdomain.com" target="_top">careers@yourdomain.com</a></div>
 							</div>
 							<div class="hello mt-20">
 								<h5 class="capitalize ">@lang('home.say_hello')</h5>
 								<div class="address">simply dummy text of the printing and typesetting industry.</div>
 								<div class="email"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@yourdomailname.com" target="_top">info@yourdomailname.com</a></div>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 col-lg-8">
 						<div class="contact-form">
 							<form id="contact_body" method="post" action="">
 								<div class="form-group">
 									<input class="form-control " type="text" name="name" placeholder="@lang('home.name')" data-required="true">
 								</div>
 								<div class="form-group">
 									<input class="form-control  mt_30" type="email" name="email" placeholder="@lang('home.email')" data-required="true">
 								</div>
 								<div class="form-group">
 									<input class="form-control  mt_30" type="text" name="phone1" placeholder="@lang('home.phone_number')" maxlength="15" data-required="true">
 								</div>
 								<div class="form-group">
 									<input class="form-control  mt_30" type="text" name="subject" placeholder="@lang('home.subject')" data-required="true">
 								</div>
 								<div class="form-group">
 									<textarea class="form-control" name="message" placeholder="@lang('home.message')" data-required="true"></textarea>
 								</div>
 								<div class="form-group">
 									<button class="btn ctm-btn" type="submit">@lang('home.send_message')</button>
 								</div>
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>
 		</div>
 	</section>
 	<section class="search-section section d-none">
 		<div class="row mar-0">
 			<div class="col-12 d-none d-md-block col-md-4 col-lg-3 pad-l-0">
 				<div class="sidebar">
 					<div class="left_banner">
 						<a href="#"><img src="{{asset('assets/img/side1.jpg')}}" alt="Left Banner" class="cover img-responsive"></a>
 					</div>
 					<div class="left-feature">
 						<div class="feature">
 							<div class="fea-icon shiping"></div>
 							<h6>@lang('home.free_shipping')</h6>
 							<p>@lang('home.free_delivery_worldwide')</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon order"></div>
 							<h6>@lang('home.order_online')</h6>
 							<p>@lang('home.hours') : 8am - 11pm</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon save"></div>
 							<h6>@lang('home.shop_and_save')</h6>
 							<p>@lang('home.spices_herbs')</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon safe"></div>
 							<h6>@lang('home.safe_shoping')</h6>
 							<p>@lang('home.ensure_genuine') 100%</p>
 						</div>
 					</div>
 					@include('front-end.pages.inc.top-pro-slider')
 				</div>
 			</div>
 			<div class="col-12 col-md-8 col-lg-9 pad-r-0">
 				<div class="pro-filter-area1">
 					@include('front-end.pages.paginate-product1')
 				</div>
 			</div>
 		</div>
 	</section>
 </div>
 @endsection
 @section('script')
 <script>

 </script>
 @endsection