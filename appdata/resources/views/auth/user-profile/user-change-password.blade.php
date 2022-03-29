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
 							<h1>Change Password</h1>
 							<div class="menu-ul">
 								<span class="menu-li"><a href="{{url('/')}}">Home</a></span>
 								<span class="menu-li">Change Password</span>
 							</div>
 						</div>
 					</div>
 					<div class="col-12 pad-0">
 						@if(Session::has('success'))
 						<div class="alert alert-success">{{Session::get('success')}}</div>
 						@endif
 						@if(Session::has('error'))
 						<div class="alert alert-danger">{{Session::get('error')}}</div>
 						@endif
 						<div class="card">
 							<div class="card-header text-dark" style="background: #FF3D27">
 								Change Password
 							</div>
 							<div class="card-body">
 								<div class="row">
 									<div class="col-6">
 										<div class="form-group">
 											<label>Current Password</label>
 											<input  required=""  type="Password" placeholder="current password" name="old_password" class="form-control">
 										</div>
 									</div>
 									<div class="col-6">
 										<div class="form-group">
 											<label>New Password</label>
 											<input   required="" type="password" placeholder="new password" name="new_password" class="form-control">
 										</div>
 									</div>
 								</div>
 								<button type="submit" form="updateUsrInfo" class="btn btn-primary"style="background: #FF3D27; border: none";>Update</button>
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