@extends('back-end.admin-app')
@section('title','Package')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
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
						<h4>Package</h4>
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
							<li class="breadcrumb-item"><a href="#!">Package</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="page-body">

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5>Add New Package</h5>
									<div class="card-header-right">
										<i class="icofont icofont-rounded-down"></i>
										<i class="icofont icofont-refresh"></i>
										<i class="icofont icofont-close-circled"></i>
									</div>
								</div>
								<div class="card-block">
									<div id="formData">
										<form action="" id="package_upload_form" role="form" enctype="multipart/form-data">
											@csrf
											<div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Package Name</label>
                                                        <input type="text" id="pkgName" name="package_name" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Package Price</label>
                                                        <input type="number" id="pkgPrice" name="package_price" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Package Discount</label>
                                                        <input type="number" id="pkgDiscount" name="package_discount" class="form-control">
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
									<h5>All Packages</h5>
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
													<th>Name</th>
													<th>Price</th>
													<th>Discount</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody class="data">
												<?php $n = 0; ?>
												@foreach($data as $value)
												<tr class="tr-{{++$n}}">
													<td>{{$n}}</td>
													<td class="td-{{$n}}">
														{{$value->package_name}} 
													</td>
													<td class="td-{{$n}}" style="white-space: normal;">
                                                        {{$value->package_price}} 
                                                    </td>
													<td class="td-{{$n}}">
                                                        {{$value->package_discount}} 
													</td>
													<td>
														<button type="button" onclick="editPackage(<?= $value->id ?>,<?= $n ?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
														<button class="btn btn-sm btn-danger" onclick="deletePackage(<?= $value->id ?>)"><i class="icon-trash"></i></button>
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
		<h3 class="bg-dark">Package</h3>
		<div class="well">
			<form action="" id="update_package_form" role="form" enctype="multipart/form-data">
				@csrf
				<label for="titleEn">Package Name</label>
                <input type="text" class="form-control" id="packageName" name="package_name">
                <label for="titleEn">Package Price</label>
                <input type="text" class="form-control" id="packagePrice" name="package_price">
                <label for="titleEn">Package Discount</label>
                <input type="text" class="form-control" id="packageDiscount" name="package_discount">
                
                <input type="hidden" id="idedit" name="id">
				<input type="hidden" class="tdNuber">
			</form>
			<div class="m-btn-area">
				<button class="md-close btn btn-dark close-modal"> cancel</button>
				<button type="button" class="btn btn-success waves-effect md-close submit-modal-upadte" onclick="updatePackage()">Save</button>
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
	window.insert_package = '<?= url('admin/insert-packages') ?>';
	window.edit_package = '<?= url('admin/get-packages') ?>';
	window.update_package = '<?= url('admin/update-packages') ?>';
	window.delete_package = '<?= url('admin/delete-packages') ?>';
</script>
@endsection