@extends('back-end.admin-app')
@section('title','Page')
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
                        <h4>Page</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Create A New Page</h5>
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
                                        <form action="" id="page_form" role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tab-content tabs">
                                                <div class="tab-pane active" id="lenEn" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="title_en" class="col-form-label">Title <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="title_en" name="title_en"
                                                                class="form-control check-empty" placeholder="title">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="col-form-label">Content</label>
                                                            <textarea id="content_en" name="content_en"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenLt" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="title_lt" class="col-form-label">Title <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="title_lt" name="title_lt"
                                                                class="form-control check-empty" placeholder="title">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="col-form-label">Content</label>
                                                            <textarea id="content_lt" name="content_lt"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenRus" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="title_rus" class="col-form-label">Title <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="title_rus" name="title_rus"
                                                                class="form-control check-empty" placeholder="title">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="col-form-label">Content</label>
                                                            <textarea id="content_rus" name="content_rus"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenPt" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="title_pt" class="col-form-label">Title <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="title_pt" name="title_pt"
                                                                class="form-control check-empty" placeholder="title">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="col-form-label">Content</label>
                                                            <textarea id="content_pt" name="content_pt"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenEs" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="title_es" class="col-form-label">Title <b
                                                                    class="text-danger">*</b></label>
                                                            <input type="text" id="title_es" name="title_es"
                                                                class="form-control check-empty" placeholder="title">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <label class="col-form-label">Content</label>
                                                            <textarea id="content_es" name="content_es"
                                                                class="form-control"></textarea>
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
                                    <h5>Pages</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        @include('back-end.pages.page-view')
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
        <h3 class="bg-dark">Page</h3>
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
                        <label for="title_enEdit">Title:</label>
                        <input type="text" class="form-control check-empty" id="title_enEdit" name="title_en">
                        <label for="content_enE" class="mt-20">Content:</label>
                        <textarea id="content_enE" name="content_en" class="form-control"></textarea>
                    </div>
                    <div class="tab-pane" id="lenLtM" role="tabpanel">
                        <label for="title_ltEdit">Title:</label>
                        <input type="text" class="form-control check-empty" id="title_ltEdit" name="title_lt">
                        <label for="content_ltE" class="mt-20">Content:</label>
                        <textarea id="content_ltE" name="content_lt" class="form-control"></textarea>
                    </div>
                    <div class="tab-pane" id="lenRusM" role="tabpanel">
                        <label for="title_rusEdit">Title:</label>
                        <input type="text" class="form-control check-empty" id="title_rusEdit" name="title_rus">
                        <label for="content_rusE" class="mt-20">Content:</label>
                        <textarea id="content_rusE" name="content_rus" class="form-control"></textarea>
                    </div>
                    <div class="tab-pane" id="lenPtM" role="tabpanel">
                        <label for="title_ptEdit">Title:</label>
                        <input type="text" class="form-control check-empty" id="title_ptEdit" name="title_pt">
                        <label for="content_ptE" class="mt-20">Content:</label>
                        <textarea id="content_ptE" name="content_pt" class="form-control"></textarea>
                    </div>
                    <div class="tab-pane" id="lenEsM" role="tabpanel">
                        <label for="title_esEdit">Title:</label>
                        <input type="text" class="form-control check-empty" id="title_esEdit" name="title_es">
                        <label for="content_esE" class="mt-20">Content:</label>
                        <textarea id="content_esE" name="content_es" class="form-control"></textarea>
                    </div>
                </div>
                <input type="hidden" id="idedit" name="id">
                <input type="hidden" class="tdNuber">
                <div class="m-btn-area">
                    <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
                    <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                        onclick="updatePage()">Save</button>
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
        $("#content_en").summernote();
        $("#content_lt").summernote();
        $("#content_rus").summernote();
        $("#content_pt").summernote();
        $("#content_es").summernote();
        $("#content_enE").summernote();
        $("#content_ltE").summernote();
        $("#content_rusE").summernote();
        $("#content_ptE").summernote();
        $("#content_esE").summernote();
    
        $(".note-editable").blur(function() {
            $("#content_en").val($("#content_en").code());
            $("#content_lt").val($("#content_lt").code());
            $("#content_rus").val($("#content_rus").code());
            $("#content_pt").val($("#content_pt").code());
            $("#content_es").val($("#content_es").code());
            $("#content_enE").val($("#content_enE").code());
            $("#content_ltE").val($("#content_ltE").code());
            $("#content_rusE").val($("#content_rusE").code());
            $("#content_ptE").val($("#content_ptE").code());
            $("#content_esE").val($("#content_esE").code());
        });
    });
    window.base_url = '<?= url('/') ?>';
    window.insert_page = '<?= route('admin.insertPage') ?>';
    window.edit_page = '<?= route('admin.getPage') ?>';
    window.update_page = '<?= route('admin.updatePage') ?>';
    window.delete_page = '<?= route('admin.deletePage') ?>';
</script>
@endsection