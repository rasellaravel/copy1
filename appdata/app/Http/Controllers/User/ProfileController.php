<?php

namespace App\Http\Controllers\User;

use App\Country;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use App\UserInformation;
use Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PDF;

class ProfileController extends Controller
{
    public function profile()
    {
        $data['user_info'] = UserInformation::where('user_id', auth()->user()->id)->first();
        $data['countries'] = Country::all();
        $data['orders'] = Order::where('user_id', auth()->user()->id)
            ->with('ordered_vendor.vendor', 'ordered_vendor.ordered_product.product', 'user.userInfo')
            ->orderBy('id', 'desc')
            ->get();
        $data['tab'] = session()->has('tab') ? session()->get('tab') : 1;
        return view('front-end.pages.user-profile', $data);
    }
    public function backToProfile()
    {
        $data['tab'] = 4;
        return redirect()->route('profile')->with($data);
    }

    public function viewOrder($id)
    {
        $data['order'] = Order::where('id', $id)
            ->with('ordered_vendor.vendor', 'ordered_vendor.ordered_product.product', 'user.userInfo')
            ->first();
        // dd($data['order']);

        //dd($data['order']->toArray());
        return view('front-end.pages.user-profile-details', $data);
    }
    public function updateInformation(Request $request)
    {
        if (User::whereNotIn('id', [auth()->user()->id])->where('email', $request->email)->exists()) {
            return redirect()->back()->with(['error' => 'Email already exist!', 'tab' => 1]);
        }
        $check = UserInformation::where('user_id', auth()->user()->id)->first();
        if ($request->image) {
            if ($check) {
                if ($check->image) {
                    if (file_exists('uploads/profiles/' . $check->image)) {
                        unlink('uploads/profiles/' . $check->image);
                    }
                }
            }
            $image = $request->file('image');
            $profile_pic = time() . '.webp';
            Image::make($image)->encode('webp', 50)->save('uploads/profiles/' . $profile_pic);
        }
        if ($check) {
            $info = UserInformation::find($check->id);
        } else {
            $info = new UserInformation;
        }
        $info->last_name = $request->last_name;
        $info->phone = $request->phone;
        if ($request->image) {
            $info->image = $profile_pic;
        }
        $info->save();
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with(['success' => 'Information updated successfully!', 'tab' => 1]);
    }
    public function updateBilling(Request $request)
    {
        $check = UserInformation::where('user_id', auth()->user()->id)->first();
        if ($check) {
            $info = UserInformation::find($check->id);
        } else {
            $info = new UserInformation;
        }
        $info->billing_country = $request->country;
        $info->billing_district = $request->district;
        $info->billing_town = $request->town;
        $info->billing_strt_address = $request->street_address;
        $info->billing_apartment = $request->apartment;
        $info->billing_post_code = $request->post_code;

        $info->company_name = $request->company_name;
        $info->company_id = $request->company_id;
        $info->company_vat = $request->company_vat;
        $info->company_address = $request->company_address;
        $info->others = $request->others;
        
        $info->save();
        return redirect()->back()->with(['success' => 'Billing updated successfully!', 'tab' => 2]);
    }
    public function updatePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $hasher = app('hash');
        if (!$hasher->check($request->old_password, $user->password)) {
            return redirect()->back()->with(['error' => 'Current password not match!', 'tab' => 3]);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with(['success' => 'Password updated successfully!', 'tab' => 3]);
    }

    public function downloadOrder( $id )
    {
        $data['order'] = Order::where('id', $id)
        ->with('ordered_vendor.vendor', 'ordered_vendor.ordered_product.product', 'user.userInfo')
        ->first();
        $pdf = PDF::loadView('front-end.pdf.order', $data);
        $fileName = 'invoice-'.$data['order']->order_id.'.pdf';
	    return $pdf->download($fileName);
    }
}
