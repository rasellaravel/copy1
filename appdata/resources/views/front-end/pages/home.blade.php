@extends('front-end.app')
@section('style')
@endsection
@section('content')

<section class="home-section section py-0">
   <div class="slide-section">
    <div class="home-slider position-relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="swiper-cnt wh-100">
                    <img src="{{asset('assets/img/slide-i.png')}}" alt="Left Banner"
                    class="img-responsive cover">
                    <div class="slide-txt d-none">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="slider-container">
                                    <div class="bannertext">
                                        <h2>hgkgkj</h2>
                                        <p class="">fjhgkhj</p>
                                    </div>
                                    <a href="/"><button
                                        class="btn ctm-btn shop-btn">btnn</button></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="row mar-0 d-none">
            <div class="col-12 p-0">
                <div class="top-product-show">
                    <div class="max-cnt">
                        <h4 class="tps-tlt">@lang('_lan.independent_seller')</h4>
                        <h4 class="tps-tlt1 ">@lang('_lan.everyday_finds')</h4>
                        <div class="row mr-0 justify-content-center">
                            @foreach ($menus_list as $menu)
                            <div class="col-4 col-lg-2 pr-0">
                                <a class="d-block"
                                href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}]) }}">
                                <div class="s-tp">
                                    <div class="s-tp-img">
                                        <div class="igo-img-p">
                                            <div class="igo-img-c">
                                                <img src="{{ @$menu->menuInfo->img ? asset('uploads/menus/sm-' . @$menu->menuInfo->img) : asset('uploads/xl-demo.png') }}"
                                                alt="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-tp-tlt d-flex justify-content-center align-item-center">
                                        <span class="single-line-dot">@php echo $menu->{'menu_' . app()->getLocale()} @endphp </span>
                                        <span><i class="fas fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <div class="main-wrapper-m">
           @include('front-end.pages.module.category-module')
            <section class="home-section section pt-0 d-none">
                <div class="feature-all update-f">
                    <div class="row mr-0">
                        @for ($i = 1; $i < 4; $i++)
                        <div class="col-12 col-md-4 pr-0">
                            <div class="s-f">
                                <h3 class=" text-center">
                                    <span class="etsy-icon text-orange" data-content-toggle-icon=""><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                        focusable="false">
                                        <path
                                        d="M9.057,20.471L2.293,13.707a1,1,0,0,1,1.414-1.414l5.236,5.236,11.3-13.18a1,1,0,1,1,1.518,1.3Z">
                                    </path>
                                </svg></span>
                                <span class="pl-xs-2 mt-xs-1">@lang('_lan.uniqueEverything')</span>
                            </h3>
                            <p class="text-body text-center">
                                @lang('_lan.uniqueText')
                            </p>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            @if (count($discount_products))
            <div class="top-product-section">
                <div class="tlt-part">
                    <h2 class="border-tlt">@lang('_lan.spacial') <span> @lang('_lan.offers')</span></h2>
                    <!-- <h2 class="main-title">@lang('home.top_products')</h2> -->
                </div>
                <div class="row m-0">
                    @php
                    $n = 0;
                    @endphp
                    @foreach ($discount_products as $discount_product)
                    <div class="col-6 col-md-4 col-lg-3 p-0">
                        <div class="product">
                            <div class="single-product single-product-show">
                                <div class="product-img">
                                    <div class="igo-img-p">
                                        <div class="igo-img-c">
                                            <a
                                            href="{{ route('user.slugUrl', UrlHelper::product($discount_product)) }}">

                                            <img src="{{ isset($discount_product->product_img) ? asset('uploads/product/alt/sm-' . $discount_product->product_img) : asset('uploads/md-demo.png') }}"
                                            alt="Left Banner" class="img-responsive product-n">
                                            <img src="{{ isset($discount_product->product_img) ? asset('uploads/product/alt/sm-' . $discount_product->product_img) : asset('uploads/md-demo.png') }}"
                                            alt="Left Banner" class="img-responsive product-h d-none">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="product-info">
                                <h6 class="product-name single-line-dot">
                                    <a
                                    href="{{ route('user.slugUrl', UrlHelper::product($discount_product)) }}">
                                    @php echo $discount_product->{'title_' . app()->getLocale()} @endphp
                                </a>
                            </h6>
                            <div class='rating-stars'>
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
                                    {{ number_format((float) PriceHelper::discount($discount_product), 2, '.', '') }}
                                </span>
                                @if ($discount_product->productPrice->discount)
                                <span
                                class="igo-old-price mr-2">{{ number_format((float) $discount_product->productPrice->price, 2, '.', '') }}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @if (count($viewed_products))
    <div class="top-product-section d-none">
        <div class="tlt-part">
            <h2 class="border-tlt">@lang('_lan.most') <span> @lang('_lan.popular')</span></h2>
            <!-- <h2 class="main-title">@lang('home.top_products')</h2> -->
        </div>
        <div class="row m-0">
            @php
            $n = 0;
            @endphp
            @foreach ($viewed_products as $viewed_product)
            <div class="col-6 col-md-4 col-lg-3 p-0">
                <div class="product">
                    <div class="single-product single-product-show">
                        <div class="product-img">
                            <div class="igo-img-p">
                                <div class="igo-img-c">
                                    <a
                                    href="{{ route('user.slugUrl', UrlHelper::product($viewed_product)) }}">

                                    <img src="{{ isset($viewed_product->product_img) ? asset('uploads/product/alt/sm-' . $viewed_product->product_img) : asset('uploads/md-demo.png') }}"
                                    alt="Left Banner" class="img-responsive product-n">
                                    <img src="{{ isset($viewed_product->product_img) ? asset('uploads/product/alt/sm-' . $viewed_product->product_img) : asset('uploads/md-demo.png') }}"
                                    alt="Left Banner" class="img-responsive product-h d-none">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h6 class="product-name single-line-dot">
                            <a
                            href="{{ route('user.slugUrl', UrlHelper::product($viewed_product)) }}">
                            @php echo $viewed_product->{'title_' . app()->getLocale()} @endphp
                        </a>
                    </h6>
                    <div class='rating-stars'>
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
                        <span class="amount"><span class="currencySymbol">EUR
                        </span>{{ @$viewed_product->productPrice->price }}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endif

@if (count($my_viewed_products))
<div class="product-slider d-none">
    <div class="tlt-part">
        <h2 class="border-tlt">@lang('_lan.lastVisit') <span>@lang('_lan.products')</span></h2>
        <!-- <h2 class="main-title">@lang('home.top_products')</h2> -->
    </div>
    <div class="swiper-container home-electronics-container">
        <div class="swiper-wrapper">
            @php
            $n = 0;
            @endphp
            @foreach ($my_viewed_products as $my_viewed_product)
            <div class="swiper-slide">
                <div class="product">
                    <div class="single-product single-product-show">
                        <div class="product-img">
                            <div class="igo-img-p">
                                <div class="igo-img-c">
                                    <a
                                    href="{{ route('user.slugUrl', UrlHelper::product($my_viewed_product)) }}">
                                    <img src="{{ isset($my_viewed_product->product_img) ? asset('uploads/product/alt/sm-' . $my_viewed_product->product_img) : asset('uploads/md-demo.png') }}"
                                    alt="Left Banner" class="img-responsive product-n">
                                    <img src="{{ isset($my_viewed_product->product_img) ? asset('uploads/product/alt/sm-' . $my_viewed_product->product_img) : asset('uploads/md-demo.png') }}"
                                    alt="Left Banner" class="img-responsive product-h d-none">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <h6 class="product-name single-line-dot"><a
                            href="{{ url('product-details', $my_viewed_product->id) }}">{{ $my_viewed_product->{'title_' . app()->getLocale()} }}</a>
                        </h6>
                        <div class='rating-stars'>
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
                            <span class="amount"><span class="currencySymbol">EUR
                            </span>{{ $my_viewed_product->productPrice->price }}</span>
                        </span>

                    </div>
                </div>
            </div>
        </div>
        @php $n++ @endphp
        @endforeach
    </div>
    <!-- Add Pagination -->
    <!-- Add Arrows -->
    <div class="swiper-button-prev home-electronics-prev"></div>
    <div class="swiper-button-next home-electronics-next"></div>
</div>
</div>
@endif
</div>

</div>
</section>
</div>

@endsection
@section('script')
<script>
    var swiper = new Swiper('.swiper-container1', {
        spaceBetween: 30,
        effect: 'fade',
        autoplay: {
          delay: 4000,
      },
      pagination: {
          el: '.swiper-pagination',
          clickable: true,
      },
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
  });
</script>
@endsection
