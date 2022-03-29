<div class="igo-list3-left-wrapper">
    <ul class="list-group filter-list">
        @php
        $menus = App\Menu::get();
        @endphp
        @foreach ($menus as $menu)
        <li  class="list-group-item list-group-item-action m-li p-0">
            @if (count($menu->subMenus))<i class="fas fa-caret-down rotate-icon"></i>@endif
            <a href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}]) }}" class="collapse-a @if (count($menu->subMenus)) show-li @endif @if (url()->current() == route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}])) active @endif">{{ $menu->{'menu_' . app()->getLocale()} }}</a>
            @if (count($menu->subMenus))
            <!-- sub menu -->
            <ul class="sub-list px-3 collapse-ul">
               @foreach ($menu->subMenus as $subMenu)
               <li  class="">
                   @if (count($subMenu->innerMenus))<i class="fas fa-caret-down rotate-icon"></i>@endif
                   <a href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $subMenu->slug->{'slug_' . app()->getLocale()}]) }}" class="collapse-a @if (count($subMenu->innerMenus)) show-li @endif @if (url()->current() == route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $subMenu->slug->{'slug_' . app()->getLocale()}])) active @endif"> <span><i class="fas fa-minus"></i> {{ $subMenu->{'sub_menu_' . app()->getLocale()} }}</span></a>
                   @if ($subMenu->innerMenus->count())
                   <!-- inner menu -->
                   <ul class="inner-list pl-3 pr-2 collapse-ul" id="innerCollapse-1">
                    @foreach ($subMenu->innerMenus as $innerMenu)
                    <li  class="">
                        <a class="collapse-a @if (url()->current() == route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $subMenu->slug->{'slug_' . app()->getLocale()}, $innerMenu->slug->{'slug_' . app()->getLocale()}])) active @endif" href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $subMenu->slug->{'slug_' . app()->getLocale()}, $innerMenu->slug->{'slug_' . app()->getLocale()}]) }}"><span><i class="fas fa-minus"></i> Cras justo odio1</span></a>
                    </li>
                    @endforeach
                </ul>
                <!-- inner menu -->
                @endif
            </li>
            @endforeach
        </ul>
        @endif
        <!-- sub menu -->
    </li>
    @endforeach
</ul>
<div class="d-none">
    <div class="igo-list3-left-rediobox mb-4">
        <p class="igo-md-title">@lang('_lan.price')
        ({{ config('app.currency') == 'USD' ? '$' : (config('app.currency') == 'EUR' ? '€' : '₽') }})</p>
        <div class="form-check p-0">
            <input class="form-check-input" type="radio" value="any" name="price" id="any_price" checked>
            <label class="form-check-label igo-normal-title2" for="any_price">
                @lang('_lan.any_price')
            </label>
        </div>
        <div class="form-check p-0">
            <input class="form-check-input" type="radio" value="custom" name="price" id="custom_price">
            <label class="form-check-label igo-normal-title2" for="custom_price">
                @lang('_lan.custom')
            </label>
        </div>
        <div class="igo-custom-two-input d-flex mt-2 ml-4 align-items-center">
            <input type="text" value="" class="form-control" name="min_price" onkeypress="return onlyNumberKey(event)"
            readonly>
            <span class="mx-2">to</span>
            <input type="text" value="" class="form-control" name="max_price" onkeypress="return onlyNumberKey(event)"
            readonly>
            <a href="javascript:void(0)" id="price_filter">
                <span id="igoIcon" class="fa fa-chevron-right d-block ml-2"></span>
            </a>
        </div>
    </div>
    @if (count($filter_colors))
    <div class="igo-list3-left-checkbox mb-4">
        <p class="igo-md-title">@lang('_lan.colors')</p>
        @foreach ($filter_colors as $id => $color)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $id }}" name="color"
            id="filter_color">
            <label class="form-check-label igo-normal-title2" for="filter_color">
                {{ $color }}
            </label>
        </div>
        @endforeach
    </div>
    @endif
    @php
    $filter_n = 0;
    @endphp
    @foreach ($filter_sizes as $key => $item)
    <div class="igo-list3-left-checkbox mb-4 size-filter-area">
        <p class="igo-md-title">{{ str_replace('_', ' ', $key) }}</p>
        @foreach ($item as $size)
        <div class="form-check">
            <input class="form-check-input sizes-input" type="checkbox" value="{{ $size['id'] }}"
            name="size_{{ $filter_n }}" id="size_{{ $filter_n }}">
            <label class="form-check-label igo-normal-title2" for="size_{{ $filter_n }}">
                {{ $size['size'] }}
            </label>
        </div>
        @endforeach
    </div>
    @php
    $filter_n++;
    @endphp
    @endforeach
</div>
</div>
