<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class PaymentHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $checkRole = Admin::find(auth()->user()->id);
        $vendor = 0;
        if ($checkRole->role == 2) {
            $vendor = $checkRole->id;
        }
        if ($vendor) {
            $data['orders'] = Order::orderBy('id', 'desc')
                ->whereHas('ordered_vendor', function ($q) use ($vendor) {
                    $q->where('vendor_id', $vendor);
                })
                ->with([
                    'ordered_vendor' => function ($q) use ($vendor) {
                        $q->where('vendor_id', $vendor);
                    },
                    'user',
                ])
                ->get();
        } else {
            $data['orders'] = Order::orderBy('id', 'desc')->with('user')->get();
        }
        return view('back-end.payment-history.index', $data);
    }

    public function orderDetails(Request $request)
    {
        $checkRole = Admin::find(auth()->user()->id);
        $vendor = 0;
        $order_id = $request->id;
        if ($checkRole->role == 2) {
            $vendor = $checkRole->id;
        }
        $data['role'] = $checkRole->role;
        if ($vendor) {
            $data['order'] = Order::orderBy('id', 'desc')
                ->whereHas('ordered_vendor', function ($q) use ($vendor) {
                    $q->where('vendor_id', $vendor);
                })
                ->with([
                    'ordered_vendor' => function ($q) use ($vendor) {
                        return $q->where('vendor_id', $vendor)
                            ->with('vendor', 'ordered_product.product');
                    },
                    'user.userInfo',
                ])
                ->first();
        } else {
            $data['order'] = Order::where('id', $order_id)->with('ordered_vendor.vendor', 'ordered_vendor.ordered_product.product', 'user.userInfo')->first();

        }
        return view('back-end.payment-history.order-details', $data)->render();
    }
    public function isPaid(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->is_paid = $request->is_paid;
        $order->save();
    }
    public function shippingStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
    }
}
