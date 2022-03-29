 @extends('front-end.app')
 @section('style')

 <style type="text/css">
 	@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

 	.media {
 		padding: 30px 30px 15px
 	}

 	span.text-muted {
 		font-size: 12px
 	}

 	p.pt-1 {
 		font-size: 13px;
 		color: #8686AC;
 		cursor: pointer
 	}

 	.fas {
 		color: #ABB0B4
 	}

 	.fa-angle-right {
 		color: #E6E6E6
 	}

 	span {
 		font-size: 14px
 	}

 	.justify-content-between {
 		height: 50px;
 		margin-bottom: 10px
 	}

 	.justify-content-between:hover {
 		background-color: #EFF3FF;
 		color: #7175B5;
 		cursor: pointer
 	}

 	.justify-content-between:hover .fas {
 		color: #7175B5
 	}

 	.justify-content-between.sample {
 		background-color: #EFF3FF;
 		color: #7175B5
 	}

 	.preview {
 		color: #7175B5
 	}
 </style>
 @endsection
 @section('content')
 <section class="cart-section section">
 	<div class="row mar-0">
 		<div class="col-12 col-md-4 d-none d-md-block col-lg-3 pad-l-0">
 			<div class="sidebar">
 				@include('auth.user-profile.user-profile-navbar')
 			</div>
 		</div>
 		<div class="col-12 col-md-8 col-lg-9 pad-r-0">
 			<form action="{{url('update-user-update-password')}}" method="post" id="updateUsrInfo"  enctype="multipart/form-data">
 				@csrf
 				<div class="row mar-0">
 					<div class="col-12 pad-0">
 						<div class="banner-menu">
 							<h1>Order History</h1>
 							<div class="menu-ul">
 								<span class="menu-li"><a href="{{url('/')}}">Home</a></span>
 								<span class="menu-li">Order History</span>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 pad-0">
 						<div class="card">
 							<div class="card-header text-dark" style="background: #FF3D27">
 								Order history
 							</div>
 							<div class="card-body">
 								<table class="table table-hover">
 									<thead>
 										<tr>
 											<th scope="col">Invoice Id</th>
 											<th scope="col">Product Name</th>
 											<th scope="col">Price</th>
 											<th scope="col">Quantity</th>
 											<th scope="col">Date</th>
 											<th scope="col">Total</th>
 											<th scope="col">Status</th>
 										</tr>
 									</thead>
 									<tbody>
 										<tr>
 											<th scope="row">1</th>
 											<td>Mark</td>
 											<td>Otto</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 										</tr>
 										<tr>
 											<th scope="row">1</th>
 											<td>Mark</td>
 											<td>Otto</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 										</tr>
 										<tr>
 											<th scope="row">1</th>
 											<td>Mark</td>
 											<td>Otto</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 										</tr>
 										<tr>
 											<th scope="row">1</th>
 											<td>Mark</td>
 											<td>Otto</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 										</tr>
 										<tr>
 											<th scope="row">1</th>
 											<td>Mark</td>
 											<td>Otto</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 											<td>@mdo</td>
 										</tr>
 									</tbody>
 								</table>
 							</div>
 						</div>
 					</div>
 				</div>
 			</form>
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
 			</div>
 		</div>
 		<div class="col-12 col-md-8 col-lg-9 pad-r-0">
 			<div class="pro-filter-area1">
 				@include('front-end.pages.paginate-product1')
 			</div>
 		</div>
 	</div>
 </section>
 @endsection
 @section('script')
 <script>

 </script>
 @endsection