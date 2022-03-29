@extends('back-end.admin-app')
@section('title', 'Product')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/component.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css') }}">
    <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/j-forms.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/cropper.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css">
    <style>
        .sdr-img-v {
            max-width: 200px;
            margin: 20px 0;
        }

        .sdr-img-v img {
            width: 100%;
        }

        #simpletable img {
            width: 150px;
        }

        .product-price-add {
            margin-top: 15px;
        }

        .select2-dropdown {
            z-index: 9999;
        }

        .select2-search.select2-search--inline {
            padding: 0
        }

        .custom-select {
            height: 50px;
            border-radius: 0;
        }

        .append-size {
            margin-top: 15px
        }

        .append-size .btn {
            padding: 15px 20px;
        }

        .select2-selection--multiple {
            padding: 2px 30px 2px 10px !important;
            border-radius: 0 !important;
            min-height: 50px !important;
        }

        #update_form .custom-select {
            height: 60px;
        }

        .product-color-add {
            margin-top: 15px
        }

        .product-color-add .btn,
        #update_form .append-size .btn {
            padding: 21px 20px;
        }

        #update_form .select2-selection--multiple {
            padding: 2px 30px 2px 10px !important;
            border-radius: 0 !important;
            min-height: 60px !important;
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
                            <h4>Product</h4>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Pages</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" id="create_product">
                                    <div class="card-header">
                                        <h5>Create A New Product</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <ul class="nav nav-tabs tabs ctm-tab-b" role="tablist">
                                            <li class="nav-item lng1">
                                                <a class="nav-link active" data-toggle="tab" href="#lenEn" role="tab">
                                                    <div class="f-item">
                                                        <i class="flag flag-icon-background flag-icon-USD"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item lng1">
                                                <a class="nav-link" data-toggle="tab" href="#lenLt" role="tab">
                                                    <div class="f-item">
                                                        <i class="flag flag-icon-background flag-icon-LTL"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item lng1">
                                                <a class="nav-link" data-toggle="tab" href="#lenRus" role="tab">
                                                    <div class="f-item">
                                                        <i class="flag flag-icon-background flag-icon-RUB"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#lenPt" role="tab">
                                                    <div class="f-item">
                                                        <i class="flag flag-icon-background flag-icon-pt"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#lenEs" role="tab">
                                                    <div class="f-item">
                                                        <i class="flag flag-icon-background flag-icon-es"></i>
                                                    </div>
                                                </a>
                                            </li> --}}
                                        </ul>
                                        <div id="formData">
                                            <form action="" id="product_form" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="tab-content tabs">
                                                    <div class="tab-pane active" id="lenEn" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_en" class="col-form-label">
                                                                    Menu
                                                                    <b class="text-danger top-4">*</b>
                                                                </label>
                                                                <select id="menu_id_en" name="menu_id"
                                                                    class="form-control menu_s gsm">
                                                                    <option value="">Select</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_en }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="sub_menu_id_en" class="col-form-label">
                                                                    Sub Menu
                                                                    <b class="text-danger top-4">*</b>
                                                                    <small class="text-danger">(if exist)</small>
                                                                </label>
                                                                <select id="sub_menu_id_en" name="sub_menu_id"
                                                                    class="form-control sub_menu_s gssm">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="inner_menu_id_en" class="col-form-label">
                                                                    Inner Menu
                                                                    <b class="text-danger top-4">*</b>
                                                                    <small class="text-danger">(if exist)</small>
                                                                </label>
                                                                <select id="inner_menu_id_en" name="inner_menu_id"
                                                                    class="form-control inner_menu_s gsim">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label">
                                                                    Title
                                                                    <b class="text-danger top-4">*</b>
                                                                </label>
                                                                <input type="text" id="title_en" name="title_en"
                                                                    class="form-control check-empty">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">URL</label>
                                                                <input type="text" id="url_en" name="url_en"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_en" name="description_en"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Delivery</label>
                                                                <textarea id="delivery_en" name="delivery_en"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Specification</label>
                                                                <textarea id="specification_en" name="specification_en"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="product-spec-en">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="tab-pane" id="lenLt" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_lt" class="col-form-label">Menu</label>
                                                                <select id="menu_id_lt" name="menu_id"
                                                                    class="form-control menu_s gsm">
                                                                    <option value="">Select</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_lt }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="sub_menu_id_lt" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <select id="sub_menu_id_lt" name="sub_menu_id"
                                                                    class="form-control sub_menu_s gssm">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="inner_menu_id_lt" class="col-form-label">Inner
                                                                    Menu</label>
                                                                <select id="inner_menu_id_lt" name="inner_menu_id"
                                                                    class="form-control inner_menu_s gsim">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label">Title</label>
                                                                <input type="text" id="title_lt" name="title_lt"
                                                                    class="form-control check-empty">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">URL</label>
                                                                <input type="text" id="url_lt" name="url_lt"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_lt" name="description_lt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Delivery</label>
                                                                <textarea id="delivery_lt" name="delivery_lt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Specification</label>
                                                                <textarea id="specification_lt" name="specification_lt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="row product-spec-lt">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenRus" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_rus" class="col-form-label">Menu</label>
                                                                <select id="menu_id_rus" name="menu_id"
                                                                    class="form-control menu_s gsm">
                                                                    <option value="">Select</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_rus }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="sub_menu_id_rus" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <select id="sub_menu_id_rus" name="sub_menu_id"
                                                                    class="form-control sub_menu_s gssm">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="inner_menu_id_rus" class="col-form-label">Inner
                                                                    Menu</label>
                                                                <select id="inner_menu_id_rus" name="inner_menu_id"
                                                                    class="form-control inner_menu_s gsim">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label">Title</label>
                                                                <input type="text" id="title_rus" name="title_rus"
                                                                    class="form-control check-empty">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">URL</label>
                                                                <input type="text" id="url_rus" name="url_rus"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_rus" name="description_rus"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Delivery</label>
                                                                <textarea id="delivery_rus" name="delivery_rus"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Specification</label>
                                                                <textarea id="specification_rus" name="specification_rus"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="row product-spec-rus">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenPt" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_pt" class="col-form-label">Menu</label>
                                                                <select id="menu_id_pt" name="menu_id"
                                                                    class="form-control menu_s gsm">
                                                                    <option value="">Select</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_pt }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="sub_menu_id_pt" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <select id="sub_menu_id_pt" name="sub_menu_id"
                                                                    class="form-control sub_menu_s gssm">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="inner_menu_id_pt" class="col-form-label">Inner
                                                                    Menu</label>
                                                                <select id="inner_menu_id_pt" name="inner_menu_id"
                                                                    class="form-control inner_menu_s gsim">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label">Title</label>
                                                                <input type="text" id="title_pt" name="title_pt"
                                                                    class="form-control check-empty">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">URL</label>
                                                                <input type="text" id="url_pt" name="url_pt"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_pt" name="description_pt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Delivery</label>
                                                                <textarea id="delivery_pt" name="delivery_pt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Specification</label>
                                                                <textarea id="specification_pt" name="specification_pt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="row product-spec-pt">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenEs" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_es" class="col-form-label">Menu</label>
                                                                <select id="menu_id_es" name="menu_id"
                                                                    class="form-control menu_s gsm">
                                                                    <option value="">Select</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_es }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="sub_menu_id_es" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <select id="sub_menu_id_es" name="sub_menu_id"
                                                                    class="form-control sub_menu_s gssm">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="inner_menu_id_es" class="col-form-label">Inner
                                                                    Menu</label>
                                                                <select id="inner_menu_id_es" name="inner_menu_id"
                                                                    class="form-control inner_menu_s gsim">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="col-form-label">Title</label>
                                                                <input type="text" id="title_es" name="title_es"
                                                                    class="form-control check-empty">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">URL</label>
                                                                <input type="text" id="url_es" name="url_es"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_es" name="description_es"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Delivery</label>
                                                                <textarea id="delivery_es" name="delivery_es"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Specification</label>
                                                                <textarea id="specification_es" name="specification_es"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="row product-spec-es">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Product Code</label>
                                                        <input type="text" id="code" name="code"
                                                            class="form-control check-empty proCode">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Weight</label>
                                                        <input type="text" id="weight" name="weight"
                                                            class="form-control check-empty">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Shipping Category</label>
                                                        <select id="shipping_category_id" class="form-control copysCat js-example-tokenizer-clr9 multi-slt clrmso"
                                                            name="shipping_category_id[]" multiple="multiple">
                                                            @foreach ($shipping_categories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">
                                                            Price
                                                            <b class="text-danger top-4">*</b>
                                                        </label>
                                                        <input type="text" id="price" name="price"
                                                            class="form-control check-empty">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Discount</label>
                                                        <input type="text" id="discount" name="discount"
                                                            class="form-control check-empty">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="append-size ins">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Colors</label>
                                                        <select id="color_id"
                                                            class="js-example-tokenizer-clr multi-slt clrmso"
                                                            multiple="multiple" name="custom_color_id[]">
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}">
                                                                    {{ $color->color_en }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Others</label>
                                                        <textarea id="others" name="others" class="form-control"></textarea>
                                                    </div>
                                                    <div
                                                        class="col-sm-12 {{ auth()->user()->role == 1 ? '' : 'd-none' }}">
                                                        <label class="col-form-label">Vendor</label>
                                                        <select id="vendor_id" class="form-control" name="vendor_id">
                                                            @foreach ($vendors as $vendor)
                                                                <option value="{{ $vendor->id }}"
                                                                    {{ auth()->user()->role != 1 && auth()->user()->id == $vendor->id ? 'selected' : '' }}>
                                                                    {{ $vendor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Product Image</label>
                                                            <div class="controls m-b-10">
                                                                <label class="btn btn-primary btn-file">
                                                                    <i class="fa fa-upload"></i> Product Image
                                                                    <input type="file" style="display: none;"
                                                                        name="main_img" id="main_img"
                                                                        onchange="showMainImg(event, '#main_img_show')">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div id="main_img_show"></div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Alt Image</label>
                                                            <div class="controls m-b-10">
                                                                <label class="btn btn-primary btn-file">
                                                                    <i class="fa fa-upload"></i> Alt Image
                                                                    <input type="file" style="display: none;" id="alt_img"
                                                                        multiple
                                                                        onchange="showAltImg(event, '#alt_img_show', 'pro_alt_temp_img')">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div id="alt_img_show"></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="ck-container mt-20">New Stock
                                                            <input type="checkbox" id="new_s" value="1" name="new_s">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="ck-container mt-20">Top Product
                                                            <input type="checkbox" id="is_top_pro" value="1"
                                                                name="is_top_product">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="ck-container mt-20">Free Shipping
                                                            <input type="checkbox" id="is_free_shipping" value="1"
                                                                name="is_free_shipping">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="ck-container mt-20">Certificate
                                                            <input type="checkbox" id="is_certificate" value="1"
                                                                name="is_certificate">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="saveF">
                                                    <input type="submit" class=" ml-20 btn btn-primary" value="Save">
                                                    <img src="{{ asset('admin-assets/assets/images/loading.gif') }}"
                                                        class="d-none" style="width: 40px;margin-left: 15px;" alt="img">
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
                                        <h5>Products</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            @include('back-end.product.product-view')
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
            <h3 class="bg-dark">Product</h3>
            <div class="well">
                <ul class="nav nav-tabs tabs ctm-tab-b" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#lenEnM" role="tab">
                            <div class="f-item">
                                <i class="flag flag-icon-background flag-icon-USD"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#lenLtM" role="tab">
                            <div class="f-item">
                                <i class="flag flag-icon-background flag-icon-LTL"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#lenRusM" role="tab">
                            <div class="f-item">
                                <i class="flag flag-icon-background flag-icon-RUB"></i>
                            </div>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#lenPtM" role="tab">
                            <div class="f-item">
                                <i class="flag flag-icon-background flag-icon-pt"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#lenEsM" role="tab">
                            <div class="f-item">
                                <i class="flag flag-icon-background flag-icon-es"></i>
                            </div>
                        </a>
                    </li> --}}
                </ul>
                <form action="" id="update_form" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content tabs mt-20">
                        <div class="tab-pane active" id="lenEnM" role="tabpanel">
                            <label for="menuIdEn">Menu:</label>
                            <select id="menuIdEn" name="menu_id" class="form-control menu_s_m gsm">
                                <option>Select</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_en }}</option>
                                @endforeach
                            </select>
                            <label for="subMenuIdEn">Sub Menu:</label>
                            <select id="subMenuIdEn" name="sub_menu_id" class="form-control sub_menu_s_m gssm">
                            </select>
                            <label for="innerMenuIdEn">Inner Menu:</label>
                            <select id="innerMenuIdEn" name="inner_menu_id" class="form-control inner_menu_s_m gsim">
                            </select>
                            <label for="title_enE" class="mt-20">Title:</label>
                            <input type="text" class="form-control check-empty" id="title_enE" name="title_en">
                            <label for="url_enE" class="mt-20">URL:</label>
                            <input type="text" class="form-control" id="url_enE" name="url_en">
                            <label for="description_enE" class="mt-20">Description:</label>
                            <textarea id="description_enE" name="description_en" class="form-control"></textarea>
                            <label for="delivery_enE" class="mt-20">Delivery:</label>
                            <textarea id="delivery_enE" name="delivery_en" class="form-control"></textarea>
                            <label for="specification_enE" class="mt-20">Specification:</label>
                            <textarea id="specification_enE" name="specification_en" class="form-control"></textarea>
                            <div class="product-spec-enE">
                            </div>
                        </div>
                        <div class="tab-pane" id="lenLtM" role="tabpanel">
                            <label for="menuIdLt">Menu:</label>
                            <select id="menuIdLt" class="form-control menu_s_m gsm">
                                <option>Select</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_lt }}</option>
                                @endforeach
                            </select>
                            <label for="subMenuIdLt">Sub Menu:</label>
                            <select id="subMenuIdLt" class="form-control sub_menu_s_m gssm">
                            </select>
                            <label for="innerMenuIdLt">Inner Menu:</label>
                            <select id="innerMenuIdLt" class="form-control inner_menu_s_m gssm">
                            </select>
                            <label for="title_ltE" class="mt-20">Title:</label>
                            <input type="text" class="form-control check-empty" id="title_ltE" name="title_lt">
                            <label for="url_ltE" class="mt-20">URL:</label>
                            <input type="text" class="form-control" id="url_ltE" name="url_lt">
                            <label for="description_ltE" class="mt-20">Description:</label>
                            <textarea id="description_ltE" name="description_lt" class="form-control"></textarea>
                            <label for="delivery_ltE" class="mt-20">Delivery:</label>
                            <textarea id="delivery_ltE" name="delivery_lt" class="form-control"></textarea>
                            <label for="specification_ltE" class="mt-20">Specification:</label>
                            <textarea id="specification_ltE" name="specification_lt" class="form-control"></textarea>
                            <div class="product-spec-ltE">
                            </div>
                        </div>
                        <div class="tab-pane" id="lenRusM" role="tabpanel">
                            <label for="menuIdRus">Menu:</label>
                            <select id="menuIdRus" class="form-control menu_s_m gsm">
                                <option>Select</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_rus }}</option>
                                @endforeach
                            </select>
                            <label for="subMenuIdRus">Sub Menu:</label>
                            <select id="subMenuIdRus" class="form-control sub_menu_s_m gssm">
                            </select>
                            <label for="innerMenuIdRus">Inner Menu:</label>
                            <select id="innerMenuIdRus" class="form-control inner_menu_s_m gsim">
                            </select>
                            <label for="title_rusE" class="mt-20">Title:</label>
                            <input type="text" class="form-control check-empty" id="title_rusE" name="title_rus">
                            <label for="url_rusE" class="mt-20">URL:</label>
                            <input type="text" class="form-control" id="url_rusE" name="url_rus">
                            <label for="description_rusE" class="mt-20">Description:</label>
                            <textarea id="description_rusE" name="description_rus" class="form-control"></textarea>
                            <label for="delivery_rusE" class="mt-20">Delivery:</label>
                            <textarea id="delivery_rusE" name="delivery_rus" class="form-control"></textarea>
                            <label for="specification_rusE" class="mt-20">Specification:</label>
                            <textarea id="specification_rusE" name="specification_rus" class="form-control"></textarea>
                            <div class="product-spec-rusE">
                            </div>
                        </div>
                        <div class="tab-pane" id="lenPtM" role="tabpanel">
                            <label for="menuIdPt">Menu:</label>
                            <select id="menuIdPt" class="form-control menu_s_m gsm">
                                <option>Select</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_pt }}</option>
                                @endforeach
                            </select>
                            <label for="subMenuIdPt">Sub Menu:</label>
                            <select id="subMenuIdPt" class="form-control sub_menu_s_m gssm">
                            </select>
                            <label for="innerMenuIdPt">Inner Menu:</label>
                            <select id="innerMenuIdPt" class="form-control inner_menu_s_m gssm">
                            </select>
                            <label for="title_ptE" class="mt-20">Title:</label>
                            <input type="text" class="form-control check-empty" id="title_ptE" name="title_pt">
                            <label for="url_ptE" class="mt-20">URL:</label>
                            <input type="text" class="form-control" id="url_ptE" name="url_pt">
                            <label for="description_ptE" class="mt-20">Description:</label>
                            <textarea id="description_ptE" name="description_pt" class="form-control"></textarea>
                            <label for="delivery_ptE" class="mt-20">Delivery:</label>
                            <textarea id="delivery_ptE" name="delivery_pt" class="form-control"></textarea>
                            <label for="specification_ptE" class="mt-20">Specification:</label>
                            <textarea id="specification_ptE" name="specification_pt" class="form-control"></textarea>
                            <div class="product-spec-ptE">
                            </div>
                        </div>
                        <div class="tab-pane" id="lenEsM" role="tabpanel">
                            <label for="menuIdEs">Menu:</label>
                            <select id="menuIdEs" class="form-control menu_s_m gsm">
                                <option>Select</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_es }}</option>
                                @endforeach
                            </select>
                            <label for="subMenuIdEs">Sub Menu:</label>
                            <select id="subMenuIdEs" class="form-control sub_menu_s_m gssm">
                            </select>
                            <label for="innerMenuIdEs">Inner Menu:</label>
                            <select id="innerMenuIdEs" class="form-control inner_menu_s_m gssm">
                            </select>
                            <label for="title_esE" class="mt-20">Title:</label>
                            <input type="text" class="form-control check-empty" id="title_esE" name="title_es">
                            <label for="url_esE" class="mt-20">URL:</label>
                            <input type="text" class="form-control" id="url_esE" name="url_es">
                            <label for="description_esE" class="mt-20">Description:</label>
                            <textarea id="description_esE" name="description_es" class="form-control"></textarea>
                            <label for="delivery_esE" class="mt-20">Delivery:</label>
                            <textarea id="delivery_esE" name="delivery_es" class="form-control"></textarea>
                            <label for="specification_esE" class="mt-20">Specification:</label>
                            <textarea id="specification_esE" name="specification_es" class="form-control"></textarea>
                            <div class="product-spec-esE">
                            </div>
                        </div>
                    </div>
                    <label for="codeE" class="mt-20">Product Code:</label>
                    <input type="text" class="form-control check-empty" id="codeE" name="code">
                    <label for="weightE" class="mt-20">Weight:</label>
                    <input type="number" class="form-control check-empty" id="weightE" name="weight">
                    <label for="shipping_category_idEdit">Shipping Category</label>
                    <select id="shipping_category_idEditsct" class="form-control editsCat js-example-tokenizer-clr10 multi-slt clrmso" name="shipping_category_id[]" multiple="multiple">
                        @foreach ($shipping_categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>




                    <label for="priceE" class="mt-20">Price:</label>
                    <input type="number" class="form-control check-empty" id="priceE" name="price">
                    <label for="priceE" class="mt-20">Discount:</label>
                    <input type="number" class="form-control check-empty" id="discountE" name="discount">
                    <div class="product-color-add table-responsive" id="product_color_addE">

                    </div>
                    <div class="append-size ins2 table-responsive">

                    </div>
                    <label class="col-form-label">Colors</label>
                    <select id="color_idE" class="js-example-tokenizer-clr2 multi-slt clrmso" multiple="multiple"
                        name="custom_color_id[]">
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->color_en }}</option>
                        @endforeach
                    </select>
                    <label for="othersE" class="mt-20">Others:</label>
                    <textarea id="othersE" name="others" class="form-control"></textarea>
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
                    <div class="form-group">
                        <label class="form-label mt-20">Product Image</label>
                        <div class="controls m-b-10">
                            <label class="btn btn-primary btn-file">
                                <i class="fa fa-upload"></i> Product Image
                                <input type="file" style="display: none;" name="main_img" id="main_imgE">
                            </label>
                        </div>
                    </div>
                    <div id="main_img_showE"></div>
                    <div class="form-group">
                        <label class="form-label mt-20">Alt Image</label>
                        <div class="controls m-b-10">
                            <label class="btn btn-primary btn-file">
                                <i class="fa fa-upload"></i> Alt Image
                                <input type="file" style="display: none;" id="alt_imgE" multiple>
                            </label>
                        </div>
                    </div>
                    <div id="alt_img_showE"></div>
                    <label class="ck-container mt-20">In Stock
                        <input type="checkbox" id="id_stockE" value="1" name="is_stock">
                        <span class="checkmark"></span>
                    </label>
                    <label class="ck-container mt-20">New Stock
                        <input type="checkbox" id="new_sE" value="1" name="new_s">
                        <span class="checkmark"></span>
                    </label>
                    <label class="ck-container mt-20">Top Product
                        <input type="checkbox" id="is_top_proE" value="1" name="is_top_product">
                        <span class="checkmark"></span>
                    </label>
                    <label class="ck-container mt-20">Free Shipping
                        <input type="checkbox" id="is_free_shippingE" value="1" name="is_free_shipping">
                        <span class="checkmark"></span>
                    </label>
                    <label class="ck-container mt-20">Certificate
                        <input type="checkbox" id="is_certificateE" value="1" name="is_certificate">
                        <span class="checkmark"></span>
                    </label>
                    <input type="hidden" id="idedit" name="id">
                    <input type="hidden" id="last_menu_id" name="last_menu_id">
                    <input type="hidden" class="tdNuber">
                </form>
                <div class="m-btn-area">
                    <button class="md-close btn btn-dark close-modal"> cancel</button>
                    <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                        onclick="updateProduct()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="last_menu_idI" name="last_menu_idI">
    <!-- modal -->

    <div class="modal fade cr-modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true"
        style="z-index: 9999999">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop the image</h4>
                    <button type="button" class="close" data-dismiss="modal" style="font-size:30px">&times;</button>
                </div>
                <div class="modal-body" style="width: 100%; overflow: hidden;">
                    <div class="img-container">
                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" style="width: 100%">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cr-modal" id="modalE" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true"
        style="z-index: 9999999 !important">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crop the image</h4>
                    <button type="button" class="close" data-dismiss="modal" style="font-size:30px">&times;</button>
                </div>
                <div class="modal-body" style="width: 100%; overflow: hidden;">
                    <div class="img-container">
                        <img id="imageE" src="https://avatars0.githubusercontent.com/u/3456749" style="width: 100%">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn" id="cropE">Crop</button>
                </div>
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

    <script src="{{ asset('admin-assets/assets/js/cropper.js') }}"></script>

    {{-- cloned form --}}
    <script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/custom/cloned-form.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
    <script>
        $(function() {
            window.datatable = $("#simpletable").DataTable();
            $('.js-example-tokenizer-c').select2();
            $('.js-example-tokenizer-sa').select2();
            $('.js-example-tokenizer-clr').select2();
            $('.js-example-tokenizer-clr10').select2();
            $('.js-example-tokenizer-clr9').select2();
            $('.js-example-tokenizer-yclr').select2();
            $('.close-modal').on("click", function() {
                $("#modal-13").modal('hide');
            });
            $(".mso").select2();

            $('#price').keyup(function() {
                $('.cprice').val($(this).val());
            });
            $('#priceE').keyup(function() {
                $('.cpriceE').val($(this).val());
            });

            $("#description_en").summernote();
            $("#description_lt").summernote();
            $("#description_rus").summernote();
            $("#description_pt").summernote();
            $("#description_es").summernote();
            $("#delivery_en").summernote();
            $("#delivery_lt").summernote();
            $("#delivery_rus").summernote();
            $("#delivery_pt").summernote();
            $("#delivery_es").summernote();
            $("#specification_en").summernote();
            $("#specification_lt").summernote();
            $("#specification_rus").summernote();
            $("#specification_pt").summernote();
            $("#specification_es").summernote();

            $("#description_enE").summernote();
            $("#description_ltE").summernote();
            $("#description_rusE").summernote();
            $("#description_ptE").summernote();
            $("#description_esE").summernote();
            $("#delivery_enE").summernote();
            $("#delivery_ltE").summernote();
            $("#delivery_rusE").summernote();
            $("#delivery_ptE").summernote();
            $("#delivery_esE").summernote();
            $("#specification_enE").summernote();
            $("#specification_ltE").summernote();
            $("#specification_rusE").summernote();
            $("#specification_ptE").summernote();
            $("#specification_esE").summernote();

            $("#others").summernote();
            $("#othersE").summernote();

            $(".note-editable").blur(function() {
                $("#description_en").val($("#description_en").code());
                $("#description_lt").val($("#description_lt").code());
                $("#description_rus").val($("#description_rus").code());
                $("#description_pt").val($("#description_pt").code());
                $("#description_es").val($("#description_es").code());
                $("#description_enE").val($("#description_enE").code());
                $("#description_ltE").val($("#description_ltE").code());
                $("#description_rusE").val($("#description_rusE").code());
                $("#description_ptE").val($("#description_ptE").code());
                $("#description_esE").val($("#description_esE").code());
                $("#delivery_en").val($("#delivery_en").code());
                $("#delivery_lt").val($("#delivery_lt").code());
                $("#delivery_rus").val($("#delivery_rus").code());
                $("#delivery_pt").val($("#delivery_pt").code());
                $("#delivery_es").val($("#delivery_es").code());
                $("#delivery_enE").val($("#delivery_enE").code());
                $("#delivery_ltE").val($("#delivery_ltE").code());
                $("#delivery_rusE").val($("#delivery_rusE").code());
                $("#delivery_ptE").val($("#delivery_ptE").code());
                $("#delivery_esE").val($("#delivery_esE").code());
                $("#specification_en").val($("#specification_en").code());
                $("#specification_lt").val($("#specification_lt").code());
                $("#specification_rus").val($("#specification_rus").code());
                $("#specification_pt").val($("#specification_pt").code());
                $("#specification_es").val($("#specification_es").code());
                $("#specification_enE").val($("#specification_enE").code());
                $("#specification_ltE").val($("#specification_ltE").code());
                $("#specification_rusE").val($("#specification_rusE").code());
                $("#specification_ptE").val($("#specification_ptE").code());
                $("#specification_esE").val($("#specification_esE").code());

                $("#others").val($("#others").code());
                $("#othersE").val($("#othersE").code());
            });
        });
        window.c_page = 'product';
        window.base_url = '{{ url(' / ') }}';
        window.insert_product = '{{ url('admin/insert-product') }}';
        window.edit_product = '{{ url('admin/get-product') }}';
        window.duplicate_product = '{{ url('admin/duplicate-product') }}';
        window.update_product = '{{ url('admin/update-product') }}';
        window.delete_product = '{{ url('admin/delete-product') }}';
        window.alt_tmp_img_up = '{{ url('admin/alt-temp-pimg-up') }}';
        window.alt_tmp_img_remove = '{{ url('admin/alt-temp-pimg-remove') }}';
        window.delete_alt_img_by_id = '{{ url('admin/delete-alt-img-by-id') }}';
        window.update_product_price = '{{ url('admin/update-product-price') }}';
        window.delete_product_price = '{{ url('admin/delete-product-price') }}';
        window.product_tmp_main_img = '{{ url('admin/add-product-tmp-main-img') }}';
        window.remove_product_tmp_main_img = '{{ url('admin/remove-product-tmp-main-img') }}';
        window.update_product_main_img = '{{ url('admin/update-product-tmp-main-img') }}';

        window.get_sub_menu_by_menu = '{{ route('admin.getSubMenuByMenu') }}';
        window.get_inner_menu_by_sub_menu = '{{ route('admin.getInnerMenuBySubMenu') }}';
        window.get_custom_size_by_inner_menu = '{{ route('admin.getCtmSizeFIM') }}';
        window.get_color_size_apnd_content = '{{ route('admin.getColorSizeAppendContent') }}';
        window.update_product_size_single = '{{ route('admin.updateProductSizeSingle') }}';
        window.delete_product_size_single = '{{ route('admin.deleteProductSizeSingle') }}';
    
        $(document).on('click','.lng1', function(){
            var code = $('.proCode').val().trim();
            if(code == '<i class="flag flag-icon-background flag-icon-LTL"></i>'){
                $('.proCode').val('');
            }
            if(code == '<i class="flag flag-icon-background flag-icon-USD"></i>'){
                $('.proCode').val('');
            }
            if(code == '<i class="flag flag-icon-background flag-icon-RUB"></i>'){
                $('.proCode').val('');
            }

        })
    
    </script>
@endsection
