<div class="row">
    <div class="col-lg-12">
        <div class="igo-cart-1-warp">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10%"> @lang('_lan.product')</th>
                            <th width="30%">@lang('_lan.name')</th>
                            <th width="15%">@lang('_lan.price')</th>
                            <th width="10%">@lang('_lan.qty')</th>
                            <th width="15%">@lang('_lan.total')</th>
                            <th width="20%">@lang('_lan.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                        @forelse ($carts as $key => $item)
                            @php
                                $total = ($item['discount_price'] ? number_format((float) ($item['price'] - $item['discount_price']), 2, '.', '') : number_format((float) $item['price'], 2, '.', '')) * $item['quantity'];
                            @endphp
                            <tr>
                                <td>
                                    @if ($item['product_img'])
                                        <img src="{{ asset('uploads/product/alt/' . $item['product_img']) }}"
                                            alt="img" width="100">
                                    @else
                                        <img src="{{ asset('uploads/demo.webp') }}" alt="img" width="100">
                                    @endif
                                </td>
                                <td>
                                    <h4 class="igo-single-text-dot"><a href="{{ $item['url'] }}"
                                            class="common-text">{{ $item['product_title'] }}</a></h4>
                                    <div>
                                        {{ $item['size'] }}
                                    </div>
                                </td>
                                <td> <span
                                        class="common-text">${{ $item['discount_price'] ? number_format((float) ($item['price'] - $item['discount_price']), 2, '.', '') : number_format((float) $item['price'], 2, '.', '') }}</span>
                                </td>
                                <td> <input class="form-control igo-qty" type="number" value="{{ $item['quantity'] }}"
                                        readonly> </td>
                                <td> <span class="common-text">${{ number_format((float) $total, 2, '.', '') }}</span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info igo-custom-btn-2" data-toggle="modal"
                                        data-target="#exampleModal" data-whatever="@mdo"
                                        onclick="getCartProduct('{{ $key }}')">@lang('_lan.update')</button>
                                    <button type="submit" class="btn btn-sm btn-warning" form="delete_cart"><i
                                            class="fal fa-times"></i></button>
                                    <form method="post" action="{{ route('cart.delete', [$key]) }}" id="delete_cart">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @php
                                $subtotal += $total;
                            @endphp
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">@lang('_lan.no_product_available')</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 text-right">
        <p>
            <span class="md-title-2 mr-3">@lang('_lan.subtotal'):</span>
            <span
                class="md-title-2 theme-color">{{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $subtotal, 2, '.', '') }}</span>
        </p>
        @if (auth()->check())
            @if (auth()->user()->userInfo->discount)
                @php
                    $user_discount = ($sub_total * auth()->user()->userInfo->discount) / 100;
                    $sub_total = $sub_total - $user_discount;
                @endphp
                <p>
                    <span class="md-title-2 mr-3">@lang('_lan.subtotal'):</span>
                    <span
                        class="md-title-2 theme-color">{{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $user_discount, 2, '.', '') }}</span>
                </p>
            @endif
        @endif
        @php
            $package = App\Package::where('package_price', '<=', $sub_total)
                ->orderBy('package_price', 'DESC')
                ->first();
        @endphp
        @if ($package)
            @php
                $package_discount = ($package->package_discount * $sub_total) / 100;
                $sub_total = $sub_total - $package_discount;
            @endphp
            <p>
                <span class="md-title-2 mr-3">@lang('_lan.subtotal'):</span>
                <span
                    class="md-title-2 theme-color">{{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ number_format((float) $package_discount, 2, '.', '') }}</span>
            </p>
        @endif
        <div class="igo-cart-btn-1">
            <a href="{{ route('home') }}"
                class="btn btn-primary igo-custom-btn-2 border-0">@lang('_lan.continue_shopping')</a>
            <a href="{{ route('cart.checkout') }}"
                class="btn btn-primary igo-custom-btn-2 border-0">@lang('_lan.checkout')</a>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">@lang('_lan.cart_update')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="cart-filter-area form-group"></div>
                <div class="qty-cart pt-2 overflow-hidden">
                    <select name="quantity" class="form-control float-left">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">@lang('_lan.qty'): {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="pro-checkbox pt-4">
                    <h4 class="normal-text"> @lang('_lan.Timber_Frame_base'):</h4>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="exampleCheck1" name="timber_frame" value="0"
                            checked>
                        <label class="form-check-label font-weight-bold" for="exampleCheck1">
                            @lang('_lan.none')</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="exampleCheck2" name="timber_frame" value="1">
                        <label class="form-check-label font-weight-bold"
                            for="exampleCheck2">@lang('_lan.available_with_installation')</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="selected_cart_item" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('_lan.close')</button>
                <button type="button" class="btn btn-primary" onclick="updateCartById()">@lang('_lan.update')</button>
            </div>
        </div>
    </div>
</div>
