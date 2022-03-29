@extends('back-end.admin-app')
@section('title','Secondary Menu')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
<style>
    #simpletable img {
        width: 50px
    }
    .img-v img {
        max-width: 100px;
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
                        <h4>Secondary Menu</h4>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Secondary Menu</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="page-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Create A New Secondary Menu</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="formData">
                                        <form action="" id="scd_menu_form" role="form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">Menu EN <b class="text-danger">*</b></label>
                                                    <input type="text" id="menu_name_en" name="menu_en" class="form-control check-empty" placeholder="Menu Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Menu LT <b class="text-danger">*</b></label>
                                                    <input type="text" id="menu_name_lt" name="menu_lt" class="form-control check-empty" placeholder="Meniu pavadinimas">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Menu RUS <b class="text-danger">*</b></label>
                                                    <input type="text" id="menu_name_rus" name="menu_rus" class="form-control check-empty" placeholder="Название меню">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">URL EN</label>
                                                    <input type="text" id="url_en" name="url_en" class="form-control" placeholder="URL">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">URL LT</label>
                                                    <input type="text" id="url_lt" name="url_lt" class="form-control" placeholder="URL">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label">URL RUS</label>
                                                    <input type="text" id="url_rus" name="url_rus" class="form-control" placeholder="URL">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label">Image</label>
                                                    <input type="file" id="img" name="img" class="form-control">
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
                                    <h5>Secondary Menus</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="data">
                                                <?php $n = 0; ?>
                                                @foreach($data as $value)
                                                <tr class="tr-{{++$n}}">
                                                    <td>{{$n}}</td>
                                                    <td>
                                                        @if($value->img)
                                                        <img src="{{ asset('scdMenu/' . $value->img) }}" alt="img">
                                                        @endif
                                                    </td>
                                                    <td class="td-{{$n}}">
                                                        EN - {{$value->menu_en}} <br>
                                                        LT - {{$value->menu_lt}} <br>
                                                        RUS - {{$value->menu_rus}}
                                                    </td>
                                                    <td>
                                                        <button type="button" onclick="editScdMenu(<?=$value->id ?>,<?=$n?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
                                                        <button class="btn btn-sm btn-danger" onclick="deleteScdMenu(<?=$value->id?>)"><i class="icon-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
        <h3 class="bg-dark">Secondary Menu</h3>
        <div class="well">
            <form action="" id="update_form" role="form" enctype="multipart/form-data">
                @csrf
                <label for="menu_enEdit">Name EN:</label>
                <input type="text" class="form-control check-empty" id="menu_enEdit" name="menu_en">
                <label for="menu_ltEdit">Name LT:</label>
                <input type="text" class="form-control check-empty" id="menu_ltEdit" name="menu_lt">
                <label for="menu_rusEdit">Name RUS:</label>
                <input type="text" class="form-control check-empty" id="menu_rusEdit" name="menu_rus">
                <label for="url_enE">URL EN:</label>
                <input type="text" class="form-control" id="url_enE" name="url_en">
                <label for="url_ltE">URL LT:</label>
                <input type="text" class="form-control" id="url_ltE" name="url_lt">
                <label for="url_rusE">URL RUS:</label>
                <input type="text" class="form-control" id="url_rusE" name="url_rus">
                <label for="imgE">Image:</label>
                <input type="file" id="imgE" name="img" class="form-control">
                <div class="img-v">
                    <img src="" alt="img">
                </div>
                <input type="hidden" id="idedit" name="id">
                <input type="hidden" class="tdNuber">
                <div class="m-btn-area">
                    <button type="button" class=" md-close btn btn-dark close-modal"> cancel</button>
                    <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte" onclick="updateScdMenu()" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('admin-assets/assets/js/modal.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/assets/js/modalEffects.js')}}"></script>
<script>
    $(function(){
        $("#simpletable").DataTable();
        $('.close-modal').on("click", function() {
            $("#modal-13").modal('hide');
        });
    });
    window.base_url = '<?= url('/')?>';
    window.insert_scd_menu = '<?= url('admin/insert-secondary-menu')?>';
    window.edit_scd_menu = '<?= url('admin/get-secondary-menu')?>';
    window.delete_scd_menu = '<?= url('admin/delete-secondary-menu')?>';
    window.update_scd_menu = '<?= url('admin/update-secondary-menu')?>';
</script>
@endsection
