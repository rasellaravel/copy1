<div class="col-lg-3 col-md-3 col-6 pl-2 pr-2">
    <div class="igo-slider-6-wrap igo-slider-7 pro-box-style mb-3">
        <div class="igo-sider-item1">
            <div class="igo-slider-6 mb-3">
                <div class="card border-0 rounded-0">
                    <div class="igo-img-p">
                        <div class="igo-img-c">
                            <a href="{{ route('user.slugUrl', UrlHelper::product($item)) }}">
                                <img class="card-img-top igo-hover-img"
                                    src="{{ count($item->productAltImages) ? asset('uploads/product/alt/sm-' . $item->productAltImages[0]->img) : asset('uploads/sm-demo.png') }}"
                                    alt="image">
                            </a>
                        </div>
                        <div class="igo-cart-remove position-absolute">
                            <a href="javascript:void(0)" title="Remove item"
                                onclick="deleteFavorite({{ $item->id }})"
                                class="d-flex justify-content-center align-items-center">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="igo-pro-title-wrap d-flex align-items-center">
                            <h6 class="product-name single-line-dot">
                                <a href="{{ route('user.slugUrl', UrlHelper::product($item)) }}">
                                    @php echo $item->{'title_' . app()->getLocale()} @endphp
                                </a>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center pb-1">
                            <span class="price">
                                <span class="amount">
                                    <span class="currencySymbol">
                                        EUR
                                    </span>
                                    {{ number_format((float) PriceHelper::discount($item), 2, '.', '') }}
                                </span>
                                @if ($item->productPrice->discount)
                                    <span
                                        class="igo-old-price mr-2">{{ number_format((float) $item->productPrice->price, 2, '.', '') }}</span>
                                @endif
                            </span>
                        </div>
                        <div class="igo-addtocart-wrap d-none">
                            <a href="{{ route('user.slugUrl', UrlHelper::product($item)) }}"
                                class="igo-btn-one igo-btn">@lang('_lan.view_details')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
