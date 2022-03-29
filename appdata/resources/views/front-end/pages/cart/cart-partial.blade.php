<div class="igo-checkout-title mt-3">
    <h4 class="igo-lg-title font-size-16">@lang('_lan.view_cart')</h4>
</div>
@if (count($carts))
    <div class="igo-checkout-right igo-cart-wrapper">
        <div>
            <div class="py-2">
                <label class="m-0 igo-md-title-2"><input type="checkbox" class="custom-check" id="checkout_all"
                        {{ in_array(0, $is_checked) ? '' : 'checked' }} />
                    <span class="ml-2">@lang('_lan.select_all')</span></label>
            </div>
        </div>
        <div class="igo-cart2-warp">
            <div id="accordion">
                @php
                    $sub_total = 0;
                @endphp

                @foreach ($carts as $key => $value)
                    @php
                        $vendor_total = 0;
                        $vendor_shipping = 0;
                    @endphp
                    @foreach ($value as $item)
                        @php
                            $vendor_total += $item['price'] * $item['quantity'];
                            if (!is_array($item['shipping'])) {
                                $vendor_shipping += $item['shipping'];
                            } else {
                                $vendor_shipping = 0;
                            }
                            
                        @endphp
                    @endforeach

                    
                   @php 
                        $shipping_get = App\Shipping::where('vendor_id', $key)
                            ->where('country_id', $country_id)
                            ->get();
                    @endphp

                    @php
                        $av = App\Admin::where('id', $key)
                            ->first();
                    @endphp
                    @if ($shipping_get->max('max_price') < $vendor_shipping)
                        @php
                            $vendor_shipping = $shipping_get->max('max_price');
                        @endphp
                    @endif
                    

                    
                    <div class="card {{ $vendor_shipping == 0 ? 'border border-danger' : '' }}">
                        <div class="card-header d-flex justify-content-between align-items-center" id="headingOne">
                            <div>
                                <label class="m-0"><input type="checkbox" class="custom-check cart-checkbox"
                                        {{ $is_checked[$key] == 0 ? '' : 'checked' }}
                                        data-vendor="{{ $key }}" onchange="filterCartData(event)" /></label>
                            </div>
                            <div class="igo-card-head-inner">
                                <span>{{ count($value) }} @lang('_lan.items')</span>
                            </div>
                            <div class="igo-card-head-inner">
                                <span><strong>@lang('_lan.total_price'):</strong></span>
                                <span class="theme-color">
                                    €{{ number_format((float) ($vendor_total + $vendor_shipping), 2, '.', '') }}
                                </span>
                            </div>
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" id="headingOne{{ $key }}"
                                    data-toggle="collapse" data-target="#collapseOne{{ $key }}"
                                    aria-expanded="true" aria-controls="collapseOne{{ $key }}">
                                    <i class="fa fa-chevron-down text-dark"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne{{ $key }}" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body">
                                <div class="igo-app-cart2-warp mb-3">
                                    <ul class="list-unstyled">
                                        @foreach ($value as $key1 => $item)
                                            <li class="igo-checkout-cart-li">
                                                <div class="igo-cart-item-wrapper w-100">
                                                    <div class="igo-cart-item-warp d-flex w-100 align-items-center">
                                                        <div class="igo-cart-item-img">
                                                            <div class="igo-img-p">
                                                                <div class="igo-img-c">
                                                                    <img src="{{ $item['product_img'] ? asset('uploads/product/alt/sm-' . $item['product_img']) : asset('uploads/sm-demo.png') }}"
                                                                        alt="img">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="igo-cart-item-content">

                                                            <p class="igo-product-title m-0 pb-2">
                                                                <a
                                                                    href="{{ $item['url'] }}">{{ $item['product_title'] }}</a>
                                                            </p>

                                                            <div class="igo-cart-price">
                                                                <a href="#">
                                                                    <small class="igo-sm-title">
                                                                        {{ $item['quantity'] }} x</small>
                                                                    <strong class="igo-sm-title ">
                                                                        €{{ number_format((float) $item['price'], 2, '.', '') }}
                                                                    </strong>

                                                                    {{-- <span class="igo-sm-title text-danger"><del>$3572.00</del></span> --}}
                                                                </a>
                                                            </div>
                                                            @if ($item['size'])
                                                                <div>
                                                                    <span
                                                                        class="igo-sm-title-3">{{ $item['size'] }}</span>
                                                                </div>
                                                            @endif
                                                            @if ($item['color'])
                                                                <div>
                                                                    <span
                                                                        class="igo-sm-title-3">{{ $item['color'] }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="igo-app-cart-item mt-2">
                                                    <div class="igo-app-cart-bottom">
                                                        <div
                                                            class="igo-app-cart-subtotal d-flex justify-content-between align-items-center">
                                                            <span class="igo-md-title-2">@lang('_lan.total'):</span>
                                                            <span
                                                                class="igo-md-title-2">€{{ number_format((float) $item['price'] * $item['quantity'], 2, '.', '') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-around flex-wrap">
                                            @if (is_array($item['shipping']))
                                                <div class="mb-1">
                                                    <span class="mr-1 text-center text-danger">
                                                        @if ($item['shipping']['type'] == 'country')
                                                            @lang('_lan.country_error')
                                                        @elseif ($item['shipping']['type'] == 'type')
                                                            @lang('_lan.type_error')
                                                        @endif
                                                    </span>
                                                </div>
                                            @endif
                                            <div class="mb-1">
                                                <span
                                                    class="igo-md-title mr-1"><strong>@lang('_lan.subtotal'):</strong></span>
                                                <span class="igo-md-title">
                                                    €{{ number_format((float) $vendor_total, 2, '.', '') }}
                                                </span>
                                            </div>
                                            <div class="mb-1">
                                                <span
                                                    class="igo-md-title mr-1"><strong>@lang('_lan.shipping'):</strong></span>
                                                <span class="igo-md-title">
                                                    €{{ number_format((float) $vendor_shipping, 2, '.', '') }}
                                                </span>
                                            </div>
                                            <div class="mb-1">
                                                <span
                                                    class="igo-md-title mr-1"><strong>@lang('_lan.total'):</strong></span>
                                                <span class="igo-md-title theme-color">
                                                    €{{ number_format((float) ($vendor_total + $vendor_shipping), 2, '.', '') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($is_checked[$key])
                        @php
                            $sub_total += $vendor_total + $vendor_shipping;
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-12">
            {{-- commented --}}
                {{-- <div class="form-group">
                    <label for="exampleFormControlSelect1" class="igo-md-title-2">@lang('_lan.country'):</label>
                    <select class="form-control" onchange="filterCartData(event)" id="shipping_country">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"
                                {{ $country->id == $country_id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1" class="igo-md-title-2">@lang('_lan.shipping_type'):</label>
                    <select class="form-control" onchange="filterCartData(event)" id="shipping_type">
                        @foreach ($shipping_types as $key => $type)
                            <option value="{{ $type->id }}" {{ $type->id == $type_id ? 'selected' : '' }}>
                                {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                {{-- commented --}}
            </div>
            <div class="col-lg-12 text-right">
                <p class="mb-2">
                    <span class="igo-md-title-bold mr-3">@lang('_lan.subtotal'):</span>
                    <span class="igo-md-title">
                        €{{ number_format((float) $sub_total, 2, '.', '') }}
                    </span>
                </p>
                {{-- commented --}}
                {{-- @if (auth()->check())
                    @if (auth()->user()->userInfo->discount)
                        <p class="mb-2">
                            <span class="igo-md-title-bold mr-3">@lang('_lan.user_discount'):</span>
                            <span class="igo-md-title">
                                @php
                                    $user_discount = ($sub_total * auth()->user()->userInfo->discount) / 100;
                                    $sub_total = $sub_total - $user_discount;
                                @endphp
                                -
                                €{{ number_format((float) $user_discount, 2, '.', '') }}
                            </span>
                        </p>
                    @endif
                @endif
                @php
                    $package = App\Package::where('package_price', '<=', $sub_total)
                        ->orderBy('package_price', 'DESC')
                        ->first();
                @endphp
                @if ($package)
                    <p class="mb-2">
                        <span class="igo-md-title-bold mr-3">@lang('_lan.pakage_discount'):</span>
                        <span class="igo-md-title">
                            @php
                                $package_discount = ($package->package_discount * $sub_total) / 100;
                                $sub_total = $sub_total - $package_discount;
                            @endphp
                            -
                            €{{ number_format((float) $package_discount, 2, '.', '') }}
                        </span>
                    </p>
                @endif --}}
                @php
                    $setting = App\Setting::orderBy('id', 'DESC')->first();
                    $sub_total = $sub_total < $setting->min_price ? $sub_total + $setting->maintenance_charge : $sub_total;
                @endphp
                @if ($sub_total < $setting->min_price)
                    <p class="mb-2">
                        <span class="igo-md-title-bold mr-3">@lang('_lan.maintenance_charge'):</span>
                        <span class="igo-md-title">
                            €{{ number_format((float) $setting->maintenance_charge, 2, '.', '') }}
                        </span>
                    </p>
                @endif
                {{-- commented --}}
                <p class="mb-2">
                    <span class="igo-md-title-bold mr-3">@lang('_lan.grand_total'):</span>
                    <span
                        class="igo-md-title igo-theme-color">€{{ number_format((float) $sub_total, 2, '.', '') }}</span>
                </p>
            </div>
        </div>
    </div>
@else
    <div class="text-center p-60">
        <div>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 368 368" style="enable-background:new 0 0 368 368;" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <path
                                    d="M184,224c-29.824,0-58.232,12.632-77.96,34.664c-2.944,3.296-2.664,8.344,0.624,11.296c1.52,1.368,3.432,2.04,5.336,2.04     c2.192,0,4.384-0.896,5.96-2.664C134.656,250.688,158.728,240,184,240c25.28,0,49.352,10.688,66.04,29.336     c2.944,3.296,8.008,3.568,11.296,0.624c3.288-2.944,3.568-8,0.624-11.296C242.24,236.64,213.832,224,184,224z" />
                                <path
                                    d="M184,0C82.536,0,0,82.544,0,184s82.536,184,184,184s184-82.544,184-184S285.464,0,184,0z M184,352     c-92.632,0-168-75.36-168-168S91.368,16,184,16s168,75.36,168,168S276.632,352,184,352z" />
                                <path
                                    d="M280,128c-4.424,0-8,3.584-8,8c0,13.232-10.768,24-24,24s-24-10.768-24-24c0-4.416-3.576-8-8-8s-8,3.584-8,8     c0,22.056,17.944,40,40,40c22.056,0,40-17.944,40-40C288,131.584,284.424,128,280,128z" />
                                <path
                                    d="M160,136c0-4.416-3.576-8-8-8s-8,3.584-8,8c0,13.232-10.768,24-24,24s-24-10.768-24-24c0-4.416-3.576-8-8-8s-8,3.584-8,8     c0,22.056,17.944,40,40,40C142.056,176,160,158.056,160,136z" />
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
        </div>
        <span>@lang('_lan.not_found')</span>
    </div>
@endif
