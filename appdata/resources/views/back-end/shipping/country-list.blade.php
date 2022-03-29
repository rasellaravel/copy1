@extends('back-end.admin-app')
@section('title','Custom Size')
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
                        <h4>Country</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Country</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-body">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- data table -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Countries</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        @include('back-end.shipping.country-view')
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
        <h3 class="bg-dark">Country</h3>
        <div class="well">
            <form action="" id="update_form" role="form" enctype="multipart/form-data">
                @csrf
                <label for="nameEdit">Name:</label>
                <input type="text" class="form-control check-empty" id="nameEdit" name="name">
                <label for="codeEdit">Code:</label>
                <input type="text" class="form-control check-empty" id="codeEdit" name="code">

                <label class="ck-container mt-20">Active
                    <input type="checkbox" id="statusE" value="1" name="status">
                    <span class="checkmark"></span>
                </label>
                <input type="hidden" id="idedit" name="id">
                <input type="hidden" class="tdNuber">
                <div class="m-btn-area">
                    <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
                    <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                        onclick="updateCountry()">Save</button>
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
    });
    window.base_url = '<?= url('/') ?>';
    window.edit_country = '<?= route('admin.getCountry') ?>';
    window.update_country = '<?= route('admin.updateCountry') ?>';
    window.delete_country = '<?= route('admin.deleteCountry') ?>';
</script>
@endsection