@extends('back-end.admin-app')
@section('title','Product')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css')}}">
<!-- jpro forms css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/demo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/j-forms.css') }}">

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
						<h4>About</h4>
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
							<li class="breadcrumb-item"><a href="javascript:void(0)">About</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="page-body">

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5>Upload A New About</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block">
									<div id="formData">
										<form action="" id="about_form" role="form" enctype="multipart/form-data">
											@csrf
											<div class="form-group row">
												<div class="col-sm-12">
													<label class="col-form-label">Description EN</label>
													<textarea id="description_en" name="description_en" class="form-control">{{ $about->description_en }}</textarea>
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Description LT</label>
													<textarea id="description_lt" name="description_lt" class="form-control">{{ $about->description_lt }}</textarea>
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Description RUS</label>
													<textarea id="description_rus" name="description_rus" class="form-control">{{ $about->description_rus }}</textarea>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="form-label">Image</label>
														<div class="controls m-b-10">
															<label class="btn btn-primary btn-file">
																<i class="fa fa-upload"></i> Image
																<input type="file"
																style="display: none;"
																name="img"
																id="img" onchange="showMainImg(event, '#img_show')">
															</label>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div id="img_show">
														@if(@$about->img)
														<span class="pip">
															<img class="imageThumb" src="{{ asset('about/' . @$about->img) }}" alt="img">
														</span>
														@endif
													</div>
												</div>
											</div>
											<div class="form-group row" id="">
												<input type="submit"  class=" ml-20 btn btn-primary" value="Update">
											</div>
										</form>
										
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
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modalEffects.js') }}"></script>
<!-- j-pro js -->
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery.ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery.maskedinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery-cloneya.min.js') }}"></script>

{{-- cloned form --}}
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/custom/cloned-form.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
<script>
	$(function(){
		$("#simpletable").DataTable();
		$('.close-modal').on("click", function() {
			$("#modal-13").modal('hide');
		});

		$("#description_en").summernote();
		$("#description_lt").summernote();
		$("#description_rus").summernote();

		// $("#description_en").code($("#description_en").val());

		$("#description_enE").summernote();
		$("#description_ltE").summernote();
		$("#description_rusE").summernote();

		$(".note-editable").blur(function() {
			$("#description_en").val($("#description_en").code());
			$("#description_lt").val($("#description_lt").code());
			$("#description_rus").val($("#description_rus").code());
			$("#description_enE").val($("#description_enE").code());
			$("#description_ltE").val($("#description_ltE").code());
			$("#description_rusE").val($("#description_rusE").code());
		});
	});
	window.base_url = '<?= url('/')?>';
	window.insert_about = '<?= url('admin/insert-about')?>';
</script>
@endsection
