<div id="cart_count">
    <div id="cart_count_inr">
        <span class="li-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-c">{{ count($carts) }}</span>
        </span>
        <br>
        <span class="li-txt">@lang('_lan.cart')</span>
    </div>
</div>


<div class="item-q-all cart-item-show" id="cart_popup">
    <div class="cartSection" id="cart_popup_inr">
        @php
        $total = 0;
        @endphp
        @foreach ($carts as $item)

        <a class="d-block" href="{{ $item['url'] }}">
            <div class="item-q align-items-center">
                @php $pro_id = $item['product_id']; @endphp
                <div class="pro-img" style="height: 80px;">
                    @if ($item['product_img'])
                    <img src="{{ $item['product_img'] ? asset('uploads/product/alt/sm-' . $item['product_img']) : asset('uploads/sm-demo.png') }}"
                    alt="Left Banner" class="img-responsive product-n cover">
                    @else
                    <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="img">
                    @endif
                </div>
                <div class="check-info" style="width: 80%; color: #000; font-size: 13px;">
                    <div class="name-i">{{ $item['product_title'] }}</div>
                    <div class="price-i">
                        <strong>
                            {{ $item['price'] * $item['quantity'] }}
                            <span class="euro-s">$</span>
                        </strong>
                        <span style="font-size: 10px;font-weight: 600;">
                            @if ($item['quantity'] > 1)
                            (Per piece {{ $item['price'] }} $ )
                            @endif
                        </span>
                    </div>
                    <div class="pc-i">
                        {{ $item['quantity'] }}
                        @if ($item['quantity'] == 1)
                        piece
                        @else
                        pieces
                        @endif
                    </div>
                </div>
                {{-- <div class="cansle-check">
                    <a href="javascript:void(0)" onclick="deleteProductFromCart('{{ $key }}')"><span
                        class="cansle-btn">X</span></a>
                    </div> --}}
                </div>
            </a>
            @endforeach

            {{-- <div class="justify-space-btwn"><span><span>Total</span> :</span> <span><span class="euro-s">$
            </span><strong>{{ $sub_total }}</strong></span> </div>
            @if (@$package)
            <div class="justify-space-btwn"><span><span>Discount</span> :</span> <span><span class="euro-s">$
            </span><strong>{{ $price_range_discount }}</strong></span> </div>
            @endif
            <div class="total-c-price justify-space-btwn"><span><span>Sub Total</span> :</span> <span><span class="euro-s">$
            </span><strong>{{ $sub_total - @$price_range_discount ?: 0 }}</strong></span> </div> --}}

            <div class="d-flex justify-content-between mt-2">
                <div class="checkout">
                    <a href="{{ route('cart.show') }}">
                        <button class="btn ctm-btn checkout-btn">@lang('_lan.cart')</button>
                    </a>
                </div>
                <div class="checkout">
                    <a href="{{ route('cart.checkout') }}">
                        <button class="btn ctm-btn checkout-btn">@lang('_lan.checkout')</button>
                    </a>
                </div>
            </div>

        </div>
    </div>
