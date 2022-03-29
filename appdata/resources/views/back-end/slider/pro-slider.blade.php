@extends('back-end.admin-app')
@section('title','Second Slider')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
<style>
	.sdr-img-v {
		max-width: 100px;
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
						<h4>Second Slider</h4>
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
							<li class="breadcrumb-item"><a href="#!">Second Slider</a>
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
										<form action="" id="second_slider_form" role="form" enctype="multipart/form-data">
											@csrf
											<div class="form-group row">
												<div class="col-sm-6">
													<label class="col-form-label">Slider Image</label>
													<input type="file" id="slider" name="slider" required="" class="form-control">
												</div>
											</div>
											<div class="form-group row" id="">
												<input type="submit"  class=" ml-20 btn btn-primary " value="Save">
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
									<h5>Second Sliders</h5>
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
													<th>Action</th>
												</tr>
											</thead>
											<tbody class="data">
												<?php $n = 0; ?>
												@foreach($data as $value)
												<tr class="tr-{{++$n}}">
													<td>{{$n}}</td>
													<td class="td-{{$n}}">
														<img src="{{ asset('secondSlider/' . $value->img) }}" class="img-fluid" style="max-width: 100px" alt="img">
													</td>
													<td>
														<button type="button" onclick="editSSlider(<?=$value->id ?>,<?=$n?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
														<button class="btn btn-sm btn-danger" onclick="deleteSSlider(<?=$value->id?>)"><i class="icon-trash"></i></button>
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
				<label for="">Image:</label>
				<input type="file" id="sliderE" name="slider" class="form-control" required="">
				<div class="sdr-img-v">
					<img src="{{ asset('mainSlider/1570018691.jpg') }}" alt="img">
				</div>
				<input type="hidden" id="idedit" name="id">
				<input type="hidden" class="tdNuber">
			</form>
			<div class="m-btn-area">
				<button class="md-close btn btn-dark close-modal"> cancel</button>
				<button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte" onclick="updateSSlider()" >Save</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modalEffects.js') }}"></script>
<script>
	$(function(){
		$("#simpletable").DataTable();
		$('.close-modal').on("click", function() {
			$("#modal-13").modal('hide');
		});
	});
	window.base_url = '<?= url('/')?>';
	window.insert_sslider = '<?= url('admin/insert-second-slider')?>';
	window.edit_sslider = '<?= url('admin/get-second-slider')?>';
	window.update_sslider = '<?= url('admin/update-second-slider')?>';
	window.delete_sslider = '<?= url('admin/delete-second-slider')?>';
</script>
@endsection
