@extends('back-end.admin-app')
@section('title', 'Custom Color')
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
                            <h4>Specification</h4>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Specification</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Create A New Specification</h5>
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
                                            <form action="" id="specification_form" role="form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="tab-content tabs">
                                                    <div class="tab-pane active" id="lenEn" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label for="name_en" class="col-form-label">Name <b
                                                                        class="text-danger">*</b></label>
                                                                <input type="text" id="name_en" name="name_en"
                                                                    class="form-control check-empty">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenLt" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label for="name_lt" class="col-form-label">Name <b
                                                                        class="text-danger">*</b></label>
                                                                <input type="text" id="name_lt" name="name_lt"
                                                                    class="form-control check-empty">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenRus" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label for="name_rus" class="col-form-label">Name <b
                                                                        class="text-danger">*</b></label>
                                                                <input type="text" id="name_rus" name="name_rus"
                                                                    class="form-control check-empty">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenPt" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label for="name_pt" class="col-form-label">Name <b
                                                                        class="text-danger">*</b></label>
                                                                <input type="text" id="name_pt" name="name_pt"
                                                                    class="form-control check-empty">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="lenEs" role="tabpanel">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label for="name_es" class="col-form-label">Name <b
                                                                        class="text-danger">*</b></label>
                                                                <input type="text" id="name_es" name="name_es"
                                                                    class="form-control check-empty">
                                                            </div>
                                                        </div>
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
                                        <h5>Specifications</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            @include('back-end.specification.specification-view')
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
            <h3 class="bg-dark">Specification</h3>
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
                            <label for="name_enEdit">Name:</label>
                            <input type="text" class="form-control check-empty" id="name_enEdit" name="name_en">
                        </div>
                        <div class="tab-pane" id="lenLtM" role="tabpanel">
                            <label for="name_ltEdit">Name:</label>
                            <input type="text" class="form-control check-empty" id="name_ltEdit" name="name_lt">
                        </div>
                        <div class="tab-pane" id="lenRusM" role="tabpanel">
                            <label for="name_rusEdit">Name:</label>
                            <input type="text" class="form-control check-empty" id="name_rusEdit" name="name_rus">
                        </div>
                        <div class="tab-pane" id="lenPtM" role="tabpanel">
                            <label for="name_ptEdit">Name:</label>
                            <input type="text" class="form-control check-empty" id="name_ptEdit" name="name_pt">
                        </div>
                        <div class="tab-pane" id="lenEsM" role="tabpanel">
                            <label for="name_esEdit">Name:</label>
                            <input type="text" class="form-control check-empty" id="name_esEdit" name="name_es">
                        </div>
                    </div>
                    <input type="hidden" id="idedit" name="id">
                    <input type="hidden" class="tdNuber">
                    <div class="m-btn-area">
                        <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
                        <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                            onclick="updateSpecification()">Save</button>
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
    <script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery-cloneya.min.js') }}"></script>

    {{-- cloned form --}}
    <script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/custom/cloned-form.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
    <script>
        $(function() {
            $("#simpletable").DataTable();
            $('.close-modal').on("click", function() {
                $("#modal-13").modal('hide');
            });
        });
        window.base_url = '{{ url('/') }}';
        window.insert_specification = '{{ route('admin.insertSpecification') }}';
        window.edit_specification = '{{ route('admin.getSpecification') }}';
        window.update_specification = '{{ route('admin.updateSpecification') }}';
        window.delete_specification = '{{ route('admin.deleteSpecification') }}';

    </script>
@endsection
