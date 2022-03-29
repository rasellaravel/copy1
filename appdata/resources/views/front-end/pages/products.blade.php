@extends('front-end.app')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        /* The snackbar - position it at the bottom and in the middle of the screen */
        #snackbar {
            visibility: hidden;
            /* Hidden by default. Visible on click */
            min-width: 250px;
            /* Set a default minimum width */
            margin-left: -125px;
            /* Divide value of min-width by 2 */
            background-color: #fb8e8e;
            /* Black background color */
            color: #fff;
            /* White text color */
            text-align: center;
            /* Centered text */
            border-radius: 2px;
            /* Rounded borders */
            padding: 16px;
            /* Padding */
            position: fixed;
            /* Sit on top of the screen */
            z-index: 1;
            /* Add a z-index if needed */
            left: 50%;
            /* Center the snackbar */
            bottom: 30px;
            /* 30px from the bottom */
        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show {
            visibility: visible;
            /* Show the snackbar */
            /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
                                                                  However, delay the fade out process for 2.5 seconds */
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

    </style>
@endsection
@section('content')
    <h1 class="d-none">
        @if ($model != null)
            @if (class_basename($model) == 'Menu')
                @php
                    echo $model->{'menu_' . app()->getLocale()};
                    $menu_item_list = $model->subMenus;
                @endphp
            @elseif(class_basename($model) == "SubMenu")
                @php
                    echo $model->{'sub_menu_' . app()->getLocale()};
                    $menu_item_list = $model->innerMenus;
                @endphp
            @elseif(class_basename($model) == "InnerMenu")
                @php
                    echo $model->{'inner_menu_' . app()->getLocale()};
                    $menu_item_list = [];
                @endphp
            @endif
        @else
            Search Result
            @php
                $menu_item_list = [];
            @endphp
        @endif
    </h1>
    @if ($model != null)
        @php
            $items = [];
        @endphp
        @if (class_basename($model) == 'Menu')
            @php
                $items[] = [
                    'title' => $model->{'menu_' . app()->getLocale()},
                    'url' => 'javascript:void(0)',
                ];
            @endphp
        @elseif(class_basename($model) == "SubMenu")
            @php
                $items[] = [
                    'title' => $model->menu->{'menu_' . app()->getLocale()},
                    'url' => route('user.slugUrl', [$model->menu->slug->{'slug_' . app()->getLocale()}]),
                ];
                $items[] = [
                    'title' => $model->{'sub_menu_' . app()->getLocale()},
                    'url' => 'javascript:void(0)',
                ];
            @endphp
        @elseif(class_basename($model) == "InnerMenu")
            @php
                $items[] = [
                    'title' => $model->menu->{'menu_' . app()->getLocale()},
                    'url' => route('user.slugUrl', [$model->menu->slug->{'slug_' . app()->getLocale()}]),
                ];
                $items[] = [
                    'title' => $model->submenu->{'sub_menu_' . app()->getLocale()},
                    'url' => route('user.slugUrl', [$model->menu->slug->{'slug_' . app()->getLocale()}, $model->submenu->slug->{'slug_' . app()->getLocale()}]),
                ];
                $items[] = [
                    'title' => $model->{'inner_menu_' . app()->getLocale()},
                    'url' => 'javascript:void(0)',
                ];
            @endphp
        @endif
    @else
        @php
            $items[] = [
                'title' => 'Search Result',
                'url' => 'javascript:void(0)',
            ];
        @endphp
    @endif

    @php
        //dd("test");
    @endphp
    <div class="main-wrapper-m px-0">
        <section class="product-section container pt-5">
            <div class="row">
                <div class="col-12  d-none">
                    <div class="igo-bread-inner">
                        <div class="igo-bread w-100">
                            <ul class="list-unstyled d-inline-block m-0">
                                @foreach ($items as $key => $item)
                                    @if ($key == 0)
                                        <li class="d-inline-block"><a href="{{ $item['url'] }}"
                                                class="igo-normal-title2">{{ $item['title'] }}</a>
                                        </li>
                                    @else
                                        <li class="d-inline-block"><span class="icon-next igo-bread-icon"></span></li>
                                        <li class="d-inline-block"><a href="{{ $item['url'] }}"
                                                class="igo-normal-title2">{{ $item['title'] }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mb-4 mb-md-0">
                    @include('front-end.pages.inc.web-filter-1')
                </div> 
                <div class="col-12 col-md-8 col-lg-9">
                      <div class="current-cat-name border-bottom mb-4 pb-4">
                        <h2 class="mb-0">
                           <!--  @if (@$im)
                                {{ @$inner_menu['inner_menu_' . app()->getLocale()] }}
                            @elseif(@$sm)
                                {{ @$sub_menu['sub_menu_' . app()->getLocale()] }}
                            @else
                                {{ @$menu['menu_' . app()->getLocale()] }}
                            @endif -->
                             @foreach ($items as $key => $item)
                                    @if ($key == 0)
                                       {{ $item['title'] }}
                                    @else
                                       {{ $item['title'] }}
                                    @endif
                                @endforeach
                        </h2>
                    </div>
                        <div class="listing-product-area">
                            @include('front-end.pages.paginate-product')
                        </div>
                </div>
            </div>
        </section>
    </div>

    <div id="snackbar">@lang('home.login_warn')</div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $(".js-example-basic-multiple").select2({
                placeholder: 'Search With Size'
            });
        });
    </script>

@endsection
