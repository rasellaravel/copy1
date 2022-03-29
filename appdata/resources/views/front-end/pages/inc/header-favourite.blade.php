<a href="{{ route('favorite.show') }}">
    <div id="favorite_count">
        <div id="favorite_count_inr">
            <span class="li-icon">
                <i class="far fa-heart"></i>
                <span class="cart-c">{{ count($favorites) }}</span>
            </span>
            <br>
            <span class="li-txt">
                @lang('_lan.wish_list')
            </span>
        </div>
    </div>
</a>
{{-- <div class="item-q-all cart-item-show">
    <div id="favouriteSection">
        @foreach ($favourites as $item)
            @php
                $quantity = 1;
                $pro_id = $item->id;
            @endphp
            <a href="3">
                <div class="item-q">
                    <div class="pro-img">
                        <a href="{{ url('product-details', [$pro_id]) }}">
                            @if ($item['product_img'])
                                <img src="{{ asset('proAltImg/' . $item->product_img) }}" alt="Left Banner"
                                    class="img-responsive product-n cover">
                            @else
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="img">
                            @endif
                        </a>
                    </div>
                    <div class="check-info">
                        <a href="{{ url('product-details', [$pro_id]) }}">
                            <div class="name-i"></div>
                            <div class="price-i">
                                <strong>
                                    @if ($item->productSizes)
                                        <span class="euro-s">$</span> {{ $item->productSizes->min('price') }} -
                                        <span class="euro-s">$</span> {{ $item->productSizes->max('price') }}
                                    @else
                                        <span class="euro-s">$</span>
                                        {{ $item->productPrice ? $item->productPrice->price : 0 }}
                                    @endif
                                </strong>
                            </div>
                            <div class="pc-i">
                                {{ $quantity }}
                                piece
                            </div>
                        </a>
                    </div>
                    <div class="cansle-check">
                        <a href="javascript:void(0)" onclick="deleteProductFromFavourite('')"><span
                                class="cansle-btn">X</span></a>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div> --}}
