@extends('back-end.admin-app')
@section('title', 'Blog')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/component.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css') }}">
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

    </style>
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4> Blog</h4>
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
                                <li class="breadcrumb-item"><a href="#!"> Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Upload A New Blog</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="formData">
                                            <form action="" id="blog_form" role="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Title</label>
                                                        <input type="text" id="title" name="title"
                                                            class="form-control check-empty">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label">Description</label>
                                                        <textarea id="description" name="description"
                                                            class="form-control"></textarea>
                                                    </div>
                                                    <div class="col-sm-12" style="padding: 15px 15px 0 35px;">
                                                        <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" id="isVideo"
                                                                value="1" name="is_video">
                                                            <label class="form-check-label" for="isVideo">Video</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 image-area">
                                                        <label class="col-form-label">Image</label>
                                                        <input type="file" name="img" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6 video-area d-none">
                                                        <label class="col-form-label">Video</label>
                                                        <input type="text" name="video" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row" id="saveF">
                                                    <input type="submit" class=" ml-20 btn btn-primary" value="Save">
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
                                        <h5>Blogs</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            @include('back-end.blog.blog-view')
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
            <h3 class="bg-dark">Blog</h3>
            <div class="well">
                <form action="" id="update_form" role="form" enctype="multipart/form-data">
                    @csrf
                    <label for="titleE" class="mt-20">Title:</label>
                    <input type="text" class="form-control check-empty" id="titleE" name="title">
                    <label for="descriptionE" class="mt-20">Description:</label>
                    <textarea id="descriptionE" name="description" class="form-control"></textarea>
                    <div style="padding: 15px 15px 0 20px;">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="isVideoE" value="1" name="is_video">
                            <label class="form-check-label" for="isVideoE">Video</label>
                        </div>
                    </div>
                    <div class="image-areaE">
                        <label for="imgE">Image:</label>
                        <input type="file" id="imgE" name="img" class="form-control">
                        <div class="sdr-img-v">

                        </div>
                    </div>
                    <div class="video-areaE d-none">
                        <label for="videoE">Video:</label>
                        <input type="text" id="videoE" name="video" class="form-control">
                        <div class="sdr-video-v embed-responsive embed-responsive-16by9"
                            style="max-width: 200px; margin-top: 15px">
                        </div>
                    </div>
                    <input type="hidden" id="idedit" name="id">
                    <input type="hidden" class="tdNuber">
                </form>
                <div class="m-btn-area">
                    <button class="md-close btn btn-dark close-modal"> cancel</button>
                    <button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte"
                        onclick="updateBlog()">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('admin-assets/assets/js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin-assets/assets/js/modalEffects.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
    <script>
        $(function() {
            $("#simpletable").DataTable();
            $('.close-modal').on("click", function() {
                $("#modal-13").modal('hide');
            });

            $("#description").summernote();
            $("#descriptionE").summernote();

            $(".note-editable").blur(function() {
                $("#description").val($("#description").code());
                $("#descriptionE").val($("#descriptionE").code());
            });
        });
        window.get_sub_menu_by_menu = '{{ url('admin/get-sub-menu-by-menu') }}';
        window.base_url = '{{ url('/') }}';
        window.insert_blog = '{{ url('admin/insert-blog') }}';
        window.edit_blog = '{{ url('admin/get-blog') }}';
        window.update_blog = '{{ url('admin/update-blog') }}';
        window.delete_blog = '{{ url('admin/delete-blog') }}';

    </script>
@endsection
