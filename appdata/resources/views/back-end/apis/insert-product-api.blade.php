@extends('back-end.admin-app')
@section('title', 'Page')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/component.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css') }}">
    <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/j-forms.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css">
    <style>
        #simpletable img,
        .img-v img {
            width: 100px
        }

        .img-v img {
            margin-top: 15px;
        }

    </style>
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>Api</h4>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Insert product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Insert product api</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @foreach ($menus as $menu)
                                                    <div class="igo-admin-pro-tab-warp">
                                                        <div id="accordion{{ $menu->id }}">
                                                            <div class="card">
                                                                <div class="card-header d-flex justify-content-between align-items-center"
                                                                    id="headingOne{{ $menu->id }}"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapseOne{{ $menu->id }}"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapseOne{{ $menu->id }}">
                                                                    <div class="igo-card-head-inner">
                                                                        <span><strong
                                                                                class="mr-2">Menu:</strong>{{ $menu->menu_en }}</span>
                                                                    </div>
                                                                    <div class="igo-card-head-inner d-flex">
                                                                        <span><strong class="mr-2">ID:
                                                                            </strong></span>
                                                                        <span>{{ $menu->id }}</span>
                                                                    </div>
                                                                    <h5 class="mb-0">
                                                                        <button class="btn btn-link collapsed"
                                                                            data-toggle="collapse"
                                                                            data-target="#collapseOne{{ $menu->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapseOne{{ $menu->id }}">
                                                                            <i class="icofont icofont-rounded-down"></i>
                                                                        </button>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseOne{{ $menu->id }}" class="collapse"
                                                                    aria-labelledby="headingOne{{ $menu->id }}"
                                                                    data-parent="#accordion{{ $menu->id }}">
                                                                    <div class="card-body">
                                                                        <div class="igo-app-cart2-warp mb-3">
                                                                            <div>
                                                                                <div>
                                                                                    <span>LT
                                                                                        -</span><span>{{ $menu->menu_lt }}</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span>RUS
                                                                                        -</span><span>{{ $menu->menu_rus }}</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span>PT
                                                                                        -</span><span>{{ $menu->menu_pt }}</span>
                                                                                </div>
                                                                                <div>
                                                                                    <span>ES
                                                                                        -</span><span>{{ $menu->menu_es }}</span>
                                                                                </div>
                                                                            </div>

                                                                            @if (count($menu->subMenus))
                                                                                @foreach ($menu->subMenus as $submenu)
                                                                                    <div
                                                                                        class="igo-admin-pro-tab-warp mt-2">
                                                                                        <div
                                                                                            id="accordionSub{{ $submenu->id }}">
                                                                                            <div class="card">
                                                                                                <div class="card-header d-flex justify-content-between align-menus-center"
                                                                                                    id="headingOneSub{{ $submenu->id }}"
                                                                                                    data-toggle="collapse"
                                                                                                    data-target="#collapseOneSub{{ $submenu->id }}"
                                                                                                    aria-expanded="true"
                                                                                                    aria-controls="collapseOnSub{{ $submenu->id }}">
                                                                                                    <div
                                                                                                        class="igo-card-head-inner">
                                                                                                        <span><strong
                                                                                                                class="mr-2">Submenu:</strong>{{ $menu->menu_en }}</span>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="igo-card-head-inner d-flex">
                                                                                                        <span><strong
                                                                                                                class="mr-2">ID:
                                                                                                            </strong></span>
                                                                                                        <span>{{ $submenu->id }}</span>
                                                                                                    </div>
                                                                                                    <h5 class="mb-0">
                                                                                                        <button
                                                                                                            class="btn btn-link collapsed"
                                                                                                            data-toggle="collapse"
                                                                                                            data-target="#collapseOneSub{{ $submenu->id }}"
                                                                                                            aria-expanded="true"
                                                                                                            aria-controls="collapseOneSub{{ $submenu->id }}">
                                                                                                            <i
                                                                                                                class="icofont icofont-rounded-down"></i>
                                                                                                        </button>
                                                                                                    </h5>
                                                                                                </div>
                                                                                                <div id="collapseOneSub{{ $submenu->id }}"
                                                                                                    class="collapse"
                                                                                                    aria-labelledby="headingOneSub{{ $submenu->id }}"
                                                                                                    data-parent="#accordionSub{{ $submenu->id }}">
                                                                                                    <div class="card-body">
                                                                                                        <div
                                                                                                            class="igo-app-cart2-warp mb-3">
                                                                                                            <div>
                                                                                                                <div>
                                                                                                                    <span>LT
                                                                                                                        -</span><span>Prestigio
                                                                                                                        Smartbook
                                                                                                                        133
                                                                                                                        C4,
                                                                                                                        64GB,
                                                                                                                        Win10P</span>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <span>RUS
                                                                                                                        -</span><span>Prestigio
                                                                                                                        Smartbook
                                                                                                                        133
                                                                                                                        C4,
                                                                                                                        64GB,
                                                                                                                        Win10P</span>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <span>PT
                                                                                                                        -</span><span>Prestigio
                                                                                                                        Smartbook
                                                                                                                        133
                                                                                                                        C4,
                                                                                                                        64GB,
                                                                                                                        Win10P</span>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <span>ES
                                                                                                                        -</span><span>Prestigio
                                                                                                                        Smartbook
                                                                                                                        133
                                                                                                                        C4,
                                                                                                                        64GB,
                                                                                                                        Win10P</span>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            @if (count($submenu->innerMenus))
                                                                                                                @foreach ($submenu->innerMenus as $innermenu)
                                                                                                                    <div
                                                                                                                        class="igo-admin-pro-tab-warp mt-2">
                                                                                                                        <div
                                                                                                                            id="accordion3">
                                                                                                                            <div
                                                                                                                                class="card">
                                                                                                                                <div class="card-header d-flex justify-content-between align-items-center"
                                                                                                                                    id="headingOne3"
                                                                                                                                    data-toggle="collapse"
                                                                                                                                    data-target="#collapseOne3"
                                                                                                                                    aria-expanded="true"
                                                                                                                                    aria-controls="collapseOne3">
                                                                                                                                    <div
                                                                                                                                        class="igo-card-head-inner">
                                                                                                                                        <strong>Inner
                                                                                                                                            Menu</strong>
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="igo-card-head-inner">
                                                                                                                                        Name:
                                                                                                                                    </div>
                                                                                                                                    <div
                                                                                                                                        class="igo-card-head-inner d-flex">
                                                                                                                                        <span><strong>ID:
                                                                                                                                            </strong></span>
                                                                                                                                        <span>34</span>
                                                                                                                                    </div>
                                                                                                                                    <h5
                                                                                                                                        class="mb-0">
                                                                                                                                        <button
                                                                                                                                            class="btn btn-link collapsed"
                                                                                                                                            data-toggle="collapse"
                                                                                                                                            data-target="#collapseOne3"
                                                                                                                                            aria-expanded="true"
                                                                                                                                            aria-controls="collapseOne3">
                                                                                                                                            <i
                                                                                                                                                class="icofont icofont-rounded-down"></i>
                                                                                                                                        </button>
                                                                                                                                    </h5>
                                                                                                                                </div>
                                                                                                                                <div id="collapseOne3"
                                                                                                                                    class="collapse"
                                                                                                                                    aria-labelledby="headingOne3"
                                                                                                                                    data-parent="#accordion3">
                                                                                                                                    <div
                                                                                                                                        class="card-body">
                                                                                                                                        <div
                                                                                                                                            class="igo-app-cart2-warp mb-3">
                                                                                                                                            <div>
                                                                                                                                                <div>
                                                                                                                                                    <span>LT
                                                                                                                                                        -</span><span>Prestigio
                                                                                                                                                        Smartbook
                                                                                                                                                        133
                                                                                                                                                        C4,
                                                                                                                                                        64GB,
                                                                                                                                                        Win10P</span>
                                                                                                                                                </div>
                                                                                                                                                <div>
                                                                                                                                                    <span>RUS
                                                                                                                                                        -</span><span>Prestigio
                                                                                                                                                        Smartbook
                                                                                                                                                        133
                                                                                                                                                        C4,
                                                                                                                                                        64GB,
                                                                                                                                                        Win10P</span>
                                                                                                                                                </div>
                                                                                                                                                <div>
                                                                                                                                                    <span>PT
                                                                                                                                                        -</span><span>Prestigio
                                                                                                                                                        Smartbook
                                                                                                                                                        133
                                                                                                                                                        C4,
                                                                                                                                                        64GB,
                                                                                                                                                        Win10P</span>
                                                                                                                                                </div>
                                                                                                                                                <div>
                                                                                                                                                    <span>ES
                                                                                                                                                        -</span><span>Prestigio
                                                                                                                                                        Smartbook
                                                                                                                                                        133
                                                                                                                                                        C4,
                                                                                                                                                        64GB,
                                                                                                                                                        Win10P</span>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                @endfor
                                                                                                                each
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('back-end.inc.admin-right-bar')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection
