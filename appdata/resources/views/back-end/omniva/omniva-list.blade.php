@extends('back-end.admin-app')
@section('title', 'Custom Size')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('front-end/omniva-map.css') }}">
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>Omniva</h4>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Omniva</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Omniva</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="parent">
                                            <div id="omniva_element"></div>
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
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script src="{{ asset('front-end/omniva-map.js') }}" defer></script>
    <script>
        $(function() {
            var omniva_ready = $('#omniva_element').omniva({
                terminals: [
                    ["Alytaus NORFA", "54.396616", "24.028241", "88895", "Alytus", "Topolio g. 1, Alytus",
                        "Description"
                    ]
                ],
                path_to_img: '{{ asset("front-end/images/") }}/'
            });
        });
    </script>
@endsection
