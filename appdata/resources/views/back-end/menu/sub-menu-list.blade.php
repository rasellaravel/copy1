@extends('back-end.admin-app')
@section('title', 'Menu')
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

        .select2-dropdown {
            z-index: 9999;
        }

        .select2-search.select2-search--inline {
            padding: 0
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
                            <h4>Sub Menu</h4>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Sub Menu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Create A New Sub Menu</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <ul class="nav nav-tabs tabs ctm-tab-b" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#lenEn" role="tab">
                                                    <div class="f-item">
                                                        <i class="flag flag-icon-background flag-icon-USD"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#lenLt" role="tab">
                                                    <div class="f-item">
                                                        <i class="flag flag-icon-background flag-icon-LTL"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
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
                                            <form action="" id="sub_menu_form" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="tab-content tabs">
                                                    <div class="tab-pane active" id="lenEn" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_en" class="col-form-label">Menu</label>
                                                                <select id="menu_id_en" name="menu_id"
                                                                    class="form-control menu_s"
                                                                    onchange="getCtmSizeFM(event, 'js-example-tokenizer')">
                                                                    <option value="">Menu</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_en }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="custom_sizes_en" class="col-form-label">Sizes
                                                                </label>
                                                                <select id="custom_sizes_en" class="js-example-tokenizer en"
                                                                    multiple="multiple" name="custom_size_id[]">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="specification_en"
                                                                    class="col-form-label">Specification
                                                                </label>
                                                                <select id="specification_en"
                                                                    class="js-example-tokenizer-spec en" multiple="multiple"
                                                                    name="specification_id[]">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="sub_menu_name_en" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <input type="text" id="sub_menu_name_en" name="sub_menu_en"
                                                                    class="form-control check-empty"
                                                                    placeholder="Sub Menu Name">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_en" name="description_en"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="url_en" class="col-form-label">URL</label>
                                                                <input type="text" id="url_en" name="url_en"
                                                                    class="form-control" placeholder="URL">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenLt" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_lt" class="col-form-label">Menu</label>
                                                                <select id="menu_id_lt" name="menu_id"
                                                                    class="form-control menu_s"
                                                                    onchange="getCtmSizeFM(event, 'js-example-tokenizer')">
                                                                    <option value="">Menu</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_lt }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="custom_sizes_lt" class="col-form-label">Sizes
                                                                </label>
                                                                <select id="custom_sizes_lt" class="js-example-tokenizer lt"
                                                                    multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="specification_lt"
                                                                    class="col-form-label">Specification
                                                                </label>
                                                                <select id="specification_lt"
                                                                    class="js-example-tokenizer-spec lt"
                                                                    multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="sub_menu_name_lt" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <input type="text" id="sub_menu_name_lt" name="sub_menu_lt"
                                                                    class="form-control check-empty"
                                                                    placeholder="Papildomo meniu pavadinimas">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_lt" name="description_lt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="url_lt" class="col-form-label">URL</label>
                                                                <input type="text" id="url_lt" name="url_lt"
                                                                    class="form-control" placeholder="URL">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenRus" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_rus" class="col-form-label">Menu</label>
                                                                <select id="menu_id_rus" name="menu_id"
                                                                    class="form-control menu_s"
                                                                    onchange="getCtmSizeFM(event, 'js-example-tokenizer')">
                                                                    <option value="">Menu</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_rus }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="custom_sizes_rus" class="col-form-label">Sizes
                                                                </label>
                                                                <select id="custom_sizes_rus"
                                                                    class="js-example-tokenizer rus" multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="specification_rus"
                                                                    class="col-form-label">Specification
                                                                </label>
                                                                <select id="specification_rus"
                                                                    class="js-example-tokenizer-spec rus"
                                                                    multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="sub_menu_name_rus" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <input type="text" id="sub_menu_name_rus"
                                                                    name="sub_menu_rus" class="form-control check-empty"
                                                                    placeholder="Название подменю">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_rus" name="description_rus"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="url_rus" class="col-form-label">URL</label>
                                                                <input type="text" id="url_rus" name="url_rus"
                                                                    class="form-control" placeholder="URL">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenPt" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_pt" class="col-form-label">Menu</label>
                                                                <select id="menu_id_pt" name="menu_id"
                                                                    class="form-control menu_s"
                                                                    onchange="getCtmSizeFM(event, 'js-example-tokenizer')">
                                                                    <option value="">Menu</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_pt }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="custom_sizes_pt" class="col-form-label">Sizes
                                                                </label>
                                                                <select id="custom_sizes_pt" class="js-example-tokenizer pt"
                                                                    multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="specification_pt"
                                                                    class="col-form-label">Specification
                                                                </label>
                                                                <select id="specification_pt"
                                                                    class="js-example-tokenizer-spec pt"
                                                                    multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="sub_menu_name_pt" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <input type="text" id="sub_menu_name_pt" name="sub_menu_pt"
                                                                    class="form-control check-empty"
                                                                    placeholder="Nome do submenu">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_pt" name="description_pt"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="url_pt" class="col-form-label">URL</label>
                                                                <input type="text" id="url_pt" name="url_pt"
                                                                    class="form-control" placeholder="URL">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenEs" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label for="menu_id_es" class="col-form-label">Menu</label>
                                                                <select id="menu_id_es" name="menu_id"
                                                                    class="form-control menu_s"
                                                                    onchange="getCtmSizeFM(event, 'js-example-tokenizer')">
                                                                    <option value="">Menu</option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_es }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="custom_sizes_es" class="col-form-label">Sizes
                                                                </label>
                                                                <select id="custom_sizes_es" class="js-example-tokenizer es"
                                                                    multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="specification_es"
                                                                    class="col-form-label">Specification
                                                                </label>
                                                                <select id="specification_es"
                                                                    class="js-example-tokenizer-spec es"
                                                                    multiple="multiple">
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="sub_menu_name_es" class="col-form-label">Sub
                                                                    Menu</label>
                                                                <input type="text" id="sub_menu_name_es" name="sub_menu_es"
                                                                    class="form-control check-empty"
                                                                    placeholder="Nombre del submenú">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="col-form-label">Description</label>
                                                                <textarea id="description_es" name="description_es"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="url_es" class="col-form-label">URL</label>
                                                                <input type="text" id="url_es" name="url_es"
                                                                    class="form-control" placeholder="URL">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Image</label>
                                                            <div class="controls m-b-10">
                                                                <label class="btn btn-primary btn-file">
                                                                    <i class="fa fa-upload"></i> Image
                                                                    <input type="file" style="display: none;" name="img"
                                                                        id="img" onchange="showMainImg(event, '#img_show')">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div id="img_show"></div>
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
                                        <h5>Sub Menus</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            @include('back-end.menu.sub-menu-view')
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
            <h3 class="bg-dark">Sub Menu</h3>
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
                            <select id="menuIdEn" name="menu_id" class="form-control menu_s_m"
                                onchange="getCtmSizeFM(event, 'js-example-tokenizer2')">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_en }}</option>
                                @endforeach
                            </select>
                            <label for="custom_sizes_enEdit">Sizes:</label>
                            <select id="custom_sizes_enEdit" class="form-control js-example-tokenizer2 en" multiple="multiple"
                                name="custom_size_id[]">
                            </select>
                            <label for="specification_enEdit">Specification:</label>
                            <select id="specification_enEdit" class="form-control js-example-tokenizer2-spec en" multiple="multiple"
                                name="specification_id[]">
                            </select>
                            <label for="subMenu_enEdit">Sub Menu:</label>
                            <input type="text" class="form-control check-empty" id="subMenu_enEdit" name="sub_menu_en">
                            <label for="description_enE" class="mt-20">Description:</label>
                            <textarea id="description_enE" name="description_en" class="form-control"></textarea>
                            <label for="url_enE">URL:</label>
                            <input type="text" class="form-control" id="url_enE" name="url_en">
                        </div>
                        <div class="tab-pane" id="lenLtM" role="tabpanel">
                            <label for="menuIdLt">Menu:</label>
                            <select id="menuIdLt" name="menu_id" class="form-control menu_s_m"
                                onchange="getCtmSizeFM(event, 'js-example-tokenizer2')">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_lt }}</option>
                                @endforeach
                            </select>
                            <label for="custom_sizes_ltEdit">Sizes:</label>
                            <select id="custom_sizes_ltEdit" class="form-control js-example-tokenizer2 lt" multiple="multiple">
                            </select>
                            <label for="specification_ltEdit">Specification:</label>
                            <select id="specification_ltEdit" class="form-control js-example-tokenizer2-spec lt" multiple="multiple">
                            </select>
                            <label for="subMenu_ltEdit">Sub Menu:</label>
                            <input type="text" class="form-control check-empty" id="subMenu_ltEdit" name="sub_menu_lt">
                            <label for="description_ltE" class="mt-20">Description:</label>
                            <textarea id="description_ltE" name="description_lt" class="form-control"></textarea>
                            <label for="url_ltE">URL:</label>
                            <input type="text" class="form-control" id="url_ltE" name="url_lt">
                        </div>
                        <div class="tab-pane" id="lenRusM" role="tabpanel">
                            <label for="menuIdRus">Menu:</label>
                            <select id="menuIdRus" name="menu_id" class="form-control menu_s_m"
                                onchange="getCtmSizeFM(event, 'js-example-tokenizer2')">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_rus }}</option>
                                @endforeach
                            </select>
                            <label for="custom_sizes_rusEdit">Sizes:</label>
                            <select id="custom_sizes_rusEdit" class="form-control js-example-tokenizer2 rus" multiple="multiple">
                            </select>
                            <label for="specification_rusEdit">Specification:</label>
                            <select id="specification_rusEdit" class="form-control js-example-tokenizer2-spec rus" multiple="multiple">
                            </select>
                            <label for="subMenu_rusEdit">Sub Menu:</label>
                            <input type="text" class="form-control check-empty" id="subMenu_rusEdit" name="sub_menu_rus">
                            <label for="description_rusE" class="mt-20">Description:</label>
                            <textarea id="description_rusE" name="description_rus" class="form-control"></textarea>
                            <label for="url_rusE">URL:</label>
                            <input type="text" class="form-control" id="url_rusE" name="url_rus">
                        </div>
                        <div class="tab-pane" id="lenPtM" role="tabpanel">
                            <label for="menuIdPt">Menu:</label>
                            <select id="menuIdPt" name="menu_id" class="form-control menu_s_m"
                                onchange="getCtmSizeFM(event, 'js-example-tokenizer2')">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_pt }}</option>
                                @endforeach
                            </select>
                            <label for="custom_sizes_ptEdit">Sizes:</label>
                            <select id="custom_sizes_ptEdit" class="form-control js-example-tokenizer2 pt" multiple="multiple">
                            </select>
                            <label for="specification_ptEdit">Specification:</label>
                            <select id="specification_ptEdit" class="form-control js-example-tokenizer2-spec pt" multiple="multiple">
                            </select>
                            <label for="subMenu_ptEdit">Sub Menu:</label>
                            <input type="text" class="form-control check-empty" id="subMenu_ptEdit" name="sub_menu_pt">
                            <label for="description_ptE" class="mt-20">Description:</label>
                            <textarea id="description_ptE" name="description_pt" class="form-control"></textarea>
                            <label for="url_ptE">URL:</label>
                            <input type="text" class="form-control" id="url_ptE" name="url_pt">
                        </div>
                        <div class="tab-pane" id="lenEsM" role="tabpanel">
                            <label for="menuIdEs">Menu:</label>
                            <select id="menuIdEs" name="menu_id" class="form-control menu_s_m"
                                onchange="getCtmSizeFM(event, 'js-example-tokenizer2')">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->menu_es }}</option>
                                @endforeach
                            </select>
                            <label for="custom_sizes_esEdit form-control">Sizes:</label>
                            <select id="custom_sizes_esEdit" class="js-example-tokenizer2 es" multiple="multiple">
                            </select>
                            <label for="specification_esEdit">Specification:</label>
                            <select id="specification_esEdit" class="form-control js-example-tokenizer2-spec es" multiple="multiple">
                            </select>
                            <label for="subMenu_esEdit">Sub Menu:</label>
                            <input type="text" class="form-control check-empty" id="subMenu_esEdit" name="sub_menu_es">
                            <label for="description_esE" class="mt-20">Description:</label>
                            <textarea id="description_esE" name="description_es" class="form-control"></textarea>
                            <label for="url_esE">URL:</label>
                            <input type="text" class="form-control" id="url_esE" name="url_es">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label mt-20">Image</label>
                        <div class="controls m-b-10">
                            <label class="btn btn-primary btn-file">
                                <i class="fa fa-upload"></i> Image
                                <input type="file" style="display: none;" name="img" id="imgE">
                            </label>
                        </div>
                    </div>
                    <div id="img_showE"></div>
                    <input type="hidden" id="idedit" name="id">
                    <input type="hidden" class="tdNuber">
                    <div class="m-btn-area">
                        <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
                        <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                            onclick="updateSubMenu()">Save</button>
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
            $("#simpletable").DataTable();
            $('.js-example-tokenizer-c').select2();
            $('.js-example-tokenizer-sa').select2();
            $('.js-example-tokenizer-spec').select2();

            $('.close-modal').on("click", function() {
                $("#modal-13").modal('hide');
            });
            $("#description_en").summernote();
            $("#description_lt").summernote();
            $("#description_rus").summernote();
            $("#description_pt").summernote();
            $("#description_es").summernote();

            $("#description_enE").summernote();
            $("#description_ltE").summernote();
            $("#description_rusE").summernote();
            $("#description_ptE").summernote();
            $("#description_esE").summernote();

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
            });
        });
        window.base_url = "{{ url(' / ') }}";
        window.insert_sub_menu = "{{ url('admin/insert-sub-menu') }}";
        window.edit_sub_menu = "{{ url('admin/get-sub-menu') }}";
        window.delete_sub_menu = "{{ url('admin/delete-sub-menu') }}";
        window.update_sub_menu = "{{ url('admin/update-sub-menu') }}";
        window.get_custom_size_from_menu = "{{ url('admin/get-custom-size-from-menu') }}";

    </script>
@endsection
