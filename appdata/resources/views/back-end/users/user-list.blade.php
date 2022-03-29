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

    .m-t-15 {
        margin-top: 15px;
    }

    .font-20 {
        font-size: 20px;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        background-color: transparent;
        border-color: #ccc #ccc #ddd;
    }

    #userInfo .list-group {
        padding: 0;
    }

    #userInfo .list-group-item {
        padding: 5px;
    }

    .discount-form {
        display: flex;
    }

    .discount-form input {
        outline: none;
        background: none;
        border: 1px solid #ccc;
        border-radius: 30px;
        color: #000;
        display: inline-block;
        font-size: 15px;
        font-weight: 300;
        height: 57px;
        margin-right: 17px;
        padding-left: 35px;
        width: 70%;
        cursor: pointer;
    }

    .discount-form button {
        outline: none;
        background: #ffff;
        border: none;
        border-radius: 30px;
        color: #4b5d73;
        display: inline-block;
        font-size: 18px;
        font-weight: 400;
        line-height: 1;
        padding: 18px 46px;
        transition: all 0.3s ease 0s;
    }

    .discount-form button i {
        font-size: 18px;
        padding-left: 5px;
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
                        <h4>Users</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-body">

                    <div class="row">
                        {{-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Create A New Custom Size</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <ul class="nav nav-tabs tabs ctm-tab-b" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#lenLt" role="tab">
                                                <div class="f-item">
                                                    <i class="flag flag-icon-background flag-icon-LTL"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#lenEn" role="tab">
                                                <div class="f-item">
                                                    <i class="flag flag-icon-background flag-icon-USD"></i>
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
                                        <form action="" id="custom_size_form" role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="tab-content tabs">
                                                <div class="tab-pane" id="lenEn" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="size_name_en" class="col-form-label">Size Name <b class="text-danger">*</b></label>
                                                            <input type="text" id="size_name_en" name="size_name_en" class="form-control check-empty" placeholder="Size Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane active" id="lenLt" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="size_name_lt" class="col-form-label">Size Name <b class="text-danger">*</b></label>
                                                            <input type="text" id="size_name_lt" name="size_name_lt" class="form-control check-empty" placeholder="Dydis Vardas">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenRus" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="size_name_rus" class="col-form-label">Size Name <b class="text-danger">*</b></label>
                                                            <input type="text" id="size_name_rus" name="size_name_rus" class="form-control check-empty" placeholder="Nome do tamanho">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenPt" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="size_name_pt" class="col-form-label">Size Name <b class="text-danger">*</b></label>
                                                            <input type="text" id="size_name_pt" name="size_name_pt" class="form-control check-empty" placeholder="Nome do tamanho">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="lenEs" role="tabpanel">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="size_name_es" class="col-form-label">Size Name <b class="text-danger">*</b></label>
                                                            <input type="text" id="size_name_es" name="size_name_es" class="form-control check-empty" placeholder="Nombre del tamaño">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Sizes <b class="text-danger">*</b></label>
                                                    <div class="append-size">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <button class="btn" type="button" onclick="removeItem(event)">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" class="form-control" name="size[]">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-info" type="button" onclick="appendItem(event)">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
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
                        </div> --}}
                        <div class="col-md-12">
                            <!-- data table -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Users</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        @include('back-end.users.user-view')
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
        <h3 class="bg-dark">User Information</h3>
        <div class="well">
            <div class="container bootstrap snippet" id="userInfo">
                <div class="row">
                    <div class="col-12">
                        <!--left col-->
                        <div style="display: flex;justify-content: center;">
                            <div style="width: 250px;height: 250px;overflow: hidden;">
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                    style="height: 100%;width: 100%;object-fit: cover;"
                                    class="avatar img-circle img-thumbnail image" alt="avatar">
                            </div>
                        </div>
                        <br />
                        <ul class="list-group">
                            <li class="list-group-item text-muted font-20">User Information <i
                                    class="fa fa-cog fa-1x"></i></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>First Name :
                                    </strong><span class="first-name"></span></span>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Last Name :
                                    </strong><span class="last-name"></span></span>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Email :
                                    </strong><span class="email"></span></span>
                            </li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Phone :
                                    </strong><span class="phone"></span></span></li>
                        </ul>
                    </div>
                    <!--/col-3-->
                    <div class="col-12">
                        {{-- <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Profile</a>
                            </li>
                        </ul>
                        --}}

                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                {{-- <div class="panel panel-default">
                                    <div class="panel-body"> --}}
                                {{-- <h2 class="m-t-15 name">Jhon Deu</h2> --}}
                                {{-- </div>
                                </div> --}}
                                <br />
                                <ul class="list-group">
                                    <li class="list-group-item text-muted font-20">Billing Information <i
                                            class="fa fa-address-card  fa-1x"></i></li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>Apartment: </strong>
                                            <span class="apartment"></span>
                                        </span>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left"><strong>Town : </strong>
                                            <span class="town"></span></span>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left"><strong>State : </strong>
                                            <span class="state"></span></span>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>District : </strong>
                                            <span class="district"></span></span>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>Country : </strong>
                                            <span class="country"></span></span>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>Post Code : </strong>
                                            <span class="post-code"></span></span>
                                    </li>
                                </ul>
                                <br />
                                <form action="" class="discount-form">
                                    @csrf
                                    <input type="hidden" id="idedit" name="id">
                                    <input type="hidden" class="tdNuber">
                                    <input type="text" name="discount" class="discount">
                                    <button type="submit" style="cursor: pointer">Discount <i
                                            class="fas fa-long-arrow-alt-right"></i></button>
                                </form>
                                <div class="discount-error d-none" style="color: red">
                                    Invalid Discount
                                </div>

                            </div>
                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->

                </div>
                <!--/col-9-->
            </div>
            <!--/row-->
            <div class="m-btn-area" style="justify-content: flex-end">
                <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
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
    // window.insert_custom_size = '<?= route('admin.insertCustomSize') ?>';
    window.edit_user = '<?= route('admin.getUser') ?>';
    window.update_discount = '<?= route('admin.updateDiscount') ?>';
    window.delete_user = '<?= route('admin.deleteUser') ?>';
</script>
@endsection