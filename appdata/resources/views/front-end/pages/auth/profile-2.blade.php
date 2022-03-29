<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="heading-area mb-20 text-center">
                <h1 class="igo-lg-title">@lang('_lan.order_details')</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="igo-back-btn mb-20">
                <a href="{{ route('profile.back') }}"
                    class="igo-btn igo-green-btn btn btn-success border-0">@lang('_lan.back')</a>
            </div>
        </div>
    </div>
</div>

<div class="container igo-emp-profile mb-4">
    <form method="post">
        <div class="row">
            <div class="col-md-3 col-lg-2">
                <div class="igo-profile-img rounded">
                    <div class="igo-img-p">
                        <div class="igo-img-c">
                            @if ($order->user->userInfo->image)
                                <img src="{{ asset('uploads/profiles/' . $order->user->userInfo->image) }}" alt="img"
                                    class="img-thumbnail" id="profile_img">
                            @else
                                <img src="{{ asset('uploads/profile.webp') }}" alt="img" class="img-thumbnail"
                                    id="profile_img">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-10">
                <div class="profile-head">
                    <h5 class="lg-title">
                        {{ $order->name . ' ' . $order->lastname }}
                    </h5>
                    <h6 class="normal-text">
                        {{ $order->email }}
                    </h6>
                    <p class="normal-text">{{ $order->phone }}</p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">@lang('_lan.billing_information')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">@lang('_lan.setting')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#product" role="tab"
                                aria-controls="product" aria-selected="false"
                                onclick="showOrderData()">@lang('_lan.product')</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            <div class="card-body">
                                @if($order->post_machine)
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">Paštomatas</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->post_machine }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.apartment') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->apartment }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.town') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->town }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.state') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->street_address }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.district') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->district }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.country') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->country }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.post_code') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->post_code }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.order_note') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->order_note }}</p>
                                    </div>
                                </div>

                                @if($order->company_name)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="igo-md-title-2 ">@lang('_lan.company_name') :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="igo-sm-title">{{ $order->company_name }}</p>
                                        </div>
                                    </div>
                                @endif 

                                @if($order->company_id)   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="igo-md-title-2 ">@lang('_lan.company_id') :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="igo-sm-title">{{ $order->company_id }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if($order->company_vat)   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="igo-md-title-2 ">@lang('_lan.company_vat') :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="igo-sm-title">{{ $order->company_vat }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if($order->company_address)    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="igo-md-title-2 ">@lang('_lan.company_address') :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="igo-sm-title">{{ $order->company_address }}</p>
                                        </div>
                                    </div>
                                @endif 

                                @if($order->others)    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="igo-md-title-2 ">@lang('_lan.others') :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="igo-sm-title">{{ $order->others }}</p>
                                        </div>
                                    </div>
                                @endif    
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @if ($order->maintenance_charge)
                                        <div class="col-md-6">
                                            <label class="igo-md-title-2 ">Maintenance Charge :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="igo-sm-title">
                                                ${{ number_format((float) $order->maintenance_charge, 2, '.', '') }}
                                            </p>
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.total') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">
                                            ${{ number_format((float) $order->total, 2, '.', '') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.payment_method') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->payment_method }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">Shipping Type :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="igo-sm-title">{{ $order->shipping_type }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="igo-md-title-2 ">@lang('_lan.payment_status') :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="paid_status" name="is_paid"
                                                class="custom-control-input" disabled
                                                {{ $order->is_paid ? 'checked' : '' }}>
                                            <label class="custom-control-label igo-sm-title"
                                                for="paid_status">@lang('_lan.paid')</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="unpaid_status" name="is_paid"
                                                class="custom-control-input" disabled
                                                {{ $order->is_paid ? '' : 'checked' }}>
                                            <label class="custom-control-label igo-sm-title"
                                                for="unpaid_status">@lang('_lan.unpaid')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product" role="product" aria-labelledby="product-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body" id="orderDataTable">
                                        <div id="orderDataTableInr" class="igo-profile-1-table">
                                            <table class="table table-bordered dt-responsive nowrap" id="ordersData"
                                                style="width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('_lan.product')</th>
                                                        <th>@lang('_lan.information')</th>
                                                        <th>@lang('_lan.price')</th>
                                                        <th>@lang('_lan.qty')</th>
                                                        <th>@lang('_lan.total')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $n = 1;
                                                    @endphp
                                                    @foreach ($order->ordered_vendor as $val)
                                                        @foreach ($val->ordered_product as $item)
                                                            <tr>
                                                                <th scope="row">{{ $n++ }}</th>
                                                                <td>
                                                                    <a href="{{ route('user.slugUrl', UrlHelper::product($item->product)) }}"
                                                                        class="white-space-normal font-size-15">
                                                                        @php echo $item->product->{'title_' . app()->getLocale()} @endphp</a>
                                                                </td>
                                                                <td>
                                                                    <span class="igo-sm-title white-space-normal">
                                                                        @if ($item->{'size_' . app()->getLocale()})
                                                                            @php echo $item->{'size_' . app()->getLocale()} @endphp
                                                                        @endif
                                                                        @if ($item->{'color_' . app()->getLocale()})
                                                                            <br />
                                                                            @php echo $item->{'color_' . app()->getLocale()} @endphp
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td class="font-size-15">
                                                                    {{ number_format((float) $item->price, 2, '.', '') }}
                                                                </td>
                                                                <td class="font-size-15">{{ $item->quantity }}</td>
                                                                <td class="font-size-15">
                                                                    {{ number_format((float) $item->total, 2, '.', '') }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
