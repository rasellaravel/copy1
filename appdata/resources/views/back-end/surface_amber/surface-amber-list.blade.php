@extends('back-end.admin-app')
@section('title','Surface Amber')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css')}}">
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
                        <h4>Surface Amber</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Surface Amber</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Create A New Surface Amber</h5>
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
                                        <li class="nav-item">
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
                                        </li>
                                    </ul>
                                    <div id="formData">
                                        <form action="" id="surface_amber_form" role="form"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="tab-content tabs">
                                                <div class="tab-pane active" id="lenEn" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="name_en" class="col-form-label">Surface Amber <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="name_en" name="name_en"
                                                                class="form-control check-empty" placeholder="name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenLt" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="name_lt" class="col-form-label">Surface Amber <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="name_lt" name="name_lt"
                                                                class="form-control check-empty" placeholder="Spalva">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenRus" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="name_rus" class="col-form-label">Surface Amber
                                                                <b class="text-danger">*</b></label>
                                                            <input type="text" id="name_rus" name="name_rus"
                                                                class="form-control check-empty" placeholder="цвет">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenPt" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="name_pt" class="col-form-label">Surface Amber <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="name_pt" name="name_pt"
                                                                class="form-control check-empty" placeholder="nome">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenEs" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="name_es" class="col-form-label">Surface Amber <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="name_es" name="name_es"
                                                                class="form-control check-empty" placeholder="nombre">
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
                                    <h5>Surface Ambers</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        @include('back-end.surface_amber.surface-amber-view')
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
        <h3 class="bg-dark">Surface Amber</h3>
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
                <li class="nav-item">
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
                </li>
            </ul>
            <form action="" id="update_form" role="form" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabs mt-20">
                    <div class="tab-pane active" id="lenEnM" role="tabpanel">
                        <label for="name_enEdit">Surface Amber:</label>
                        <input type="text" class="form-control check-empty" id="name_enEdit" name="name_en">
                    </div>
                    <div class="tab-pane" id="lenLtM" role="tabpanel">
                        <label for="name_ltEdit">Surface Amber:</label>
                        <input type="text" class="form-control check-empty" id="name_ltEdit" name="name_lt">
                    </div>
                    <div class="tab-pane" id="lenRusM" role="tabpanel">
                        <label for="name_rusEdit">Surface Amber:</label>
                        <input type="text" class="form-control check-empty" id="name_rusEdit" name="name_rus">
                    </div>
                    <div class="tab-pane" id="lenPtM" role="tabpanel">
                        <label for="name_ptEdit">Surface Amber:</label>
                        <input type="text" class="form-control check-empty" id="name_ptEdit" name="name_pt">
                    </div>
                    <div class="tab-pane" id="lenEsM" role="tabpanel">
                        <label for="name_esEdit">Surface Amber:</label>
                        <input type="text" class="form-control check-empty" id="name_esEdit" name="name_es">
                    </div>
                </div>
                <input type="hidden" id="idedit" name="id">
                <input type="hidden" class="tdNuber">
                <div class="m-btn-area">
                    <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
                    <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                        onclick="updateSurfaceAmber()">Save</button>
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
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/custom/cloned-form.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
<script>
    $(function() {
        $("#simpletable").DataTable();
        $('.close-modal').on("click", function() {
            $("#modal-13").modal('hide');
        });

        //     $("#description_en").summernote();
        //     $("#description_lt").summernote();
        //     $("#description_rus").summernote();

        //     $("#meta_description_en").summernote();
        //     $("#meta_description_lt").summernote();
        //     $("#meta_description_rus").summernote();

        //     $("#mm_description_en").summernote();
        //     $("#mm_description_lt").summernote();
        //     $("#mm_description_rus").summernote();

        //     $("#description_enE").summernote();
        //     $("#description_ltE").summernote();
        //     $("#description_rusE").summernote();

        //     $("#meta_description_enE").summernote();
        //     $("#meta_description_ltE").summernote();
        //     $("#meta_description_rusE").summernote();

        //     $(".note-editable").blur(function() {
        //         $("#description_en").val($("#description_en").code());
        //         $("#description_lt").val($("#description_lt").code());
        //         $("#description_rus").val($("#description_rus").code());

        //         $("#meta_description_en").val($("#meta_description_en").code());
        //         $("#meta_description_lt").val($("#meta_description_lt").code());
        //         $("#meta_description_rus").val($("#meta_description_rus").code());

        //         $("#mm_description_en").val($("#mm_description_en").code());
        //         $("#mm_description_lt").val($("#mm_description_lt").code());
        //         $("#mm_description_rus").val($("#mm_description_rus").code());

        //         $("#description_enE").val($("#description_enE").code());
        //         $("#description_ltE").val($("#description_ltE").code());
        //         $("#description_rusE").val($("#description_rusE").code());

        //         $("#meta_description_enE").val($("#meta_description_enE").code());
        //         $("#meta_description_ltE").val($("#meta_description_ltE").code());
        //         $("#meta_description_rusE").val($("#meta_description_rusE").code());
        //     });
    });
    window.base_url = '<?= url('/') ?>';
    window.insert_surface_amber = '<?= route('admin.insertSurfaceOfAmber') ?>';
    window.edit_surface_amber = '<?= route('admin.getSurfaceOfAmber') ?>';
    window.update_surface_amber = '<?= route('admin.updateSurfaceOfAmber') ?>';
    window.delete_surface_amber = '<?= route('admin.deleteSurfaceOfAmber') ?>';
</script>
@endsection