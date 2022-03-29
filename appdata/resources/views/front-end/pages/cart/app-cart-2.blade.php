<section class="pb-4 pt-2 igo-cart-wrapper">
    <div class="container">
        @if (count($carts))
            <div class="row">
                <div class="col-lg-12">
                    <div class="igo-cart2-warp">
                        <div id="accordion">
                            @php
                                $carts_m = [];
                                $sub_total = 0;
                            @endphp
                            @foreach ($carts as $key => $item)
                                @php
                                    $carts_m[$item['vendor_id']][$key] = $item;
                                @endphp
                            @endforeach

                            @foreach ($carts_m as $key => $value)
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center"
                                        id="headingOne{{ $key }}" data-toggle="collapse"
                                        data-target="#collapseOne{{ $key }}" aria-expanded="true"
                                        aria-controls="collapseOne{{ $key }}">
                                        <div class="igo-card-head-inner">
                                            <span>{{ count($value) }} @lang('_lan.items')</span>
                                        </div>
                                        <div class="igo-card-head-inner">
                                            <span><strong>@lang('_lan.total_price'):</strong></span>
                                            @php
                                                $vendor_total = 0;
                                                $vendor_shipping = 0;
                                            @endphp
                                            @foreach ($value as $item)
                                                @php
                                                    $vendor_total += $item['price'] * $item['quantity'];
                                                    $vendor_shipping += $item['shipping'];
                                                @endphp
                                            @endforeach
                                            @php
                                                $shipping_get = App\Shipping::where('vendor_id', $key)
                                                    ->where('country_id', $country_id)
                                                    ->get();
                                            @endphp
                                            @if ($shipping_get->max('max_price') < $vendor_shipping)
                                                @php
                                                    $vendor_shipping = $shipping_get->max('max_price');
                                                @endphp
                                            @endif
                                            <span class="theme-color">
                                                {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) ($vendor_total + $vendor_shipping), 2, '.', '') }}
                                            </span>
                                        </div>
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseOne{{ $key }}" aria-expanded="true"
                                                aria-controls="collapseOne{{ $key }}">
                                                <i class="far fa-chevron-down"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne{{ $key }}" class="collapse"
                                        aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="igo-app-cart2-warp mb-3">
                                                <ul class="list-unstyled">
                                                    @foreach ($value as $key1 => $item)
                                                        <li>
                                                            <div class="igo-app-cart-item">
                                                                <form action="{{ route('cart.delete', [$key1]) }}"
                                                                    method="post" id="deleteCart{{ $key1 }}">
                                                                    @csrf
                                                                </form>
                                                                <div
                                                                    class="igo-app-cart-top d-flex align-items-center justify-content-between">

                                                                    <a href="javascript:void(0)"
                                                                        onclick="$('#deleteCart{{ $key1 }}').submit()">
                                                                        <i class="fal fa-times"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)"
                                                                        class="btn btn-sm btn-info ml-2"
                                                                        data-toggle="modal" data-target="#cartUpdate"
                                                                        data-whatever="@mdo"
                                                                        onclick="cartUpdate('{{ $key1 }}')">@lang('_lan.update')</a>
                                                                </div>
                                                                <div class="igo-app-cart-mid">
                                                                    <a href="#">
                                                                        <img src="{{ $item['product_img'] ? asset('uploads/product/alt/sm-' . $item['product_img']) : asset('uploads/sm-demo.png') }}"
                                                                            alt="imgae">
                                                                    </a>
                                                                </div>
                                                                <div class="igo-app-cart-bottom">
                                                                    <div class="igo-app-cart-title text-center">
                                                                        <h3 class="igo-product-title"><a
                                                                                href="{{ $item['url'] }}">{{ $item['product_title'] }}</a>
                                                                        </h3>
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
                                                                    <div
                                                                        class="igo-app-cart-price d-flex justify-content-between align-items-center">
                                                                        <span
                                                                            class="igo-md-title-2">@lang('_lan.price'):</span>
                                                                        <span class="igo-sm-title-2">
                                                                            {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $item['price'], 2, '.', '') }}
                                                                        </span>
                                                                    </div>
                                                                    <div
                                                                        class="igo-app-cart-qty d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <span
                                                                                class="igo-md-title-2">@lang('_lan.quantity'):</span>
                                                                        </div>
                                                                        <div class="igo-sm-title-2">
                                                                            <span class="igo-md-title">
                                                                                {{ $item['quantity'] }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="igo-app-cart-subtotal d-flex justify-content-between align-items-center">
                                                                        <span
                                                                            class="igo-md-title-2">@lang('_lan.total'):</span>
                                                                        <span class="igo-sm-title-2">
                                                                            {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $item['price'] * $item['quantity'], 2, '.', '') }}
                                                                        </span>
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
                                                        <div class="mb-1">
                                                            <span
                                                                class="igo-md-title mr-3"><strong>@lang('_lan.subtotal'):</strong></span>
                                                            <span class="igo-md-title">
                                                                {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $vendor_total, 2, '.', '') }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-1">
                                                            <span
                                                                class="igo-md-title mr-3"><strong>@lang('_lan.shipping_cost'):</strong></span>
                                                            <span class="igo-md-title">
                                                                {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $vendor_shipping, 2, '.', '') }}
                                                            </span>
                                                        </div>
                                                        <div class="mb-1">
                                                            <span
                                                                class="igo-md-title mr-3"><strong>@lang('_lan.total'):</strong></span>
                                                            <span class="igo-md-title theme-color">
                                                                {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) ($vendor_total + $vendor_shipping), 2, '.', '') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $sub_total += $vendor_total + $vendor_shipping;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12 text-right">
                    <p class="mb-2">
                        <span class="igo-md-title-bold mr-3">@lang('_lan.subtotal'):</span>
                        <span class="igo-md-title">
                            {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $sub_total, 2, '.', '') }}
                        </span>
                    </p>
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
                                    {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $user_discount, 2, '.', '') }}
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
                                {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $package_discount, 2, '.', '') }}
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
                                {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $setting->maintenance_charge, 2, '.', '') }}
                            </span>
                        </p>
                    @endif
                    <p class="mb-2">
                        <span class="igo-md-title-bold mr-3">@lang('_lan.grand_total'):</span>
                        <span
                            class="igo-md-title igo-theme-color">{{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $sub_total, 2, '.', '') }}</span>
                    </p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <div class="cart-btn-1">
                            <button type="submit"
                                class="igo-btn igo-btn-one border-0">@lang('_lan.continue_shopping')</button>
                        </div>
                        <div class="cart-btn-2">
                            <button type="submit"
                                class="igo-btn igo-green-btn  border-0">@lang('_lan.checkout')</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-lg-12 text-center">
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
            </div>
        @endif
        <div class="modal fade" id="cartUpdate" tabindex="-1" role="dialog" aria-labelledby="cartUpdateLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartUpdateLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="product_filter_form" method="post" onsubmit="checkUpdatedField(event)"
                            action="{{ route('cart.item.update.byid') }}">
                            @csrf
                            <input type="hidden" value="" id="product_id" name="pro_id">
                            <input type="hidden" name="price" id="product_current_price">
                            <div class="form-group m-0 quantity1" id="quantityUpdate"></div>
                            <div class="form-group m-0" id="sizeUpdate"></div>
                            <div class="form-group m-0" id="colorUpdate"></div>
                            <div class="igo-p-price calculate mb-2">
                                <span class="igo-md-title-bold">
                                    @lang('_lan.price'):
                                    {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}
                                    <span class="amount"></span>
                                </span>
                                <span class="igo-md-title-bold text-danger select-all-filter d-none">
                                    <br />P<span class="text-lowercase">@lang('_lan.lease_select')</span>
                                </span>
                                <span class="igo-md-title-bold text-danger size-combination d-none">
                                    <br />T<span class="text-lowercase">@lang('_lan.size_combination_product')</span>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            form="product_filter_form">@lang('_lan.update')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
