@extends('back-end.admin-app')
@section('title', 'Custom Size')
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
                            <h4>Settings</h4>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Settings</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="formData">
                                            <form action="" id="setting_form" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="min_price" class="col-form-label">Minimum Price <b
                                                                class="text-danger"></b></label>
                                                        <input type="text" id="min_price" name="min_price"
                                                            class="form-control check-empty"
                                                            value="{{ @$data ? number_format((float) $data->min_price, 2, '.', '') : '' }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="maintenance_charge" class="col-form-label">Maintenance
                                                            Charge <b class="text-danger"></b></label>
                                                        <input type="text" id="maintenance_charge" name="maintenance_charge"
                                                            class="form-control check-empty"
                                                            value="{{ @$data ? number_format((float) $data->maintenance_charge, 2, '.', '') : '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row" id="">
                                                    <input type="submit" class=" ml-20 btn btn-primary " value="submit">
                                                </div>
                                            </form>
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
        window.base_url = '{{ url(' / ') }}';
        window.insert_setting = '{{ route('admin.insertSetting') }}';

    </script>
@endsection
