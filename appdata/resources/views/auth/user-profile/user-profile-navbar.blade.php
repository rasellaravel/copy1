@php $get_user_info = App\UserInformation::where('user_id', Auth::user()->id)->first(); @endphp
<div class="container d-flex justify-content-center bg-light"style="padding-bottom: 30px;">
	<div class="card mt-5 pb-3">
		<div class="media">
			@if($get_user_info->image)
			<img src="{{asset('UserProfilePic/'.$get_user_info->image)}}" class="mr-3" height="100">
			@else
			<img src="{{asset('UserProfilePic/user-pic.png')}}" class="mr-3" height="100">
			@endif 
			<div class="media-body">
				<h5 class="mt-5 mb-0 text-capitalize"style="font-size: 14px;">{{Auth::user()->name}} {{$get_user_info->last_name}}</h5>
			</div>
		</div>
		<a href="{{url('user-profile')}}">
			<div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3 <?= $menu == 1? 'sample':''?>">
				<div class="d-flex flex-row align-items-center"><i class="fas fa-home"></i>
					<div class="d-flex flex-row align-items-start ml-3 "><span>Home</span></div>
				</div>
				<div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right <?= $menu == 1? 'preview':''?>"></i></div>
			</div>
		</a>
		<a href="{{url('user-billing-address')}}">
			<div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3 <?= $menu == 2? 'sample':''?>">
				<div class="d-flex flex-row align-items-center"><i class="fas fa-map-marker"></i>
					<div class="d-flex flex-row align-items-start ml-3"><span>Billing Address</span></div>
				</div>
				<div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right <?= $menu == 2? 'preview':''?>"></i></div>
			</div>
		</a>
		<a href="{{url('user-change-password')}}">
			<div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3 <?= $menu == 3? 'sample':''?>">
				<div class="d-flex flex-row align-items-center"><i class="fas fa-lock"></i>
					<div class="d-flex flex-row align-items-start ml-3"><span>Change Password</span></div>
				</div>
				<div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right <?= $menu == 3? 'preview':''?>"></i></div>
			</div>
		</a>
		<a href="{{url('user-order-history')}}">
			<div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3">
				<div class="d-flex flex-row align-items-center"><i class="fas fa-flag"></i>
					<div class="d-flex flex-row align-items-start ml-3"><span>My Order</span></div>
				</div>
				<div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right"></i></div>
			</div>
		</a>
		<a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
			<div class="d-flex flex-row justify-content-between align-items-center p-3 mx-3">
				<div class="d-flex flex-row align-items-center"><i class="fas fa-sign-out-alt"></i>
					<div class="d-flex flex-row align-items-start ml-3"><span>Logout</span></div>
				</div>
				<div class="d-flex flex-row align-items-center mt-2"><i class="fas fa-angle-right"></i></div>
			</div>
		</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
	</div>
</div>