@extends('back-end.admin-app')
@section('title', 'Main Slider')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/component.css') }}">
    <style>
        .sdr-img-v {
            max-width: 200px;
            margin: 20px 0;
        }

        .sdr-img-v img {
            width: 100%;
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
                            <h4>Main Slider</h4>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="index-2.html">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Pages</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#!">Main Slider</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Upload A New Slider</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="formData">
                                            <form action="" id="slider_upload_form" role="form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Slider Image</label>
                                                        <input type="file" id="slider" name="main_slider" required=""
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Title EN</label>
                                                        <input type="text" id="title_en" name="title_en"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Title LT</label>
                                                        <input type="text" id="title_lt" name="title_lt"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Title RUS</label>
                                                        <input type="text" id="title_rus" name="title_rus"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Description EN</label>
                                                        <textarea id="description_en" name="description_en"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Description LT</label>
                                                        <textarea id="description_lt" name="description_lt"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Description RUS</label>
                                                        <textarea id="description_rus" name="description_rus"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">URL</label>
                                                        <input type="text" id="url" name="url" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Button Name EN</label>
                                                        <input type="text" id="btnName_en" name="btn_name_en"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Button Name LT</label>
                                                        <input type="text" id="btnName_lt" name="btn_name_lt"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Button Name RUS</label>
                                                        <input type="text" id="btnName_rus" name="btn_name_rus"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="">
                                                    <input type="submit" class=" ml-20 btn btn-primary " value="Save">
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
                                        <h5>Main Sliders</h5>
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
                                                        <th>Slider</th>
                                                        <th>Title</th>
                                                        <th>description</th>
                                                        <th>btn Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="data">
                                                    <?php $n = 0; ?>
                                                    @foreach ($data as $value)
                                                        <tr class="tr-{{ ++$n }}">
                                                            <td>{{ $n }}</td>
                                                            <td class="td-{{ $n }}"><img
                                                                    src="{{ asset('uploads/sliders/main/' . $value->slider) }}"
                                                                    class="img-fluid" alt="img"></td>
                                                            <td class="td-{{ $n }}">
                                                                EN - {{ $value->title_en }} <br>
                                                                LT - {{ $value->title_lt }} <br>
                                                                RUS - {{ $value->title_rus }}
                                                            </td>
                                                            <td class="td-{{ $n }}" style="white-space: normal;">
                                                                EN - <?= substr($value->description_en, 0, 50) . '. . . .' ?> <br>
                  LT - <?= substr($value->description_lt, 0, 50) . '. . . .' ?> <br>
                  RUS - <?= substr($value->description_rus, 0, 50) . '. . . .' ?>
                 </td>
                 <td class="td-{{ $n }}">
                  EN - {{ $value->btn_name_en }} <br>
                  LT - {{ $value->btn_name_lt }} <br>
                  RUS - {{ $value->btn_name_rus }}
                 </td>
                 <td>
                  <button type="button" onclick="editSlider(<?= $value->id ?>,<?= $n ?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
                  <button class="btn btn-sm btn-danger" onclick="deleteSlider(<?= $value->id ?>)"><i class="icon-trash"></i></button>
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
      <h3 class="bg-dark">Slider</h3>
      <div class="well">
       <form action="" id="update_form" role="form" enctype="multipart/form-data">
        @csrf
        <label for="sliderE">Image:</label>
        <input type="file" id="sliderE" name="main_slider" class="form-control">
        <div class="sdr-img-v">
         <img src="{{ asset('uploads/sliders/main/1570018691.jpg') }}" alt="img">
        </div>
        <label for="titleEn">Title EN:</label>
        <input type="text" class="form-control" id="titleEn" name="title_en">
        <label for="titleLt">Title LT:</label>
        <input type="text" class="form-control" id="titleLt" name="title_lt">
        <label for="titleRus">Title RUS:</label>
        <input type="text" class="form-control" id="titleRus" name="title_rus">

        <label for="description_enE">Description EN:</label>
        <textarea id="description_enE" name="description_en" class="form-control"></textarea>
        <label for="description_ltE">Description LT:</label>
        <textarea id="description_ltE" name="description_lt" class="form-control"></textarea>
        <label for="description_rusE">Description RUS:</label>
        <textarea id="description_rusE" name="description_rus" class="form-control"></textarea>
        <label for="urlE">URL:</label>
        <input type="text" class="form-control" id="urlE" name="url">
        <label for="btnName_enE">Button Name EN:</label>
        <input type="text" class="form-control" id="btnName_enE" name="btn_name_en">
        <label for="btnName_ltE">Button Name LT:</label>
        <input type="text" class="form-control" id="btnName_ltE" name="btn_name_lt">
        <label for="btnName_rusE">Button Name RUS:</label>
        <input type="text" class="form-control" id="btnName_rusE" name="btn_name_rus">
        <input type="hidden" id="idedit" name="id">
        <input type="hidden" class="tdNuber">
       </form>
       <div class="m-btn-area">
        <button class="md-close btn btn-dark close-modal"> cancel</button>
        <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte" onclick="updateSlider()">Save</button>
       </div>
      </div>
     </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('admin-assets/assets/js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin-assets/assets/js/modalEffects.js') }}"></script>
    <script>
     $(function() {
      $("#simpletable").DataTable();
      $('.close-modal').on("click", function() {
       $("#modal-13").modal('hide');
      });
     });
     window.base_url = '<?= url('/') ?>';
     window.insert_slider = '<?= url('admin/insert-main-slider') ?>';
     window.edit_slider = '<?= url('admin/get-main-slider') ?>';
     window.update_slider = '<?= url('admin/update-main-slider') ?>';
     window.delete_slider = '<?= url('admin/delete-main-slider') ?>';
    </script>
@endsection
