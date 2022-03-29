@extends('back-end.admin-app')
@section('title',' Home Blog')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/font-awesome/css/font-awesome.min.css')}}">
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
						<h4>Home Blog</h4>
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
							<li class="breadcrumb-item"><a href="#!">Home Blog</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="page-body">

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5>Upload A New Home Blog</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block">
									<div id="formData">
										<form action="" id="home_blog_form" role="form" enctype="multipart/form-data">
											@csrf
											<div class="form-group row">
												<div class="col-sm-12">
													<label class="col-form-label">Title EN</label>
													<input type="text" id="title_en" name="title_en" class="form-control">
												</div>
												<div class="col-sm-6">
													<label class="col-form-label">Title LT</label>
													<input type="text" id="title_lt" name="title_lt" class="form-control">
												</div>
												<div class="col-sm-6">
													<label class="col-form-label">Title RUS</label>
													<input type="text" id="title_rus" name="title_rus" class="form-control">
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Description EN</label>
													<textarea id="description_en" name="description_en" class="form-control"></textarea>
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Description LT</label>
													<textarea id="description_lt" name="description_lt" class="form-control"></textarea>
												</div>
												<div class="col-sm-12">
													<label class="col-form-label">Description RUS</label>
													<textarea id="description_rus" name="description_rus" class="form-control"></textarea>
												</div>
												<div class="col-sm-6">
													<label class="col-form-label">Image</label>
													<input type="file" id="img" name="img" class="form-control">
												</div>
											</div>
											<div class="form-group row" id="saveF">
												<input type="submit" class=" ml-20 btn btn-primary" value="Save">
												<img src="{{ asset('admin-assets/assets/images/loading.gif') }}" class="d-none" style="width: 40px;margin-left: 15px;"  alt="img">
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
									<h5>Home Blogs</h5>
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
													<th>Img</th>
													<th>Title</th>
													<th>description</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody class="data">
												<?php $n = 0; ?>
												@foreach($data as $value)
												<tr class="tr-{{++$n}}">
													<td>{{$n}}</td>
													<td class="td-{{$n}}">
														@if($value->img)
														<img src="{{ asset('homeBlog/' . $value->img) }}" class="img-fluid"  alt="img">
														@else
														<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" style="filter: blur(3px);-webkit-filter: blur(3px);"  alt="img">
														@endif
													</td>
													<td class="td-{{$n}}">
														EN - {{$value->title_en}} <br>
														LT - {{$value->title_lt}} <br>
														RUS - {{$value->title_rus}}
													</td>
													<td class="td-{{$n}}" style="white-space: normal;">
														EN - <?= substr(strip_tags($value->description_en), 0, 50) . '. . . .' ?> <br>
														LT - <?= substr(strip_tags($value->description_lt), 0, 50) . '. . . .' ?> <br>
														RUS - <?= substr(strip_tags($value->description_rus), 0, 50) . '. . . .' ?>
													</td>
													<td>
														<button type="button" onclick="editHomeBlog(<?=$value->id ?>,<?=$n?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
														<button class="btn btn-sm btn-danger" onclick="deleHometeBlog(<?=$value->id?>)"><i class="icon-trash"></i></button>
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
		<h3 class="bg-dark">Blog</h3>
		<div class="well">
			<form action="" id="update_form" role="form" enctype="multipart/form-data">
				@csrf
				<label for="title_enE" class="mt-20">Title EN:</label>
				<input type="text" class="form-control check-empty" id="title_enE" name="title_en">
				<label for="title_ltE" class="mt-20">Title LT:</label>
				<input type="text" class="form-control check-empty" id="title_ltE" name="title_lt">
				<label for="title_rusE" class="mt-20">Title RUS:</label>
				<input type="text" class="form-control check-empty" id="title_rusE" name="title_rus">
				<label for="description_enE" class="mt-20">Description EN:</label>
				<textarea id="description_enE" name="description_en" class="form-control"></textarea>
				<label for="description_ltE" class="mt-20">Description LT:</label>
				<textarea id="description_ltE" name="description_lt" class="form-control"></textarea>
				<label for="description_rusE" class="mt-20">Description RUS:</label>
				<textarea id="description_rusE" name="description_rus" class="form-control"></textarea>
				<label for="imgE">Image:</label>
				<input type="file" id="imgE" name="img" class="form-control">
				<div class="sdr-img-v">
					<img src="{{ asset('mainSlider/1570018691.jpg') }}"  alt="img">
				</div>
				<input type="hidden" id="idedit" name="id">
				<input type="hidden" class="tdNuber">
			</form>
			<div class="m-btn-area">
				<button class="md-close btn btn-dark close-modal"> cancel</button>
				<button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte" onclick="updateHomeBlog()">Save</button>
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
	$(function(){
		$("#simpletable").DataTable();
		$('.close-modal').on("click", function() {
			$("#modal-13").modal('hide');
		});

		$("#description_en").summernote();
		$("#description_lt").summernote();
		$("#description_rus").summernote();
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
	window.insert_home_blog = '<?= url('admin/insert-home-blog')?>';
	window.edit_home_blog = '<?= url('admin/get-home-blog')?>';
	window.update_home_blog = '<?= url('admin/update-home-blog')?>';
	window.delete_home_blog = '<?= url('admin/delete-home-blog')?>';
</script>
@endsection
