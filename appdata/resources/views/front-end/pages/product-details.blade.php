@extends('front-end.app')
@section('style')
<style>
    .product .single-product .pro-d .button-group {
        /* top: -28px; */
    }

    .quantity input {
        float: none;
    }
    .same-pro-slider .product-img{
        height: 160px;
    }
</style>
@endsection
@section('content')
@php
$items = [];
$items[] = [
'title' => $product->menu->{'menu_' . app()->getLocale()},
'url' => route('user.slugUrl', [$product->menu->slug->{'slug_' . app()->getLocale()}]),
];
@endphp
@if ($product->subMenu)
@php
$items[] = [
'title' => $product->subMenu->{'sub_menu_' . app()->getLocale()},
'url' => route('user.slugUrl', [$product->subMenu->slug->{'slug_' . app()->getLocale()}]),
];
@endphp
@endif
@if ($product->innerMenu)
@php
$items[] = [
'title' => $product->innerMenu->{'inner_menu_' . app()->getLocale()},
'url' => route('user.slugUrl', [$product->innerMenu->slug->{'slug_' . app()->getLocale()}]),
];
@endphp
@endif
@php
$items[] = [
'title' => $product->{'title_' . app()->getLocale()},
'url' => 'javascript:void(0)',
];

@endphp

<div class="py-3 border-bottom mb-5">
    <div class="igo-bread-inner container">
        <div class="igo-bread w-100">
            <ul class="list-unstyled d-inline-block m-0">
                @foreach ($items as $key => $item)
                @if ($key == 0)
                <li class="d-inline-block"><a href="{{ $item['url'] }}"
                    class="igo-normal-title2">{{ $item['title'] }}</a>
                </li>
                @else
                <li class="d-inline-block">
                    /
                </li>
                <li class="d-inline-block"><a href="{{ $item['url'] }}"
                    class="igo-normal-title2">{{ $item['title'] }}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="main-wrapper-m px-0">
        <section class="product-section container">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="product-list">
                        <div class="row mar-0">
                            <div class="col-12 pad-0">
                                <div class="product">
                                    <div class="single-product brand-s-pro">
                                        <div class="row mar-0">
                                            <div class="col-lg-6 pad-0">
                                                <div class="pro-img-all d-flex">
                                                    @if($product->productAltImages->count() > 0)
                                                    <div class="same-pro-slider position-relative @if($product->productAltImages->count() < 3) mt-0 @endif">
                                                        <div class="swiper-container swiper-container8">
                                                            <div class="swiper-wrapper">
                                                                @foreach ($product->productAltImages as $productIm)
                                                                <div class="swiper-slide">
                                                                    <a href="{{ asset('uploads/product/alt/md-' . $productIm->img) }}"
                                                                        data-fancybox="gallery">
                                                                        <div class="swiper-cnt">
                                                                            <div class="igo-img-p">
                                                                                <div class="igo-img-c">
                                                                                   <img src="{{ $productIm->img ? asset('uploads/product/alt/md-' . $productIm->img) : asset('uploads/md-demo.png') }}"
                                                                                   alt="Left Banner"
                                                                                   class="img-responsive cover product-n">
                                                                               </div>
                                                                           </div>
                                                                       </div>
                                                                   </a>
                                                               </div>
                                                               @endforeach
                                                           </div>
                                                           <!-- Add Pagination -->
                                                       </div>
                                                       @if($product->productAltImages->count() > 2)
                                                       <div class="swiper-button-prev swiper-button-prev8"></div>
                                                       <div class="swiper-button-next swiper-button-next8"></div>
                                                       @endif
                                                   </div>
                                                   @endif
                                                   <div class="product-img @if($product->productAltImages->count() == 0) w-100 @endif">
                                                    @if ($product->product_img)
                                                    <a href="{{ asset('uploads/product/alt/lg-' . $product->product_img) }}" data-fancybox="gallery">
                                                        <img src="{{ asset('uploads/product/alt/lg-' . $product->product_img) }}"
                                                        alt="Left Banner"
                                                        class="img-responsive cover product-n">
                                                    </a>
                                                    @else
                                                    <a href="https://images.prismic.io/mparticle/5faa7a15e32529c52f58cb4cd8b7e0ddcb7af752_353-blog-header-mapping-1.png?auto=compress,format" data-fancybox="gallery">
                                                        <img src="https://images.prismic.io/mparticle/5faa7a15e32529c52f58cb4cd8b7e0ddcb7af752_353-blog-header-mapping-1.png?auto=compress,format"
                                                        alt="Left Banner"
                                                        class="img-responsive cover product-n">
                                                    </a>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6 pad-0">
                                            <div class="product-info pro-d">
                                                <h4 class="product-name">
                                                    <h3 class="igo-lg-title mb-4">@php echo $product->{'title_' . app()->getLocale()} @endphp</h3>
                                                </h4>
                                                @if ($product->{'description_' . app()->getLocale()})
                                                <div class="product-des d-none d-lg-block">
                                                       <!--  @if ($product->{'description_' . app()->getLocale()})
                                                        <h5 class="product-des-tlt">@lang('_lan.short_description')</h5>
                                                        @endif -->
                                                        <p>
                                                            @php echo $product->{'description_' . app()->getLocale()} @endphp
                                                        </p>
                                                    </div>
                                                    @endif
                                                    <span class="price d-none">
                                                        <span class="igo-md-title-bold d-flex">
                                                            <span>
                                                                {{ number_format((float) PriceHelper::discountByPrice($product->productPrice->discount, $product->productSizes()->min('price')), 2, '.', '') }}
                                                                @if ($product->productPrice->discount)
                                                                <span
                                                                class="igo-old-price">{{ number_format((float) $product->productSizes()->min('price'), 2, '.', '') }}</span>
                                                                @endif
                                                            </span>
                                                            @if ($product->productSizes()->min('price') != $product->productSizes()->max('price'))
                                                            &nbsp;-&nbsp;
                                                            <span>
                                                                {{ number_format((float) PriceHelper::discountByPrice($product->productPrice->discount, $product->productSizes()->max('price')), 2, '.', '') }}
                                                                @if ($product->productPrice->discount)
                                                                <span
                                                                class="igo-old-price">{{ number_format((float) $product->productSizes()->max('price'), 2, '.', '') }}</span>
                                                                @endif
                                                            </span>
                                                            @endif
                                                        </span>
                                                    </span>
                                                    <div class="product-d-info">
                                                        <div class="p-info">
                                                            <span
                                                            class="igo-sm-title-2 font-size-15">@lang('_lan.availability'):</span>
                                                            @if ($product->is_stock == 1)
                                                            <span
                                                            class="color-red font-size-15 font-weight-bold">@lang('_lan.in_stock')</span>
                                                            @else
                                                            @lang('_lan.out_of_stock')
                                                            @endif
                                                        </div>

                                                        @if (auth()->check())
                                                        @if (auth()->user()->userInfo->discount)
                                                        <div class="p-info">
                                                            <span
                                                            class="igo-sm-title-2 font-size-15">@lang('_lan.user_discount'):</span>
                                                            <span class="igo-sm-title-2 font-size-15">
                                                                {{ auth()->user()->userInfo->discount }}%</span>
                                                            </div>
                                                            @endif
                                                            @endif

                                                            @if (!is_array($shipping))
                                                            @if ($shipping)
                                                            {{-- <div class="p-info">
                                                                <span class="igo-sm-title-2 font-size-15">
                                                                @lang('_lan.min_shipping_cost'): </span> 
                                                                <span class="igo-sm-title-2 font-size-15">
                                                                {{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }}{{ $shipping }}</span>
                                                            </div> --}}
                                                            @endif
                                                            @if ($product->is_free_shipping == 1)
                                                            <b class="color-red ">
                                                                <span
                                                                class="font-size-15">@lang('_lan.free_shpping')</span>
                                                                @if ($shipping)
                                                                @php
                                                                $shipping_setting = App\ShippingSetting::first();
                                                                @endphp
                                                                <span class="font-size-15">(@lang('_lan.min_buy')
                                                                    {{ $shipping_setting->min_item }}
                                                                @lang('_lan.items'))</span>
                                                                @endif
                                                            </b>
                                                            @endif
                                                            @else
                                                            <b class="text-danger">
                                                                @if ($shipping['type'] == 'country')
                                                                {{ $shipping['item'] }}
                                                                @lang('_lan.not_available_for_your_country')
                                                                @endif
                                                            </b>
                                                            @endif

                                                        </div>

                                                        <form id="product_filter_form">
                                                            @csrf
                                                            <input type="hidden" name="price" id="product_current_price"
                                                            value="{{ PriceHelper::discount($product) }}">
                                                            <div class="row mb-2">
                                                                @php $error_check = 1; @endphp
                                                                @if ($product->productPrice)
                                                                @php
                                                                $pro_sizes = json_decode($product->productPrice->size_id);
                                                                @endphp
                                                                @if ($product->productPrice->size_id)
                                                                @php $error_check = 0; @endphp
                                                                @if (is_array($pro_sizes) && count($pro_sizes))
                                                                @foreach ($pro_sizes as $sizes)
                                                                @if ($sizes)
                                                                @if (is_array($sizes) && count($sizes))
                                                                @php
                                                                $size_data = App\Size::whereIn('id', $sizes)
                                                                ->with('customSize')
                                                                ->get();
                                                                @endphp
                                                                <div class="col-6 mb-3">
                                                                    <label
                                                                    class="igo-md-title-bold m-0">
                                                                    @php echo $size_data[0]->customSize->{'name_' . app()->getLocale()} @endphp :
                                                                </label>
                                                                <select name="size[]"
                                                                class="form-control"
                                                                onchange="getPriceByFilter(event, {{ $product->id }}, {{ PriceHelper::discount($product) }})">
                                                                <option value="0">
                                                                    @lang('_lan.select_an_option')
                                                                </option>
                                                                @foreach ($size_data as $size)
                                                                <option
                                                                value="{{ $size->id }}">
                                                                @php echo $size->{'size_' . app()->getLocale()} @endphp
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                    @endif
                                                    @if ($product->productPrice->custom_color_id)
                                                    @php $error_check = 0; @endphp
                                                    @if (is_array($product->productPrice->custom_color_id) && count($product->productPrice->custom_color_id))
                                                    <div class="col-6 mb-3">
                                                        <label
                                                        class="igo-md-title-bold m-0">@lang('_lan.colors')
                                                    :</label>
                                                    <select name="color" class="form-control"
                                                    onchange="getPriceByFilter(event, {{ $product->id }}, {{ PriceHelper::discount($product) }})">
                                                    <option value="0">
                                                    @lang('_lan.select_an_option')</option>
                                                    @foreach ($product->productPrice->customColors as $color)
                                                    <option value="{{ $color->id }}">
                                                        @php echo $color->{'color_' . app()->getLocale()} @endphp
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endif
                                            @endif
                                            @endif
                                        </div>
                                         <div class="igo-p-price calculate mb-2 d-none">
                                            <span class="igo-md-title-bold">
                                                @lang('_lan.price'):
                                                €
                                                <span
                                                class="amount">{{ number_format((float) PriceHelper::discount($product), 2, '.', '') }}</span>
                                            </span>
                                            <span
                                            class="igo-md-title-bold text-danger select-all-filter d-none">
                                            <br />P<span
                                            class="text-lowercase">@lang('_lan.lease_select')</span>
                                        </span>
                                        <span
                                        class="igo-md-title-bold text-danger size-combination d-none">
                                        <br />T<span
                                        class="text-lowercase">@lang('_lan.size_combination_product')</span>
                                    </span>
                                    <span class="igo-md-title-bold color-red added d-none">
                                        <br />P<span
                                        class="text-lowercase">@lang('_lan.product_add_your_cart')
                                        <a href="{{ route('cart.show') }}">
                                        @lang('_lan.view_cart')</a></span>
                                    </span>
                                </div>



                                <h4 class="igo-md-title-bold d-none">@lang('_lan.quantity'):</h4>
                                <div class="igo-add-cart-wrap d-flex align-items-center">
                                    <div class="form-group igo-fg-left pr-1">
                                        <div
                                        class="quantity quantity1 position-relative custom-qty d-flex mr-3 pl-0">
                                        <input type="number" min="1" step="1" value="1"
                                        name="quantity"
                                        onchange="getPriceByFilter(event, {{ $product->id }}, {{ PriceHelper::discount($product) }})">
                                    </div>
                                </div>
                                @if (!is_array($shipping))
                                <div class="form-group add-to-cart2 align-items-center mx-3 add-to-cart-web"
                                id="cardIcon"
                                >
                                <button type="button" id="cardIconInr"
                                class="d-flex align-items-center btn btn-danger" onclick="addToCart({{ $product->id }})">
                                <span class="cart-icon" id="cart-icon1"><i
                                    class="fas fa-shopping-cart"></i></span>
                                    <span class="cart ml-2 d-none d-sm-inline-block">@lang('_lan.add_cart')</span>
                                </button>
                            </div>
                            @endif
                            <div class="igo-p-price calculate mb-3">
                                <span class="font-weight-bold color-red">
                                     @lang('_lan.price'):
                                    €
                                    <span
                                    class="amount">{{ number_format((float) PriceHelper::discount($product), 2, '.', '') }}</span>
                                </span>
                            </div>
                            <div class="form-group wishlist2 align-items-center ml-3 fab-icon-web d-none"
                            >
                            <button type="button"
                            class="d-flex align-items-center btn btn-primary" onclick="addToFavorite(event,{{ $product->id }})">
                            <span class="fav-icon" id="fab-icon1"><i
                                class="far fa-heart"></i></span>
                                <span class="fav ml-2 d-none d-sm-inline-block">@lang('_lan.favourite')</span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

{{-- realated product start --}}
 @include('front-end.pages.module.related-product')
{{-- related product end --}}


</div>

</div>



</section>
</div>
@endsection
@section('script')
<script>
    var swiper = new Swiper('.swiper-container8', {
        slidesPerView: 2,
        spaceBetween: 10,
        slidesPerGroup: 1,
        direction: "vertical",
        navigation: {
            nextEl: '.swiper-button-next8',
            prevEl: '.swiper-button-prev8',
        }
    });

    var swiper = new Swiper(".related-products-container", {
        slidesPerView: 4,
        spaceBetween: 15,
        slidesPerGroup: 1,
        loopFillGroupWithBlank: true,
        navigation: {
          nextEl: ".related-products-next",
          prevEl: ".related-products-prev",
      },
      breakpoints: {
          400: {
            slidesPerView: 1,
        },
        575: {
            slidesPerView: 2,
        },
        767: {
            slidesPerView: 4,
        },
        991: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 3,
        },
    },
});
    window.add_to_cart = "{{ route('cart.add') }}";
    window.add_to_favorite = "{{ route('favorite.add') }}";
    window.get_price_by_filter = "{{ route('filter.price.get') }}";
    $(function() {
        $('[data-fancybox="gallery"]').fancybox({
            thumbs: {
                autoStart: false,
                fitWidth: true
            }
        });
    });
</script>
@endsection
