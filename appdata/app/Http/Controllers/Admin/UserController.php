<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Favourite;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderedProduct;
use App\User;
use App\UserInformation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function users()
    {
        if (auth()->user()->role == 2) {
            return redirect()->route('admin.dashboard');
        }

        $data['data'] = User::orderBy('id', 'DESC')->with('userInfo')->get();
        $data['m_m_n'] = 'users';
        $data['m_n'] = 'user-list';
        return view('back-end.users.user-list', $data);
    }
    public function deletePartner(Request $req)
    {
        $img_d = Partner::find($req->id)->img;
        if (file_exists('partners/' . $img_d)) {
            unlink('partners/' . $img_d);
        }
        $img = Partner::find($req->id)->delete();

        $imgs = Partner::orderBy('id', 'DESC')->get();

        $n = 0;
        $html = '';
        foreach ($imgs as $value) {
            $html .= '<tr class="tr-' . ++$n . '">' .
            '<td>' . $n . '</td>
			<td class="td-' . $n . '"><img src="' . asset('partners/' . $value->img) . '" class="img-fluid" style="max-width: 100px"></td>
			<td>
			<button type="button" onclick="editPartner(' . $value->id . ', ' . $n . ')" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
			<button class="btn btn-sm btn-danger" onclick="deletePartner(' . $value->id . ')"><i class="icon-trash"></i></button>
			</td>
			</tr>';
        }
        return $html;
    }
    public function getUser(Request $req)
    {
        return User::where('id', $req->id)->with('userInfo')->first();
    }
    public function updateDiscount(Request $req)
    {
        if (!is_numeric($req->discount)) {
            return "error";
        }
        $user = User::find($req->id)->userInfo()->update(['discount' => $req->discount]);
        return $req->discount;
    }
    public function about()
    {
        $data['about'] = About::orderBy('id', 'DESC')->first();
        $data['m_m_n'] = 'about';
        // $data['m_n'] = 'main_slider';

        return view('back-end.about.about', $data);
    }
    public function insertAbout(Request $req)
    {
        if (@$req->img) {
            $img = $req->file('img');
            $img_name = time() . '.' . $img->getClientOriginalExtension();
            $img->move('about', $img_name);
        }
        $abouts_check = About::orderBy('id', 'DESC')->first();
        if ($abouts_check) {
            $about = About::find($abouts_check->id);
        } else {
            $about = new About;
        }
        $about->description_en = $req->description_en;
        $about->description_lt = $req->description_lt;
        $about->description_rus = $req->description_rus;
        if (@$img_name) {
            $about->img = $img_name;
        }
        $about->save();

        // return 'true';
        $abouts = About::orderBy('id', 'DESC')->first();
        return $abouts;
    }

    public function deleteUser(Request $request)
    {
        User::where('id', $request->id)->delete();
        UserInformation::where('user_id', $request->id)->delete();
        Cart::where('user_id', $request->id)->delete();
        Favourite::where('user_id', $request->id)->delete();
        $order = Order::where('user_id', $request->id)->first();
        if ($order) {
            OrderedProduct::where('order_id', $order->id)->delete();
            $order->delete();
        }
        $user = User::orderBy('id', 'DESC')->get();

        $html = view('back-end.users.user-view')->with(['data' => $user])->render();

        return $html;
    }
}
