<?php

namespace App\Http\Controllers\User;

use Auth;
use App\User;
use App\Order;
use App\UserInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
	public function userProfile(){
		$data['menu'] = 1;
		$data['user_info'] = UserInformation::where('user_id', Auth::user()->id)->first();
		return view('auth.user-profile.user-profile', $data);
	}
	public function userBillingAddress(){
		$data['menu'] = 2;
		$data['user_info'] = UserInformation::where('user_id', Auth::user()->id)->first();
		return view('auth.user-profile.user-billing-address', $data);
	}
	public function userChangePassword(){
		$data['menu'] = 3;
		return view('auth.user-profile.user-change-password', $data);
	}
	public function userOrderHistory(){
		$data['menu'] = 4;
		return view('auth.user-profile.user-order-history', $data);
	}

	public function updateUserInfo(Request $request){

		if ($request->image) {
			$image = $request->file('image');
			$profile_pic = time() . '.' . $image->getClientOriginalExtension();
			$image->move('UserProfilePic',$profile_pic);
		}
		$data['info'] = UserInformation::where('user_id', Auth::user()->id)->first();
		if ($data['info']) {
			$data['info']->last_name =  $request->last_name;
			$data['info']->phone = $request->phone;
			if ($request->image){
				$data['info']->image = $profile_pic; 
			}
			$data['info']->save();
		}
		$data['user'] = User::where('id', Auth::user()->id)->update([
			'name' => $request->first_name,
		]);

		return redirect()->back()->with('success', 'inforamtion updated successfully!');
	}

	public  function updateUserBilling(Request $request){
		$data['info'] = UserInformation::where('user_id', Auth::user()->id)->first();
		if ($data['info']) {
			$data['info']->billing_country =  $request->country;
			$data['info']->billing_district =  $request->district;
			$data['info']->billing_town =  $request->town;
			$data['info']->billing_strt_address =  $request->street_address;
			$data['info']->billing_apartment =  $request->apartment;
			$data['info']->billing_post_code =  $request->post_code;
			$data['info']->save();
		}
		return redirect()->back()->with('success', 'inforamtion updated successfully!');
	}

	public function updateUserPassword(Request $request){
		$match_pass  = $request->old_password;
		$user = User::where('id',Auth::user()->id)->first();		
		if (Hash::check($match_pass, $user->password)) { 
			$user->fill([
				'password' => Hash::make($request->new_password)
			])->save();
		}else{
			return redirect()->back()->with('error', 'password does not match!');
		}
		return redirect()->back()->with('success', 'password changed successfully!');
	}
	public function paymentHistory()
	{
		$data['menu'] = 4;
		$data['orders'] = Order::where('user_id',auth()->user()->id)->with('ordered_product.product', 'user.userInfo')->orderBy('id','desc')->get();
		return view('auth.user-profile.user-payment-history',$data);
	}

	public function paymentHistoryOrder(Request $request)
	{
		$order_id = $request->id;
		$data['order'] = Order::where('id',$order_id)->with('ordered_product.product', 'user.userInfo')->first();
		return view('auth.user-profile.payment-history-order-details', $data)->render();

	}
}
