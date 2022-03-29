<!-- Modal -->
<input type="hidden" name="order_id" value="{{ $order->id }}">
<div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab" href="#profile"
                            role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        <a class="nav-item nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab"
                            aria-controls="product" aria-selected="false">Product</a>
                        <a class="nav-item nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                            aria-controls="settings" aria-selected="false">Settings</a>
                    </div>
                </nav>


                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br />
                        <br />
                        <div style="display: flex;justify-content: center;">
                            <div style="width: 250px;height: 250px;overflow: hidden;">
                                @if ($order->user->userInfo->image)
                                    <img src="{{ asset('uploads/profiles/' . $order->user->userInfo->image) }}"
                                        style="height: 100%;width: 100%;object-fit: cover;"
                                        class="avatar img-circle img-thumbnail image" alt="avatar">
                                @else
                                    <img src="{{ asset('uploads/profile.webp') }}"
                                        style="height: 100%;width: 100%;object-fit: cover;"
                                        class="avatar img-circle img-thumbnail image" alt="avatar">
                                @endif
                            </div>
                        </div>
                        <br />
                        <ul class="list-group">
                            <li class="list-group-item text-muted font-20">User Information <i
                                    class="fa fa-cog fa-1x"></i></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>First Name :
                                    </strong><span class="first-name">{{ $order->name }}</span></span>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Last Name :
                                    </strong><span class="last-name">{{ $order->lastname }}</span></span>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Email :
                                    </strong><span class="email">{{ $order->email }}</span></span>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Phone :
                                    </strong><span
                                        class="phone">{{ $order->phone ?: $order->user->userInfo->phone }}</span></span>
                            </li>
                            @if($order->post_machine)        
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Paštomatas: </strong>
                                    <span
                                        class="apartment">{{ $order->post_machine }}</span>
                                </span>
                            </li>
                            @endif
                        </ul>
                        <br />
                        <ul class="list-group">
                            <li class="list-group-item text-muted font-20">Billing Information <i
                                    class="fa fa-address-card  fa-1x"></i></li>

                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Apartment: </strong>
                                    <span
                                        class="apartment">{{ $order->apartment ?: $order->user->userInfo->billing_apartment }}</span>
                                </span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left"><strong>Town : </strong>
                                    <span
                                        class="town">{{ $order->town ?: $order->user->userInfo->billing_town }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left"><strong>State : </strong>
                                    <span
                                        class="state">{{ $order->street_address ?: $order->user->userInfo->billing_strt_address }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>District : </strong>
                                    <span
                                        class="district">{{ $order->district ?: $order->user->userInfo->billing_district }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Country : </strong>
                                    <span
                                        class="country">{{ $order->country ?: $order->user->userInfo->billing_country }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Post Code : </strong>
                                    <span
                                        class="post-code">{{ $order->post_code ?: $order->user->userInfo->billing_post_code }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Order Note : </strong>
                                    <span class="order-note">{{ $order->order_note }}</span></span>
                            </li>
                        </ul>


                        <ul class="list-group">
                            <li class="list-group-item text-muted font-20">Company Information <i
                                    class="fa fa-address-card  fa-1x"></i></li>

                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Company name: </strong>
                                    <span
                                        class="apartment">{{ $order->company_name ?: $order->user->userInfo->company_name }}</span>
                                </span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left"><strong>Company id : </strong>
                                    <span
                                        class="town">{{ $order->company_id ?: $order->user->userInfo->company_id }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left"><strong>Company VAT : </strong>
                                    <span
                                        class="state">{{ $order->company_vat ?: $order->user->userInfo->company_vat }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Company address : </strong>
                                    <span
                                        class="district">{{ $order->company_address ?: $order->user->userInfo->company_address }}</span></span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Others : </strong>
                                    <span
                                        class="country">{{ $order->others ?: $order->user->userInfo->others }}</span></span>
                            </li>
                        </ul>


                    </div>
                    <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
                        <div class="dt-responsive table-responsive">
                            @include('back-end.payment-history.ordered-product')
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <ul class="list-group">
                            @if ($role == 1)
                                @if ($order->maintenance_charge)
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>Maintenance Charge: </strong>
                                        </span>
                                        <span
                                            class="pull-right">${{ number_format((float) $order->maintenance_charge, 2, '.', '') }}</span>
                                    </li>
                                @endif
                            @endif
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Total: </strong>
                                </span>
                                <span class="pull-right">
                                    @if ($role == 1)
                                        ${{ number_format((float) $order->total, 2, '.', '') }}
                                    @else
                                        ${{ number_format((float) $order->ordered_vendor[0]->total, 2, '.', '') }}
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Payment Method: </strong>
                                </span>
                                <span class="pull-right">{{ $order->payment_method }}</span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Shipping Type: </strong>
                                </span>
                                <span class="pull-right">{{ $order->shipping_type }}</span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Payment Status: </strong>
                                </span>
                                <span class="">
                                    <div class="form-check form-check-inline" style="margin-right: 15px">
                                        <input class="form-check-input" type="radio" name="is_paid" id="paid_status"
                                            value="1" {{ $order->is_paid ? 'checked' : '' }} onchange='isPaid()'>
                                        <label class="form-check-label" for="paid_status"
                                            style="padding-left: 0">Paid</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_paid" id="unpaid_status"
                                            value="0" {{ $order->is_paid ? '' : 'checked' }} onchange='isPaid()'>
                                        <label class="form-check-label" for="unpaid_status"
                                            style="padding-left: 0">Unpaid</label>
                                    </div>
                                </span>
                            </li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong>Shipping Status: </strong>
                                </span>
                                <span class="">
                                    <div class="form-check form-check-inline" style="margin-right: 15px">
                                        <input class="form-check-input" type="radio" name="shipping_status"
                                            id="shipping_pending" value="0"
                                            {{ $order->status == 0 ? 'checked' : '' }}
                                            onchange='shippingStatusChange()'>
                                        <label class="form-check-label" for="shipping_pending"
                                            style="padding-left: 0">Pending</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-right: 15px">
                                        <input class="form-check-input" type="radio" name="shipping_status"
                                            id="shipping_confirmed" value="1"
                                            {{ $order->status == 1 ? 'checked' : '' }}
                                            onchange='shippingStatusChange()'>
                                        <label class="form-check-label" for="shipping_confirmed"
                                            style="padding-left: 0">Confirmed</label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-right: 15px">
                                        <input class="form-check-input" type="radio" name="shipping_status"
                                            id="shipping_shipped" value="2"
                                            {{ $order->status == 2 ? 'checked' : '' }}
                                            onchange='shippingStatusChange()'>
                                        <label class="form-check-label" for="shipping_shipped"
                                            style="padding-left: 0">Shipped</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="shipping_status"
                                            id="shipping_delivered" value="3"
                                            {{ $order->status == 3 ? 'checked' : '' }}
                                            onchange='shippingStatusChange()'>
                                        <label class="form-check-label" for="shipping_delivered"
                                            style="padding-left: 0">Delivered</label>
                                    </div>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/tab-pane-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
