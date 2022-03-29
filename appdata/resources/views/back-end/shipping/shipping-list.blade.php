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

        .dashboardcode-bsmultiselect .badge {
            color: black;
            display: flex;
            align-items: center;
        }

        .dashboardcode-bsmultiselect .badge button {
            margin: 0;
            border: 1px solid;
            border-radius: 50%;
            height: 12px;
            width: 12px;
            line-height: 12px !important;
            text-align: center;
            margin-left: 2px;
        }

        .dashboardcode-bsmultiselect .custom-control-input {
            position: absolute;
            left: 0;
            z-index: -1;
            width: 1rem;
            height: 1.25rem;
            opacity: 0;
        }

        .dashboardcode-bsmultiselect .custom-control-input {
            position: absolute;
            left: 0;
            z-index: -1;
            width: 1rem;
            height: 1.25rem;
            opacity: 0;
        }

        .dashboardcode-bsmultiselect .custom-control-label {
            position: relative;
            margin-bottom: 0;
            vertical-align: top;
        }

        .dashboardcode-bsmultiselect .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #007bff;
            background-color: #007bff;
        }

        .dashboardcode-bsmultiselect .custom-checkbox .custom-control-input:checked~.custom-control-label::after {
            background-image: url(<?= asset('admin-assets/assets/images/check.png')
                ?>
                );
            background-size: 70%;
        }

        .dashboardcode-bsmultiselect .custom-control-label::after {
            position: absolute;
            top: .25rem;
            left: -1.5rem;
            display: block;
            width: 1rem;
            height: 1rem;
            content: "";
            background: no-repeat 50%/50% 50%;
        }

        .custom-checkbox .custom-control-label::before {
            border-radius: .25rem;
        }

        .custom-control-label::before,
        .custom-file-label,
        .custom-select {
            transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .custom-control-label::before {
            position: absolute;
            top: .25rem;
            left: -1.5rem;
            display: block;
            width: 1rem;
            height: 1rem;
            pointer-events: none;
            content: "";
            background-color: #fff;
            border: #adb5bd solid 1px;
        }

        .dashboardcode-bsmultiselect .dropdown-menu {
            max-height: 300px;
            overflow: hidden;
            overflow-y: scroll;
        }

    </style>
@endsection

@section('content')

    @php
    $vendors = App\Admin::whereNotIn('role', [1])->get();
    @endphp
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>Shipping</h4>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Shipping</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Create A New Shipping</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="formData">
                                            <form action="" id="shipping_form" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="country" class="col-form-label">Country <b
                                                                class="text-danger">*</b></label>
                                                        <select name="country_id[]" id="country"
                                                            class="form-control multi-select-search" multiple="multiple"
                                                            style="display: none;">
                                                            @foreach ($countries as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="type" class="col-form-label">Type <b
                                                                class="text-danger">*</b></label>
                                                        <select name="type_id" id="type" class="form-control">
                                                            <option value="0">Select Type</option>
                                                            @foreach ($types as $item)
                                                                <option value="{{ $item->id }}">{{ $item->type }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="processing_time" class="col-form-label">Processing time
                                                            <b class="text-danger">*</b></label>
                                                        <select name="processing_time" id="processing_time"
                                                            class="form-control">
                                                            @for ($i = 1; $i <= 30; $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ $i . ($i == 1 ? ' Day' : ' Days') }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Delivery time <b
                                                                class="text-danger">*</b></label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="delivery_from" class="col-form-label">From
                                                            <b class="text-danger">*</b></label>
                                                        <select name="delivery_from" id="delivery_from"
                                                            class="form-control">
                                                            @for ($i = 1; $i <= 30; $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ $i . ($i == 1 ? ' Day' : ' Days') }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="delivery_to" class="col-form-label">To
                                                            <b class="text-danger">*</b></label>
                                                        <select name="delivery_to" id="delivery_to" class="form-control">
                                                            @for ($i = 1; $i <= 30; $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ $i . ($i == 1 ? ' Day' : ' Days') }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="price" class="col-form-label">Shipping Price <b
                                                                class="text-danger">*</b></label>
                                                        <input type="text" id="price" name="price"
                                                            class="form-control check-empty">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="additional_price" class="col-form-label">Additional Item
                                                            Price <b class="text-danger">*</b></label>
                                                        <input type="text" id="additional_price" name="additional_price"
                                                            class="form-control check-empty">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="max_weight" class="col-form-label">Maximum Weight <b
                                                                class="text-danger">*</b></label>
                                                        <input type="text" id="max_weight" name="max_weight"
                                                            class="form-control check-empty">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="additional_weight_price"
                                                            class="col-form-label">Additional
                                                            Weight Price <b class="text-danger">*</b></label>
                                                        <input type="text" id="additional_weight_price"
                                                            name="additional_weight_price" class="form-control check-empty">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="max_price" class="col-form-label">Maximum Price <b
                                                                class="text-danger">*</b></label>
                                                        <input type="text" id="max_price" name="max_price"
                                                            class="form-control check-empty">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="category" class="col-form-label">Category <b
                                                                class="text-danger">*</b></label>
                                                        <select name="category_id" id="category" class="form-control">
                                                            <option value="0">Select Category</option>
                                                            @foreach ($categories as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div
                                                        class="col-sm-12 {{ auth()->user()->role == 1 ? '' : 'd-none' }}">
                                                        <label class="col-form-label">Vendor <b
                                                                class="text-danger">*</b></label>
                                                        <select id="vendor" class="form-control multi-select-search1"
                                                            multiple="multiple" style="display: none;" name="vendor_id[]">
                                                            @foreach ($vendors as $vendor)
                                                                <option value="{{ $vendor->id }}"
                                                                    {{ auth()->user()->role != 1 && auth()->user()->id == $vendor->id ? 'selected' : '' }}>
                                                                    {{ $vendor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
                            <div class="col-md-12">
                                <!-- data table -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Shipping List</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            @include('back-end.shipping.shipping-view')
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
    <div class="md-modal md-effect-13" id="modal-13">
        <div class="md-content">
            <h3 class="bg-dark">Shipping</h3>
            <div class="well">
                <form action="" id="update_form" role="form" enctype="multipart/form-data">
                    @csrf
                    <label for="countryEdit">Country:</label>
                    <select name="country_id" id="countryEdit" class="form-control">
                        <option value="0">Select Country</option>
                        @foreach ($countries as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="typeEdit">Type:</label>
                    <select name="type_id" id="typeEdit" class="form-control">
                        <option value="0">Select Type</option>
                        @foreach ($types as $item)
                            <option value="{{ $item->id }}">{{ $item->type }}</option>
                        @endforeach
                    </select>
                    <label for="processing_timeEdit">Processing Time:</label>
                    <select name="processing_time" id="processing_timeEdit" class="form-control">
                        <option value="0">Select Processing Time</option>
                        @for ($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}">
                                {{ $i . ($i == 1 ? ' Day' : ' Days') }}</option>
                        @endfor
                    </select>
                    <label for="processing_timeEdit">Delivery time:</label>
                    <label for="delivery_fromEdit">From:</label>
                    <select name="delivery_from" id="delivery_fromEdit" class="form-control">
                        <option value="0">Select Delivery From</option>
                        @for ($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}">
                                {{ $i . ($i == 1 ? ' Day' : ' Days') }}</option>
                        @endfor
                    </select>
                    <label for="delivery_toEdit">To:</label>
                    <select name="delivery_to" id="delivery_toEdit" class="form-control">
                        <option value="0">Select Delivery To</option>
                        @for ($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}">
                                {{ $i . ($i == 1 ? ' Day' : ' Days') }}</option>
                        @endfor
                    </select>

                    <label for="priceEdit">Shipping Price:</label>
                    <input type="text" class="form-control check-empty" id="priceEdit" name="price">
                    <label for="additional_priceEdit">Additional Item Price:</label>
                    <input type="text" class="form-control check-empty" id="additional_priceEdit" name="additional_price">

                    <label for="max_weightEdit">Maximum Weight:</label>
                    <input type="text" class="form-control check-empty" id="max_weightEdit" name="max_weight">
                    <label for="additional_weight_priceEdit">Additional Weight Price:</label>
                    <input type="text" class="form-control check-empty" id="additional_weight_priceEdit"
                        name="additional_weight_price">
                    <label for="max_priceEdit">Maximum Price:</label>
                    <input type="text" class="form-control check-empty" id="max_priceEdit" name="max_price">
                    <label for="categoryEdit">Category:</label>
                    <select name="category_id" id="categoryEdit" class="form-control">
                        <option value="0">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="{{ auth()->user()->role == 1 ? '' : 'd-none' }}">
                        <label for="vendorEdit">Vendor</label>
                        <select id="vendorEdit" class="form-control" name="vendor_id">
                            <option value="0">Select Vendor</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}">
                                    {{ $vendor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="idedit" name="id">
                    <input type="hidden" class="tdNuber">
                    <div class="m-btn-area">
                        <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
                        <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                            onclick="updateShipping()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('admin-assets/assets/js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin-assets/assets/js/modalEffects.js') }}"></script>
    <!-- j-pro js -->
    <script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery.maskedinput.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery-cloneya.min.js') }}">
    </script>

    {{-- cloned form --}}
    <script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/custom/cloned-form.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
    <script>
        $(function() {
            $(".multi-select-search").bsMultiSelect();
            $(".multi-select-search1").bsMultiSelect();
            $("#simpletable").DataTable();
            $('.close-modal').on("click", function() {
                $("#modal-13").modal('hide');
            });
        });
        window.base_url = '{{ url(' / ') }}';
        window.insert_shipping = '{{ route('admin.insertShipping') }}';
        window.edit_shipping = '{{ route('admin.getShipping') }}';
        window.update_shipping = '{{ route('admin.updateShipping') }}';
        window.delete_shipping = '{{ route('admin.deleteShipping') }}';

    </script>
@endsection
