@if ($releteds->count() > 0)
<div class="col-12 p-0 mt-5">
    <div class="tlt-part">
        <h2 class="border-tlt text-center pb-3">@lang('_lan.related')  @lang('_lan.products')</h2>
    </div>
    <div class="swiper-container related-products-container">
        <div class="swiper-wrapper">
           @foreach ($releteds as $product)
           <div class="swiper-slide">
             <div class="product">
                <div class="single-product single-product-show">
                    <div class="show-img-pp">
                        <a class="show-img-p d-block scale-hover" href="{{ route('user.slugUrl', UrlHelper::product($product)) }}">
                            @if ($product->product_img)
                            <img src="{{ asset('uploads/product/alt/sm-' . $product->product_img) }}"
                            alt="Left Banner" class="cover product-n">
                            <img src="{{ asset('uploads/product/alt/sm-' . $product->product_img) }}"
                            alt="Left Banner" class="cover product-h d-none">
                            @else
                            <img src="{{ asset('assets/img/logo.png') }}" class="cover" alt="img">
                            @endif
                        </a>

                    </div>
                    <div class="product-info">
                        <h6 class="product-name single-line-dot mb-2">
                            <a href="{{ route('user.slugUrl', UrlHelper::product($product)) }}">
                                @php echo $product->{'title_' . app()->getLocale()} @endphp
                            </a>
                        </h6>
                        <div class='rating-stars my-1 d-none'>
                            <ul id='stars'>
                                <li class='star selected' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star selected' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>
                        <span class="price">
                            <span class="amount">
                                <span class="currencySymbol">
                                    EUR
                                </span>
                                {{ number_format((float) PriceHelper::discount($product), 2, '.', '') }}
                            </span>
                            @if ($product->productPrice->discount)
                            <span
                            class="igo-old-price mr-2">{{ number_format((float) $product->productPrice->price, 2, '.', '') }}</span>
                            @endif
                        </span>
                        {{-- <div class="button-group d-none">
                            <div class="wishlist" title="Add to Wishlist"
                            onclick="adToFavourite('{{ $product->id }}')"><a
                            href="#"><span>wishlist</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart" title="Add to Cart"
                            onclick="adTocart('{{ $product->id }}')"><a href="#"><span>Add to
                            cart</span></a></div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Add Pagination -->
    <!-- Add Arrows -->
    <div class="swiper-button-prev related-products-prev"></div>
    <div class="swiper-button-next related-products-next"></div>
</div>
</div>
@endif