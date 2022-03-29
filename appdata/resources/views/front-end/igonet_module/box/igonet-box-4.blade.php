@php
$src_category = @$src_category ?: [];
$src_product = @$src_product ?: [];
@endphp
<div class="igo-search-result-box {{ count($src_category) == 0 && count($src_product) == 0 ? 'd-none' : '' }}">
    <div class="igo-sr-cat {{ count($src_category) ? '' : 'd-none' }} {{ count($src_product) ? '' : 'w-100' }}">
        <div class="igo-sr-cat-item">
            @foreach ($src_category as $item)
                <span><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></span>
            @endforeach
        </div>
    </div>
    <div class="igo-sr-pro {{ count($src_product) ? '' : 'd-none' }} {{ count($src_category) ? '' : 'w-100' }}">

        <div class="igo-sr-pro-inner">
            @foreach ($src_product as $item)
                <div class="igo-sr-pro-item">
                    <div class="igo-sr-pro-img">
                        <div class="igo-img-p">
                            <div class="igo-img-c">
                                <a href="{{ route('user.slugUrl', UrlHelper::product($item)) }}">
                                    <img src="{{ $item->product_img ? asset('uploads/product/alt/xs-' . $item->product_img) : asset('uploads/xs-demo.webp') }}"
                                        alt="image">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="igo-sr-pro-content pl-2">
                        <span class="igo-normal-title">
                            <a href="{{ route('user.slugUrl', UrlHelper::product($item)) }}" class="text-link">
                                @php echo $item->{'title_' . app()->getLocale()} @endphp
                            </a>
                        </span>
                        <div class="igo-sp-wrap">
                            <span class="igo-price">
                                {{ number_format((float) PriceHelper::discount($item), 2, '.', '') }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="igo-sr-see-more {{ count($src_product) > 8 ? '' : 'd-none' }}">
            <a href="{{ route('user.slugUrl', ['search-result', App\Services\MakeUrlService::url(@$src_txt)]) }}"
                class="igo-normal-title text-center">See More Result</a>
        </div>
    </div>
</div>
<div class="igo-sr-not-found {{ count($src_category) == 0 && count($src_product) == 0 ? '' : 'd-none' }}">
    <div>
        <img src="{{ asset('uploads/not-found.png') }}" alt="img">
    </div>
</div>
