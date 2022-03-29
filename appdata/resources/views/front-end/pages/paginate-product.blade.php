@if (count($products))
    <div class="product-list top-product-section">
        <div class="short-select float-right d-none">
            <div class="ctm-select">
                <div class="ctm-select-txt pad-l-10">
                    <span>@lang('_lan.Sort_by'):</span>
                    <span class="select-txt duration1" duration1="0" id="category">@lang('_lan.relevancy')</span>
                    <span class="select-arr"><i class="fas fa-caret-down"></i></span>
                </div>
                <div class="ctm-option-box">
                    <div class="ctm-option">@lang('_lan.relevancy')</div>
                    <div class="ctm-option">@lang('_lan.topCustomerReviews')</div>
                    <div class="ctm-option">@lang('_lan.highestPrice')</div>
                    <div class="ctm-option">@lang('_lan.lowestPrice')</div>
                    <div class="ctm-option">@lang('_lan.mostRecent')</div>
                </div>
            </div>
        </div>
        <div class="row m-0">
            @foreach ($products as $product)
                <div class="col-6 col-lg-4 p-0">
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
                                <h6 class="product-name single-line-dot">
                                    <a href="{{ route('user.slugUrl', UrlHelper::product($product)) }}">
                                        @php echo $product->{'title_' . app()->getLocale()} @endphp
                                    </a>
                                </h6>
                                <div class='rating-stars my-1'>
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
    </div>
    <div class="product-pagination text-center pagination-custom">
        {{ $products->links() }}
    </div>
@else
    <div class="col-lg-12 text-center">
        <div class="text-center">
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
            <span>@lang('_lan.no_product_available')</span>
        </div>
    </div>
@endif
