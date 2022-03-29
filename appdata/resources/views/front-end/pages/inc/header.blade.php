<div class="wrapper cf d-none">
    <nav id="main-nav">
        <ul class="second-nav">
            @php
            $menus = App\Menu::get();
            @endphp
            @foreach ($menus as $menu)
            <li class="devices">
                <a href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}]) }}">{{ $menu->{'menu_' . app()->getLocale()} }}</a>
                @if (count($menu->subMenus))
                <ul>
                    @foreach ($menu->subMenus as $subMenu)
                    <li class="mobile">
                        <a
                        href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $subMenu->slug->{'slug_' . app()->getLocale()}]) }}">{{ $subMenu->{'sub_menu_' . app()->getLocale()} }}</a>
                        @if ($subMenu->innerMenus->count())
                        <ul>
                            @foreach ($subMenu->innerMenus as $innerMenu)
                            <li><a
                                href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $subMenu->slug->{'slug_' . app()->getLocale()}, $innerMenu->slug->{'slug_' . app()->getLocale()}]) }}">{{ $innerMenu->{'inner_menu_' . app()->getLocale()} }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
        </ul>

    </nav>
</div>
<section class="header-section">
    <div class="mid-menu container justify-content-between">
        <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/img/m-logo.png') }}"
            alt="cart"></a></div>
            <div class="search-box d-none">
                <input type="text" autocomplete="off" class="form-control search ciupkim-search" placeholder="@lang('_lan.search')" id="ciupkim_search">
                <div class="search-icon"><i class="fas fa-search"></i></div>
            </div>
            <ul class="nav justify-content-center page-nav d-none d-md-flex">
              <li class="nav-item">
                <a class="nav-link" href="#">Apie mus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">kontaktas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Puslapiai</a>
            </li>
        </ul>
        <div class="mid-ul d-flex align-items-center">
            @if (auth()->check())
            <a href="{{ route('profile') }}" class="text-center">
                <span class="mid-li">
                    <span class="li-icon d-inline-block"><i class="far fa-user"></i></span>
                    <br>
                    <span class="li-txt">@lang('_lan.account')</span>
                </span>
            </a>
            <a href="{{ route('logout') }}" onclick="logout(event)" class="text-center">
                <span class="mid-li">
                    <span class="li-icon"><i class="fas fa-sign-out-alt"></i></span><br>
                    <span class="li-txt">@lang('_lan.logout')</span>
                </span>
            </a>
            <form action="{{ route('logout') }}" method="POST" id="logout_form">
                @csrf
            </form>
            @else
            <span class="mid-li log-li">
                <span class="li-icon"><i class="fas fa-sign-in-alt"></i></span><br>
                <span class="li-txt">@lang('_lan.login')</span>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="log-form">
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="@lang('_lan.email')">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="@lang('_lan.password')">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="forgot-txt"><a href="">@lang('_lan.Forget_your_password')</a></div>
                        <button type="submit" class="btn log-btn">@lang('_lan.login')</button>
                    </div>
                </form>
            </span>
            <span class="mid-li log-li">
                <span class="li-icon"><i class="fas fa-user-plus"></i></span><br>
                <span class="li-txt">@lang('_lan.register')</span>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="log-form">
                        <div class="form-group">
                            <input placeholder="@lang('_lan.name')" id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input placeholder="@lang('_lan.email')" id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input placeholder="@lang('_lan.password')" id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input placeholder="@lang('_lan.confirm_password')" id="password-confirm" type="password"
                            class="form-control" name="password_confirmation" required
                            autocomplete="new-password">
                        </div>
                        <div class="forgot-txt"><a href="#">@lang('_lan.have_account')</a></div>
                        <button type="submit" class="btn log-btn">@lang('_lan.register')</button>
                    </div>
                </form>
            </span>
            @endif
            <span class="mid-li header-favourite">
                @include('front-end.pages.inc.header-favourite')
            </span>
            <span class="mid-li header-cart">
                @include('front-end.pages.inc.header-cart')
            </span>
            <span class="trans-m" href="#">
                <span class="flag-i d-none"><img
                    src="{{ asset('assets/img/' . app()->getLocale() . '-flag.png') }}"
                    alt="cart"></span> 
                    <span class="trans-name">
                        <div class="ctm-select">
                            <div class="ctm-select-txt pad-l-10">
                                <span class="select-txt duration1 font-weight-bold" duration1="0" id="category">
                                    @if (app()->getLocale() == 'rus') RUS
                                    @elseif(app()->getLocale() == 'en') EN
                                    @elseif(app()->getLocale() == 'pt') PT
                                    @elseif(app()->getLocale() == 'es') ES
                                    @else LT
                                    @endif
                                </span>
                            </div>
                            <div class="ctm-option-box w-100 text-center">
                                <div class="ctm-option"><a href="{{ route('language', ['lt']) }}">LT</a>
                                </div>
                                <div class="ctm-option"><a href="{{ route('language', ['en']) }}">EN</a>
                                </div>
                                <div class="ctm-option"><a href="{{ route('language', ['rus']) }}">RUS</a>
                                </div>
                                {{-- <div class="ctm-option"><a href="{{ route('language', ['pt']) }}">PT</a>
                                </div>
                                <div class="ctm-option"><a href="{{ route('language', ['es']) }}">ES</a>
                                </div> --}}
                            </div>
                        </div>
                    </span>
                </span>
            </div>
        </div>
        <div class="search-box d-flex d-md-none w-100 mb-3 px-3">
            <input type="text" autocomplete="off" class="form-control search w-100 ciupkim-search" id="ciupkim_search" placeholder="@lang('_lan.search')">
            <div class="search-icon"><i class="fas fa-search"></i></div>
        </div>
        <span class="w-pet-border"></span>
        <div class="main-menu">
            <div class="max-cnt main-menu-all">
                <div class="main-max-cnt">
                    <div class="mbl-search-box">
                        <input type="text" class="form-control search" placeholder="@lang('_lan.search')">
                    </div>
                    <div class="lan-social-manu d-none">
                        <ul class="social-nav">
                            <li class="facebook"><a href="https://www.facebook.com/102143521594887/posts/124300332712539/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                        <span class="trans-m" href="#"><span class="flag-i"><img
                            src="{{ asset('assets/img/' . app()->getLocale() . '-flag.png') }}"
                            alt="cart"></span> <span class="trans-name">
                                <div class="ctm-select">
                                    <div class="ctm-select-txt pad-l-10">
                                        <span class="select-txt duration1" duration1="0" id="category">
                                            @if (app()->getLocale() == 'rus') @lang('_lan.RUSSIAN')
                                            @elseif(app()->getLocale() == 'en') @lang('_lan.ENGLISH')
                                            @elseif(app()->getLocale() == 'pt') @lang('_lan.PORTUGUESE')
                                            @elseif(app()->getLocale() == 'es') @lang('_lan.SPANISH')
                                            @else @lang('_lan.LITHUANIAN')
                                            @endif
                                        </span>
                                    </div>
                                    <div class="ctm-option-box">
                                        <div class="ctm-option"><a href="{{ route('language', ['lt']) }}">@lang('_lan.LITHUANIAN')</a>
                                        </div>
                                        <div class="ctm-option"><a href="{{ route('language', ['en']) }}">@lang('_lan.ENGLISH')</a>
                                        </div>
                                        <div class="ctm-option"><a href="{{ route('language', ['rus']) }}">@lang('_lan.RUSSIAN')</a>
                                        </div>
                                        {{-- <div class="ctm-option"><a href="{{ route('language', ['pt']) }}">@lang('_lan.PORTUGUESE')</a>
                                        </div>
                                        <div class="ctm-option"><a href="{{ route('language', ['es']) }}">@lang('_lan.SPANISH')</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </span>
                        </span>
                    </div>

                    <ul class="nav-m d-none d-lg-flex justify-content-center">
                        @if($menus->count() > 0)
                        @foreach ($menus->take(7) as $menu)
                        <li class="main-li">
                            <a class="main-link"
                            href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}]) }}">
                            @php echo $menu->{'menu_' . app()->getLocale()} @endphp
                        </a>
                        @if (count($menu->subMenus))
                        <ul class="sub-m">
                            @foreach ($menu->subMenus as $submenu)
                            <li class="sub-li">
                                <a class="sub-link"
                                href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $submenu->slug->{'slug_' . app()->getLocale()}]) }}">
                                @php echo $submenu->{'sub_menu_' . app()->getLocale()} @endphp
                            </a>
                            @if (count($submenu->innerMenus))
                            <ul class="inner-m">
                                @foreach ($submenu->innerMenus as $innermenu)
                                <li class="inner-li">
                                    <a class="inner-link"
                                    href="{{ route('user.slugUrl', [$menu->slug->{'slug_' . app()->getLocale()}, $submenu->slug->{'slug_' . app()->getLocale()}, $innermenu->slug->{'slug_' . app()->getLocale()}]) }}">
                                    @php echo $innermenu->{'inner_menu_' . app()->getLocale()} @endphp
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
            @else
            <li class="main-li">
                <a class="main-link"
                href="#">
                Empty Category, Please insert Category.
            </a>
        </li>
        @endif
    </ul>
    <div class="igo-search-result-wrap d-none">

    </div>
    <div class="mbl-bar-s-btn toggle d-block d-lg-none mm-s-li"><i class="fas fa-bars"></i></div>
        <!-- <nav class="navbar navbar-expand-lg navbar-light d-none">
            <div class="mbl-bar-m">
                <div class="bar-li toggle d-block d-lg-none mm-s-li"><i class="fas fa-bars"></i></div>
                <div class="bar-li d-block d-md-none search-b-li"><i class="show-btn fa fa-search"></i></div>
                <div class="bar-li d-block d-md-none"><a href="#"><i class="fa fa-user"></i></a></div>
                <div class="bar-li d-block d-md-none"><a href="tel:+6494461709"><i class="fa fa-phone"></i></a>
                </div>
                <div class="bar-li d-block d-md-none"><a href="#"><i class="fa fa-shopping-cart"></i></a></div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- <ul class="navbar-nav mr-auto">
                 @foreach ($menus as $menu)
                 <li class="nav-item show-sub-m">
                    <a class="nav-link" href="{{  route('productM', [App\Services\MakeUrlService::url($menu->{'menu_'.app()->getLocale()}),$menu->id]) }}">
                       {{ $menu->{'menu_'.app()->getLocale()} }}
                       @if ($menu->subMenus->count())
                       <span><i class="fas fa-caret-down"></i></span>
                       @endif
                   </a>
                   @if ($menu->subMenus->count())
                   <div class="sub-menu sub-menu1">
                       @php
                       $n = 0;
                       $k = $menu->subMenus->count() > 4 ? 4 : $menu->subMenus->count();
                       @endphp
                       @for ($i = 0; $i < $k; $i++) <div class="inner-menu">
                          @for ($j = 0; $j < ceil($menu->subMenus->count() / 4); $j++)
                          @if ($menu->subMenus->count() >= $n + 1)
                          <div class="inner-menu-cnt">
                             <div class="inner-tlt">
                                <a href="{{  route('productSM', [App\Services\MakeUrlService::url($menu->{'menu_'.app()->getLocale()}), App\Services\MakeUrlService::url($menu->subMenus[$n]->{'sub_menu_'.app()->getLocale()}), $menu->subMenus[$n]->id]) }}">
                                   {{  $menu->subMenus[$n]->{'sub_menu_'.app()->getLocale()} }}
                               </a>
                           </div>
                           <div class="inner-link">
                            @php
                            $inrMenus = $menu->subMenus[$n]->innerMenus;
                            @endphp
                            @foreach ($inrMenus as $inrMenu)
                            <div>
                               <a href="{{  route('product', [App\Services\MakeUrlService::url($menu->{'menu_'.app()->getLocale()}), App\Services\MakeUrlService::url($menu->subMenus[$n]->{'sub_menu_'.app()->getLocale()}), App\Services\MakeUrlService::url($inrMenu->{'inner_menu_'.app()->getLocale()}), $inrMenu->id]) }}">
                                  {{  $inrMenu->{'inner_menu_'.app()->getLocale()} }}
                              </a>
                          </div>
                          @endforeach
                          @php
                          $n++
                          @endphp
                      </div>
                  </div>
                  @endif
                  @endfor
              </div>
              @endfor
          </div>
          @endif
      </li>
      @endforeach
  </ul> --}}
</div>
</nav> -->
</div>
</div>
</div>
</section>
