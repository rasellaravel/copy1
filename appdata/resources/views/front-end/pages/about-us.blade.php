 @extends('front-end.app')
 @section('style')
 @endsection
 @section('content')
 <div class="main-wrapper-m">
 	<section class="about-section section">
 		<div class="row">
 			<div class="col-12 col-md-4 d-none d-md-block col-lg-3">
 				<div class="sidebar">
 					@include('front-end.pages.inc.top-pro-slider')
 				</div>
 			</div>
 			<div class="col-12 col-md-8 col-lg-9">
 				<div class="row mar-0">
 					<div class="col-12 pad-0">
 						<div class="banner-menu">
 							<!-- <h1>Products</h1> -->
 							<div class="menu-ul">
 								<span class="menu-li"><a href="{{url('/')}}">Home</a><i class="fas fa-chevron-left"></i></span>
 								<span class="menu-li">About-Us</span>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 pad-0">
 						<div class="about-img">
 							<img src="{{asset('assets/img/about.jpg')}}" alt="Left Banner" class=" img-responsive">
 						</div>
 						<div class="about-text">
 							<div class="tlt-part mt-3">
 								<h2 class="border-tlt text-uppercase">HealthCare Design is Best Part of <span>my Life</span></h2>
 							</div>
 							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
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
 							<h6>Free Shipping</h6>
 							<p>Free delivery worldwide</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon order"></div>
 							<h6>Order Online</h6>
 							<p>Hours : 8am - 11pm</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon save"></div>
 							<h6>Shop And Save</h6>
 							<p>For All Spices & Herbs</p>
 						</div>
 						<div class="feature">
 							<div class="fea-icon safe"></div>
 							<h6>Safe Shoping</h6>
 							<p>Ensure genuine 100%</p>
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